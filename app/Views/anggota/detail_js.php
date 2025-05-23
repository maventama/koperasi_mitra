<script>
    $(function() {
        var tableIuranWajib = $('.table-iuran-wajib').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'print'
            ],
            ajax: "<?= base_url('anggota/table_iuran_wajib/' . base64_encode($singledata->id_anggota)); ?>"
        });
        var tablePeminjaman = $('.table-peminjaman').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'print'
            ],
            ajax: "<?= base_url('anggota/table_peminjaman/' . base64_encode($singledata->id_anggota)); ?>"
        });
        setInterval(function() {
            tableIuranWajib.ajax.reload();
            tablePeminjaman.ajax.reload();
        }, 3000);
        $(document).on('click', '.btn-del', function(event_delete) {
            // event_delete.target.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin ingin menghapusnya ?',
                text: "Data anggota ini akan terhapus",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                // if (result.value) {
                if (result.value) {
                    let id_anggota = event_delete.target.dataset.id;
                    $.ajax({
                        url: "<?= base_url('anggota/delete'); ?>",
                        type: 'post',
                        data: {
                            id_anggota: id_anggota
                        },
                        success: function(result) {
                            console.log(result);

                            if (result) {
                                document.location.href = "<?= base_url('/anggota?del=success'); ?>";
                            } else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Data gagal dihapus',
                                    html: 'Data gagal dihapus'
                                });
                            }
                        },
                        error: function(result) {
                            console.log(result);

                            console.log(result);
                            Swal.fire({
                                type: 'error',
                                title: 'Data gagal dihapus',
                                html: 'Data gagal dihapus'
                            });
                        }
                    });
                }
                // }
            });
        });
    });
</script>