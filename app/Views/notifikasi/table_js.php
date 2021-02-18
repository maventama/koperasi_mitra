<script>
    $(function() {
        var tableNotifikasi = $('.table-notif').DataTable({
            ajax: "<?= base_url('notifikasi/table'); ?>"
        });
        setInterval(function() {
            tableNotifikasi.ajax.reload();
        }, 3000);
    });
</script>