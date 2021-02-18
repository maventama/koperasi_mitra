<script>
    var tablePeminjaman = $('#dataTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ],
        ajax: "<?= base_url('peminjaman/table'); ?>"
    });
    var tableAngsuran = $('.tableAngsuran').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print'
        ],
    });
    tableAngsuran;
    setInterval(function() {
        tablePeminjaman.ajax.reload();
    }, 3000);
    $('#btn-add').on('click', function() {
        $.ajax({
            url: "<?= base_url('peminjaman/render_form'); ?>",
            type: 'post',
            success: function(data) {
                $('h5.modal-title').html('Tambah Peminjaman');
                $('form#modal_form').attr({
                    action: "<?= base_url('peminjaman/render_form'); ?>"
                });
                $('.main-modal-body').html("<div class='row'><div class='col-md-6'>" + data + "</div><div class='col-md-6'><h4>Tabel Prediksi Angsuran</h4><table class='table table-hover table-responsive tableAngsuran'><tr><th>Bulan</th><th>Nominal Angsuran</th></tr><tbody class='table-angsuran-body'></tbody></table><br><span id='total-hutang'></span></div></div>");
                $('.main-modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button class="btn btn-primary btn-main-modal" type="submit">Save changes</button>');
                $('#mainModal').modal('show');
            }
        });
    });
    $(document).on('click', '.btn-edit', function(event_edit) {
        let id_peminjaman = event_edit.target.dataset.id;
        $.ajax({
            url: "<?= base_url('peminjaman/render_form'); ?>",
            type: 'post',
            data: {
                id_peminjaman: id_peminjaman
            },
            success: function(res_edit) {
                console.log(res_edit);
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
</script>