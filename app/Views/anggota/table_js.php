<script>
    $(function() {
        var tableAnggota = $('.table-anggota').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'print'
            ],
            ajax: "<?= base_url('anggota/table_anggota') ?>"
        });
        setInterval(function() {
            tableAnggota.ajax.reload();
        }, 3000);
        $(document).on('click', '.btn-del', function(event_delete) {
            event_delete.target.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin ingin menghapusnya ?',
                text: "Data anggota ini akan terhapus",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
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
                                    Swal.fire({
                                        type: 'success',
                                        title: 'Data berhasil dihapus',
                                        html: 'Data berhasil dihapus'
                                    });
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
                                Swal.fire({
                                    type: 'error',
                                    title: 'Data gagal dihapus',
                                    html: 'Data gagal dihapus'
                                });
                            }
                        });
                    }
                }
            });
        });
    });
</script>