<script src="/admin-lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin-lte/dist/js/adminlte.min.js"></script>
<!-- Datatables -->
<script src="/admin-lte/plugins/datatables/jquery.dataTables.js"></script>
<script src="/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="/admin-lte/plugins/datatables-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.js"></script>
<script src="/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.js"></script>
<!-- Jquery-number -->
<script src="/admin-lte/plugins/jquery-number/js/jquery.number.min.js"></script>
<!-- Toastr -->
<script src="/admin-lte/plugins/toastr/toastr.min.js"></script>
<!-- Validation -->
<script src="/admin-lte/plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- Input mask -->
<script src="/admin-lte/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- MomentJs -->
<script src="/admin-lte/plugins/moment/moment.min.js"></script>
<script>
    @if($message = session('success'))
    $(function () {
        $(document).Toasts("create", {
            class: "bg-success",
            title: "Thành công",
            autohide: true,
            delay: 2000,
            body: '{{ $message }}',
        });
    });
    @endif

    function success(mess) {
        $(document).Toasts("create", {
            class: "bg-success",
            title: "Thành công",
            autohide: true,
            delay: 2000,
            body: mess,
        });
        table.ajax.reload(null, false);
    }

    function fail(mess) {
        $(document).Toasts("create", {
            class: "bg-danger",
            title: "Thất bại",
            autohide: true,
            delay: 2000,
            body: mess,
        });
    }
</script>
