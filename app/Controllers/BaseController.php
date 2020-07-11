<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use Config\Services;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	// protected $session;
	protected $helpers = [
		'general_helper',
		'datatable_helper',
		'myform_helper'
	];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// models
		$this->dja_model = model('App\Models\Dja_model', false);
		$this->auth_model = model('App\Models\Auth_model', false);
		$this->activitylog = model('App\Models\Activitylog_model', false);
		// library
		$this->session = \Config\Services::session();
		$this->db      = \Config\Database::connect();
		// $this->parser = \Config\Services::parser();
		// $this->encrypter = \Config\Services::encrypter();
		// array relation
		$this->jk = [
			'Tidak diketahui',
			'Laki-laki',
			'Perempuan'
		];
		// relation on db
		$this->role = $this->dja_model->get_all_list('role', 'id_role', 'nama_role');
	}
	public function page_table($array)
	{
		$data["page"] = $array['page'];
		$data["menu"] = $array['menu'];
		$data['judul'] = $array['judul'];
		$data['profile_role'] = $this->dja_model->relation('role', 'id_role', 'nama_role');
		if (array_key_exists('js', $array)) {
			$data["js"] = $array['js'];
		}
		if (array_key_exists('data_lain', $array)) {
			foreach ($array['data_lain'] as $key => $dl) {
				$data["$key"] = $dl;
			}
		}
		return view('layout', $data);
	}
	public function form_all($array, $nid = false)
	{
		$data['page'] = $array['page'];
		$data['menu'] = $array['menu'];
		$data['judul'] = $array['judul'];
		$data['profile_role'] = $this->dja_model->relation('role', 'id_role', 'nama_role');
		if (array_key_exists('redirect_true', $array)) {
			$redirect_true = $array['redirect_true'];
		}
		if (array_key_exists('redirect_false', $array)) {
			$redirect_false = $array['redirect_false'];
		}
		if (array_key_exists('js', $array)) {
			$data['js'] = $array['js'];
		}
		if (array_key_exists('id', $array)) {
			$value =  $this->dja_model->get_single($array['table'], [$array['field'] => $array['id']]);
			$data['data'] = $value;
		} else {
			$value = '';
		}
		if (array_key_exists('name_file', $array)) {
			// jika ada file yang diupload
			if ($this->request->getFile($array['name_file'])) {
				$file = $this->request->getFile($array['name_file']);
				$arrayValidate = [];
				$arrayValidate[$array['name_file']] = 'uploaded[' . $array['name_file'] . ']|ext_in[' . $array['name_file'] . ',' . $array['type_file'] . ']|max_size[' . $array['name_file'] . ',' . $array['size'] . ']';
				$validated = $this->validate($arrayValidate);
				if ($validated) {
					$file->move(ROOTPATH . $array['path']);
					$nama_file = $file->getName();
				} else {
					alertBootstrap([
						'name' => 'error-file',
						'message' => $file->getErrorString(),
						'type' => 'danger'
					]);
					return redirect()->back()->withInput();
				}
			}
		}
		if ($simpan = $this->request->getVar()) {
			if (array_key_exists('baru', $array)) {
				foreach ($array['baru'] as $n => $ns) {
					$simpan["$n"] = $ns;
				}
			}
			if (isset($nama_file)) {
				$simpan[$array['name_file']] = $nama_file;
				if (array_key_exists('modified_save', $array)) {
					$array['modified_save'][$array['name_file']] = $nama_file;
				}
			}
			if (array_key_exists('id', $array)) {
				if (!array_key_exists('modified_save', $array)) {
					$res = $this->dja_model->updateData($array['table'], $simpan, [$array['field'] => $array['id']]);
					if ($res) {
						alertBootstrap([
							'name' => 'crud-flashdata',
							'message' => 'Data berhasil diupdate',
							'type' => 'success'
						]);
					} else {
						alertBootstrap([
							'name' => 'crud-flashdata',
							'message' => 'Data gagal diupdate',
							'type' => 'danger'
						]);
					}
				} else {
					$res = $this->dja_model->updateData($array['table'], $array['modified_save'], [$array['field'] => $array['id']]);
					if ($res) {
						alertBootstrap([
							'name' => 'crud-flashdata',
							'message' => 'Data berhasil diupdate',
							'type' => 'success'
						]);
					} else {
						alertBootstrap([
							'name' => 'crud-flashdata',
							'message' => 'Data gagal diupdate',
							'type' => 'danger'
						]);
					}
				}
			} else {
				if (!array_key_exists('modified_save', $array)) {
					if ($nid) {
						$res = $this->dja_model->addData($array['table'], $simpan, true);
						if ($res) {
							alertBootstrap([
								'name' => 'crud-flashdata',
								'message' => 'Data berhasil ditambahkan',
								'type' => 'success'
							]);
							return $res;
						} else {
							alertBootstrap([
								'name' => 'crud-flashdata',
								'message' => 'Data gagal ditambahkan',
								'type' => 'danger'
							]);
							return $res;
						}
					} else {
						$res = $this->dja_model->addData($array['table'], $simpan);
						if ($res) {
							alertBootstrap([
								'name' => 'crud-flashdata',
								'message' => 'Data berhasil ditambahkan',
								'type' => 'success'
							]);
						} else {
							alertBootstrap([
								'name' => 'crud-flashdata',
								'message' => 'Data gagal ditambahkan',
								'type' => 'danger'
							]);
						}
					}
				} else {
					if ($nid) {
						$res = $this->dja_model->addData($array['table'], $array['modified_save'], true);
						if ($res) {
							alertBootstrap([
								'name' => 'crud-flashdata',
								'message' => 'Data berhasil ditambahkan',
								'type' => 'success'
							]);
							return $res;
						} else {
							alertBootstrap([
								'name' => 'crud-flashdata',
								'message' => 'Data gagal ditambahkan',
								'type' => 'danger'
							]);
							return $res;
						}
					} else {
						$res = $this->dja_model->addData($array['table'], $array['modified_save']);
						if ($res) {
							alertBootstrap([
								'name' => 'crud-flashdata',
								'message' => 'Data berhasil ditambahkan',
								'type' => 'success'
							]);
						} else {
							alertBootstrap([
								'name' => 'crud-flashdata',
								'message' => 'Data gagal ditambahkan',
								'type' => 'danger'
							]);
						}
					}
				}
			}
			if (isset($redirect_true) && isset($redirect_false)) {
				if ($res) {
					return redirect()->route($redirect_true);
				} else {
					return redirect()->route($redirect_false);
				}
			}
		}
		if (array_key_exists('data_lain', $array)) {
			foreach ($array['data_lain'] as $key => $dl) {
				$data["$key"] = $dl;
			}
		}


		return view($array['load'], $data);
	}
}
