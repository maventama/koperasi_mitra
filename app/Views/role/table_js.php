<script>
    $(function() {
        var tableRole = $('.table-role').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'print'
            ],
            ajax: "<?= base_url('role/table_role'); ?>"
        });
        setInterval(function() {
            tableRole.ajax.reload();
        }, 3000);
        $(document).on('click', '.btn-del', function(event_delete) {
            // event_delete.target.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin ingin menghapusnya ?',
                text: "Semua data akses di dalamnya akan ikut terhapus!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    // if (result.value) {
                    let id_role = event_delete.target.dataset.id;
                    $.ajax({
                        url: "<?= base_url('role/delete'); ?>",
                        type: 'post',
                        data: {
                            id_role: id_role
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
    })
</script>