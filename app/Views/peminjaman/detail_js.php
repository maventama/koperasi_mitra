<script>
    var tableAngsuran = $('#dataTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ],
        ajax: "<?= base_url('peminjaman/table_angsuran/' . $singledata->id_peminjaman); ?>"
    });
    var tableRiwayatAngsuran = $('.table-riwayat-angsuran').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ],
        ajax: "<?= base_url('peminjaman/table_riwayat_angsuran/' . $singledata->id_peminjaman); ?>"
    });
    setInterval(function() {
        tableAngsuran.ajax.reload();
        tableRiwayatAngsuran.ajax.reload();
        refresh_data();
    }, 3000);
    $(document).on('click', '.label-angsuran', function(event_label_angsuran) {
        let id_angsuran = event_label_angsuran.target.dataset.id;
        let status_angsuran = event_label_angsuran.target.dataset.status;

        if (status_angsuran == 1) {
            var text_swal = 'Angsuran ini akan diubah statusnya menjadi Sudah Dibayarkan';
        } else {
            var text_swal = 'Angsuran ini akan diubah statusnya menjadi Belum Dibayarkan';
        }
        Swal.fire({
            title: 'Apakah anda yakin ingin mengubah statusnya ?',
            text: text_swal,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, ubah!'
        }).then((result) => {
            if (result.value) {
                // if (result.value) {
                // let id_peminjaman = event_delete.target.dataset.id;
                $.ajax({
                    url: "<?= base_url('peminjaman/update_status_angsuran'); ?>",
                    type: 'post',
                    data: {
                        id_angsuran: id_angsuran
                    },
                    success: function(result) {
                        if (result) {
                            if (result != 'not_finish') {
                                Swal.fire({
                                    type: 'success',
                                    title: 'Angsuran berhasil diperbarui',
                                    html: 'Status angsuran berhasil diperbarui'
                                });
                            } else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Angsuran gagal diperbarui',
                                    html: 'Status pada angsuran terakhir gagal diperbarui karena masih ada angsuran yang belum dibayarkan'
                                });
                            }
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Angsuran gagal diperbarui',
                                html: 'Status angsuran gagal diperbarui'
                            });
                        }
                    },
                    error: function(result) {
                        Swal.fire({
                            type: 'error',
                            title: 'Angsuran gagal diperbarui',
                            html: 'Status angsuran gagal diperbarui'
                        });
                    }
                });
                // }
            }
        })
    });

    function refresh_data() {
        update_angsuran();
    }

    $('.btn-multiple').on('click', function(btn_multiple) {
        $.ajax({
            url: "<?= base_url('peminjaman/edit_multiple_angsuran/' . $singledata->id_peminjaman); ?>",
            type: 'post',
            success: function(result_multiple) {
                $('h5.modal-title').html('Edit Peminjaman');
                $('form#modal_form').attr({
                    action: "<?= base_url('peminjaman/render_form'); ?>"
                });
                $('.main-modal-body').html("<div class='row'><div class='col-md-12'>" + result_multiple + "</div></div><div class='row mt-3'><div class='col-md-12' id='input-jasa'></div></div>");
                $('.main-modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><div style="cursor:pointer;" class="btn btn-primary btn-main-modal btn-submit-multiple">Save changes</div>');
                $('#mainModal').modal('show');
            }
        });
    });

    function update_angsuran() {
        $.ajax({
            url: "<?= base_url('peminjaman/data_total_angsuran/' . $singledata->id_peminjaman); ?>",
            type: "post",
            success: function(result) {
                $('.sudah-bayar').html(result[1]);
                $('.belum-bayar').html(result[0]);
                $('.status-peminjaman').html(result[2]);
            }
        });
    }
    $(document).on('click', '.btn-edit', function(event_edit) {
        let id_peminjaman = event_edit.target.dataset.id;
        $.ajax({
            url: "<?= base_url('peminjaman/render_form'); ?>",
            type: 'post',
            data: {
                id_peminjaman: id_peminjaman
            },
            success: function(res_edit) {
                $('h5.modal-title').html('Edit Peminjaman');
                $('form#modal_form').attr({
                    action: "<?= base_url('peminjaman/render_form'); ?>"
                });
                let table_content = '';
                for (let i = 1; i <= res_edit[1].length; i++) {
                    table_content += '<tr><td>' + i + '</td><td>' + res_edit[1][(i - 1)] + '</td></tr>';
                }
                $('.main-modal-body').html("<div class='row'><div class='col-md-6'>" + res_edit[0] + "<input type='hidden' name='id_peminjaman' value='" + id_peminjaman + "'></div><div class='col-md-6'><h4>Tabel Prediksi Angsuran</h4><table class='table table-hover table-responsive tableAngsuran'><tr><th>Bulan</th><th>Nominal Angsuran</th></tr><tbody class='table-angsuran-body'>" + table_content + "</tbody></table><br><span id='total-hutang'></span></div></div>");
                $('.main-modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button class="btn btn-primary btn-main-modal" type="submit" value="edit">Save changes</button>');
                $('#mainModal').modal('show');
            },
            error: function(res_edit) {
                console.log(res_edit);
            }
        })
    });
    $(document).on('click', '.btn-del', function(event_delete) {
        // event_delete.target.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin ingin menghapusnya ?',
            text: "Semua data didalamnya seperti angsuran dan riwayat bayar akan ikut tehapus!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                // if (result.value) {
                let id_peminjaman = event_delete.target.dataset.id;
                $.ajax({
                    url: "<?= base_url('peminjaman/delete'); ?>",
                    type: 'post',
                    data: {
                        id_peminjaman: id_peminjaman
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
                // }
            }
        })
    });
    $(document).on('keyup', '.input-bulan', function(event_input_bulan) {
        let jumlah_bulan = event_input_bulan.target.value;
        let contentAngsuranBody = '';
        for (let i = 0; i < parseInt(jumlah_bulan); i++) {
            if ($('.input-hutang-pokok').val() != '' && $('.input-persen-jasa').val() != '') {
                let hutangPokok = parseInt($('.input-hutang-pokok').val());
                let persen = parseInt($('.input-persen-jasa').val());
                let jasa = hutangPokok / persen;
                let hutangPokokPerbulan = hutangPokok / parseInt(jumlah_bulan);
                let jasaPerbulan = parseInt(jasa) / parseInt(jumlah_bulan);
                let angsuranPerbulan = hutangPokokPerbulan + jasaPerbulan;
                contentAngsuranBody += "<tr><td>" + (i + 1) + "</td><td>Rp. " + angsuranPerbulan + "</td></tr>";
                $('#total-hutang').html('Total keseluruhan : ' + angsuranPerbulan * jumlah_bulan);
            } else {
                contentAngsuranBody += "<tr><td>" + (i + 1) + "</td><td></td></tr>";
            }
        }
        $('.table-angsuran-body').html(contentAngsuranBody);
    });
    $(document).on('keyup', '.input-hutang-pokok', function(event_input_hp) {
        let hutangPokok = event_input_hp.target.value;
        let persen = $('.input-persen-jasa').val();
        let jasa = parseInt(hutangPokok) / parseInt(persen);
        $('.input-jasa').val(parseInt(jasa));
        if (parseInt(hutangPokok) > 5000000) {
            let jumlah_bulan = 10;
            $('.input-bulan').val(jumlah_bulan);
            let contentAngsuranBody = '';
            for (let i = 0; i < parseInt(jumlah_bulan); i++) {
                if ($('.input-hutang-pokok').val() != '' && $('.input-persen-jasa').val() != '') {
                    let hutangPokok = parseInt($('.input-hutang-pokok').val());
                    let persen = parseInt($('.input-persen-jasa').val());
                    let jasa = hutangPokok / persen;
                    let hutangPokokPerbulan = hutangPokok / parseInt(jumlah_bulan);
                    let jasaPerbulan = parseInt(jasa) / parseInt(jumlah_bulan);
                    let angsuranPerbulan = hutangPokokPerbulan + jasaPerbulan;
                    contentAngsuranBody += "<tr><td>" + (i + 1) + "</td><td>Rp. " + angsuranPerbulan + "</td></tr>";
                    $('#total-hutang').html('Total keseluruhan : ' + angsuranPerbulan * jumlah_bulan);
                } else {
                    contentAngsuranBody += "<tr><td>" + (i + 1) + "</td><td></td></tr>";
                    $('#total-hutang').html('Total keseluruhan : ');
                }
            }
            $('.table-angsuran-body').html(contentAngsuranBody);
        } else {
            $('.input-bulan').val('');
            $('.table-angsuran-body').html('');
            $('#total-hutang').html('Total keseluruhan : ');
        }
    });
    $('form#modal_form').on('submit', function(form_submit) {
        form_submit.preventDefault();
        $.ajax({
            url: "<?= base_url('peminjaman/render_form'); ?>",
            data: $(this).serialize(),
            type: 'post',
            success: function(result_peminjaman) {
                if (result_peminjaman) {
                    if (result_peminjaman != 'ongoing') {

                        $('#mainModal').modal('hide');
                        if ($('.btn-main-modal').val() != 'edit') {
                            Swal.fire({
                                type: 'success',
                                title: 'Berhasil ditambahkan',
                                html: 'Peminjaman berhasil ditambahkan'
                            });
                        } else {
                            Swal.fire({
                                type: 'success',
                                title: 'Berhasil diubah',
                                html: 'Peminjaman berhasil diubah'
                            });
                        }
                    } else {
                        $('#mainModal').modal('hide');
                        Swal.fire({
                            type: 'error',
                            title: 'Gagal diubah',
                            html: 'Anda tidak bisa mengubah peminjaman ketika sudah ada angsuran yang sudah dibayarkan'
                        });
                    }
                } else {
                    if ($('.btn-main-modal').val() != 'edit') {
                        Swal.fire({
                            type: 'error',
                            title: 'Gagal ditambahkan',
                            html: 'Peminjaman gagal ditambahkan'
                        });
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Gagal diubah',
                            html: 'Peminjaman gagal diubah'
                        });
                    }
                }
            },
            error: function(result_peminjaman) {
                if ($('.btn-main-modal').val() != 'edit') {
                    Swal.fire({
                        type: 'error',
                        title: 'Gagal ditambahkan',
                        html: 'Peminjaman gagal ditambahkan'
                    });
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Gagal diubah',
                        html: 'Peminjaman gagal diubah'
                    });
                }
            }
        });
    });


    function removeA(arr) {
        var what, a = arguments,
            L = a.length,
            ax;
        while (L > 1 && arr.length) {
            what = a[--L];
            while ((ax = arr.indexOf(what)) !== -1) {
                arr.splice(ax, 1);
            }
        }
        return arr;
    }
    var checked_angsuran = [];
    var hutang_pokok = 0;
    var jasa = 0;
    $(document).on('click', '.check-angsuran', function(result_multiple) {
        let id_angsuran = result_multiple.target.value;
        if (result_multiple.target.checked) {
            hutang_pokok += parseInt(result_multiple.target.dataset.pokok);
            jasa = parseInt(result_multiple.target.dataset.jasa);
            checked_angsuran.push(id_angsuran);
            let total = hutang_pokok + parseInt(jasa);
            $('#input-jasa').html('<div class="form-group "><label for="jasa" class="control-label">Jasa</label><input type="number" id="jasa" name="jasa" class="form-control input-hutang-pokok" value="' + jasa + '"><br>Total : Rp. ' + total + '</div>');
        } else {
            if (checked_angsuran.length == 1) {
                jasa = 0;
                hutang_pokok = 0;
                checked_angsuran = [];
                let total = (parseInt(hutang_pokok) * parseInt(checked_angsuran.length)) + parseInt(jasa);
                $('#input-jasa').html('<div class="form-group "><label for="jasa" class="control-label">Jasa</label><input type="number" id="jasa" name="jasa" class="form-control input-hutang-pokok" value="' + jasa + '"><br>Total : Rp. ' + total + '</div>');
            } else {
                console.log(hutang_pokok);

                hutang_pokok = hutang_pokok - parseInt(result_multiple.target.dataset.pokok);
                console.log(hutang_pokok);

                removeA(checked_angsuran, id_angsuran);
                let total = hutang_pokok + parseInt(jasa);
                $('#input-jasa').html('<div class="form-group "><label for="jasa" class="control-label">Jasa</label><input type="number" id="jasa" name="jasa" class="form-control input-hutang-pokok" value="' + jasa + '"><br>Total : Rp. ' + total + '</div>');
            }
        }
        // if (checked_angsuran.length > 0) {
        // }
    });
    $(document).on('click', '.btn-submit-multiple', function(submit_multiple) {
        $.ajax({
            url: "<?= base_url('peminjaman/edit_multiple_angsuran/' . $singledata->id_peminjaman); ?>",
            type: 'post',
            data: {
                angsuran: checked_angsuran,
                jasa: jasa
            },
            success: function(res_ajax_multiple) {
                $('#mainModal').modal('hide');
                checked_angsuran = [];
                hutang_pokok = 0;
                jasa = 0;
                if (res_ajax_multiple) {
                    Swal.fire({
                        type: 'success',
                        title: 'Angsuran berhasil diubah',
                        html: 'Status angsuran berhasil diubah'
                    });
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Angsuran gagal diubah',
                        html: 'Status angsuran gagal diubah'
                    });
                }
            },
            error: function(res_ajax_multiple) {
                Swal.fire({
                    type: 'error',
                    title: 'Angsuran gagal diubah',
                    html: 'Status angsuran gagal diubah'
                });
            },
        })
    });
</script>