<script>
    $(document).ready(function() {
        var tableBulan = $('.table-anggota-belum-bayar').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'print'
            ],
            ajax: "<?= base_url('iuran_wajib/table_anggota_iuran/' . base64_encode($singledata->id_bulan_iuran)); ?>"
        });
        var tableBulan2 = $('.table-anggota-sudah-bayar').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'print'
            ],
            ajax: "<?= base_url('iuran_wajib/table_anggota_sudah_bayar_iuran/' . base64_encode($singledata->id_bulan_iuran)); ?>"
        });
        $(document).on('click', '.btn-belum-bayar', function(event_belum_bayar) {
            Swal.fire({
                type: 'question',
                title: 'Apakah anda yakin ingin mengubahnya menjadi sudah dibayar ?',
                html: 'Perubahan status bayar',
                showCancelButton: true,
                cancelButtonColor: '#f00',
                confirmButtonText: 'Ya'
            }).then(function(res) {
                if (res.value) {
                    Swal.fire({
                        title: 'Nominal Iuran Wajib',
                        input: 'number',
                        inputAttributes: {
                            autocapitalize: 'off'
                        },
                        showCancelButton: true,
                        confirmButtonText: 'Enter',
                        showLoaderOnConfirm: true,
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if (result.value) {
                            let anggota = event_belum_bayar.target.dataset.anggota;
                            let iuran = event_belum_bayar.target.dataset.iuran;
                            let nominal = result.value;
                            $.ajax({
                                url: "<?= base_url('iuran_wajib/update_status_iuran_wajib/') ?>",
                                type: 'post',
                                data: {
                                    id_anggota: anggota,
                                    id_iuran: iuran,
                                    nominal_iuran: nominal
                                },
                                success: function(result) {
                                    if (result) {
                                        Swal.fire({
                                            type: 'success',
                                            title: 'Berhasil diubah',
                                            html: 'Data anggota berhasil diubah'
                                        });
                                    } else {
                                        Swal.fire({
                                            type: 'error',
                                            title: 'Gagal diubah',
                                            html: 'Data anggota gagal diubah'
                                        });
                                    }
                                },
                                error: function(result) {
                                    Swal.fire({
                                        type: 'error',
                                        title: 'Gagal diubah',
                                        html: 'Data anggota gagal diubah'
                                    });
                                }
                            });
                        }
                    })
                }

            })
        });
        $(document).on('click', '.btn-sudah-bayar', function(event_sudah_bayar) {
            Swal.fire({
                type: 'question',
                title: 'Apakah anda yakin ingin mengubahnya menjadi belum dibayar ?',
                html: 'Perubahan status bayar',
                showCancelButton: true,
                cancelButtonColor: '#f00',
                confirmButtonText: 'Ya'
            }).then(function(result) {
                let anggota = event_sudah_bayar.target.dataset.anggota;
                let iuran = event_sudah_bayar.target.dataset.iuran;
                let iuran_wajib = event_sudah_bayar.target.dataset.iuranwajib;
                $.ajax({
                    url: "<?= base_url('iuran_wajib/update_status_iuran_wajib/') ?>",
                    type: 'post',
                    data: {
                        id_anggota: anggota,
                        id_iuran: iuran,
                        id_iuran_wajib: iuran_wajib
                    },
                    success: function(result) {
                        console.log(result);

                        if (result) {
                            Swal.fire({
                                type: 'success',
                                title: 'Berhasil diubah',
                                html: 'Data anggota berhasil diubah'
                            });
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Gagal diubah',
                                html: 'Data anggota gagal diubah'
                            });
                        }
                    },
                    error: function(result) {
                        Swal.fire({
                            type: 'error',
                            title: 'Gagal diubah',
                            html: 'Data anggota gagal diubah'
                        });
                    }
                });
            });
        });

        function update_table_detail() {
            $.ajax({
                url: "<?= base_url('iuran_wajib/json_single_iuran_wajib/'); ?>",
                type: 'post',
                data: {
                    id_bulan_iuran: "<?= base64_encode($singledata->id_bulan_iuran); ?>"
                },
                success: function(result) {
                    $('td.jumlah-anggota-bayar').html(result.anggota_bulan_iuran);
                    $('td.jumlah-total-bulan').html(result.total_bulan_iuran);
                },
            })
        }

        function refresh_data() {
            update_table_detail();
        }
        setInterval(function() {
            tableBulan.ajax.reload();
            tableBulan2.ajax.reload();
            refresh_data();
        }, 3000);
    });
</script>