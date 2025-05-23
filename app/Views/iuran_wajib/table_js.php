<script>
    $(document).ready(function() {
        var tableTahun = $('.dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'print'
            ],
            ajax: "<?= base_url('iuran_wajib/table_tahun'); ?>"
        });
        setInterval(function() {
            tableTahun.ajax.reload();
        }, 3000);
        $('#btn-add').on('click', function() {
            $.ajax({
                url: "<?= base_url('iuran_wajib/render_form'); ?>",
                type: 'post',
                success: function(data) {
                    console.log(data);
                    $('h5.modal-title').html('Tambah Tahun Iuran Wajib');
                    $('form#modal_form').attr({
                        action: 'koperasi/iuran_wajib/form'
                    });
                    var allInput = '';
                    for (let i = 0; i < data.length; i++) {
                        allInput = allInput + data[i];
                    }
                    $('.main-modal-body').html(allInput);
                    $('.main-modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button class="btn btn-primary btn-main-modal" type="submit">Save changes</button>');
                    $('#mainModal').modal('show');
                }
            });
        });
        $(document).on('click', '.btn-del', function(event_delete) {
            // event_delete.target.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin ingin menghapusnya ?',
                text: "Semua data didalamnya seperti bulan, riwayat bayar iuran disetiap bulannya akan ikut tehapus!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    if (result.value) {
                        let id_tahun = event_delete.target.dataset.id;
                        $.ajax({
                            url: "<?= base_url('iuran_wajib/delete'); ?>",
                            type: 'post',
                            data: {
                                id_tahun_iuran: id_tahun
                            },
                            success: function(result) {
                                if (result) {
                                    Swal.fire({
                                        type: 'success',
                                        title: 'Data berhasil dihapus',
                                        html: 'Data didalamnya juga berhasil dihapus'
                                    });
                                } else {
                                    Swal.fire({
                                        type: 'error',
                                        title: 'Data gagal dihapus',
                                        html: 'Data didalamnya juga gagal dihapus'
                                    });
                                }
                            },
                            error: function(result) {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Data gagal dihapus',
                                    html: 'Data didalamnya juga gagal dihapus'
                                });
                            }
                        });
                    }
                }
            })
        });
        $(document).on('click', '.btn-edit', function(event_edit) {
            let id_tahun = event_edit.target.dataset.id;
            $.ajax({
                url: "<?= base_url('iuran_wajib/render_form'); ?>",
                type: 'post',
                data: {
                    id_tahun_iuran: id_tahun
                },
                success: function(res_edit) {
                    $('h5.modal-title').html('Edit Tahun Iuran Wajib');
                    $('form#modal_form').attr({
                        action: 'koperasi/iuran_wajib/form_edit/' + id_tahun
                    });
                    $('.main-modal-body').html(res_edit);
                    $('.main-modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button class="btn btn-primary btn-main-modal" type="submit" value="edit">Save changes</button>');
                    $('#mainModal').modal('show');
                },
                error: function(res_edit) {
                    console.log(res_edit);
                }
            })
        });
        $('form#modal_form').on('submit', function(e) {
            e.preventDefault();
            let btn_value = e.originalEvent.submitter.value;
            if (btn_value != "edit") {
                $.ajax({
                    url: "<?= base_url('iuran_wajib/form'); ?>",
                    type: 'post',
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response) {
                            Swal.fire({
                                type: 'success',
                                title: 'Berhasil ditambahkan',
                                html: 'Tahun berhasil ditambahkan'
                            });
                            $('#mainModal').modal('hide');
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Gagal ditambahkan',
                                html: 'Tahun gagal ditambahkan'
                            });
                        }
                    },
                    error: function(response) {
                        Swal.fire({
                            type: 'error',
                            title: 'Gagal ditambahkan',
                            html: 'Tahun gagal ditambahkan'
                        });
                    }
                });
            } else {
                $.ajax({
                    url: "<?= base_url('iuran_wajib/form_edit'); ?>",
                    type: 'post',
                    dataType: 'json',
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log(response.responseText);

                        if (response) {
                            Swal.fire({
                                type: 'success',
                                title: 'Berhasil diubah',
                                html: 'Tahun berhasil diubah'
                            });
                            $('#mainModal').modal('hide');
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Gagal diubah',
                                html: 'Tahun gagal diubah'
                            });
                        }
                    },
                    error: function(response) {
                        console.log(response.responseText);

                        Swal.fire({
                            type: 'error',
                            title: 'Gagal diubah',
                            html: 'Tahun gagal diubah'
                        });
                    }
                });
            }
        });
    });
</script>