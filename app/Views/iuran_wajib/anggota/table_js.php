<script>
    var tableIuranWajibKu = $('.dataTable').DataTable({
        ajax: "<?= base_url('iuran_wajib/table_riwayat_iuran_wajib'); ?>"
    });
    setInterval(function() {
        tableIuranWajibKu.ajax.reload();
    }, 3000);
</script>