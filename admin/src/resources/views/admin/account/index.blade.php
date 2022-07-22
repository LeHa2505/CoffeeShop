@extends('admin.layouts.layouts')

@section('style')
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/account.css">
@endsection

@section('content')
    <div class="productPage">
        <div class="container page-inner mt-3 mt-lg-4">
            <div class="row box-title mb-1 mb-lg-2">
                <div class="col-6">
                    <h2>Quản lý tài khoản</h2>
                </div>
                <div class="col-6 text-right">
                    <button type="button" class="btn rounded-pill btn-add" id="btn_create_product" data-toggle="modal" data-target="#modal-add">
                        <i class="fas fa-plus mr-2"></i>
                        Thêm mới
                    </button>
                </div>
            </div>
            <div class="table-responsive box-table">
                <table class="table table-list display nowrap" id="table-accounts">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.accounts.create') }}" method="POST" id="form-add" autocomplete="off">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold">Thêm tài khoản Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body px-5">
                        <div class="form-group">
                            <label for="input-name">Tên:</label>
                            <input type="text" name="name" class="form-control" id="input-name" placeholder="Nhập tên Admin">
                        </div>
                        <div class="form-group">
                            <label for="input-email">Email:</label>
                            <input type="email" name="email" class="form-control" id="input-email" placeholder="Nhập Email">
                        </div>
                        <div class="form-group">
                            <label for="input-password">Mật khẩu:</label>
                            <input type="password" name="password" class="form-control" id="input-password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label for="input-confirm-password">Xác nhận mật khẩu:</label>
                            <input type="password" name="repassword" class="form-control" id="input-confirm-password" placeholder="Nhập lại mật khẩu">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-brown" id="btn-submit">Tạo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Xác nhận</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bạn có chắc chắn với hành động của mình không?</p>
                    <form action="{{ route('admin.accounts.delete') }}">
                        <input id="_id" type="hidden" name="id" value="" />
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal" aria-label="Close" aria-invalid="false">Hủy</button>
                    <button type="button" class="btn btn-brown btn-confirm">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.accounts.update') }}" method="POST" id="form-edit" autocomplete="off">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold">Chỉnh sửa tài khoản Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body px-5">
                        <input type="hidden" name="id" id="input-id">
                        <div class="form-group">
                            <label for="input-name">Tên:</label>
                            <input type="text" name="name" class="form-control" id="input-name" placeholder="Nhập tên Admin">
                        </div>
                        <div class="form-group">
                            <label for="input-email">Email:</label>
                            <input type="email" name="email" class="form-control" id="input-email" placeholder="Nhập Email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-brown">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-change" tabindex="-1" role="dialog" aria-labelledby="modalChange" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.accounts.update') }}" method="POST" id="form-change" autocomplete="off">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold">Thay đổi mật khẩu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body px-5">
                        <input type="hidden" name="id" id="input-id">
                        <div class="form-group">
                            <label for="input-password">Mật khẩu:</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                        </div>
                        <div class="form-group">
                            <label for="input-confirm-password">Xác nhận mật khẩu:</label>
                            <input type="password" name="repassword" class="form-control" id="input-confirm-password" placeholder="Nhập lại mật khẩu">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-brown">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="bg-loading d-none">
        <div class="spinner-border text-light" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
@endsection

@section('script')
    <script src="/assets/js/datatables-config.js"></script>
    <script type="text/javascript">
        var table = $('#table-accounts').DataTable({
            bDestroy: false,
            columnDefs: [
                {
                    className: 'text-center',
                    targets: [0, 4]
                }
            ],
            ajax: {
                url: "{!! route('admin.accounts.show') !!}",
            },
            columns: [
                {
                    data: null,
                    render: (data, type, row, meta) => (meta.row + 1)
                },
                {
                    data: 'name',
                },
                {
                    data: 'email'
                },
                {
                    data: 'status',
                    orderable: false,
                    render: function ( data, type, row, meta ) {
                        return data === 1 ?
                            `<div class="btn-group btn-toggle rounded-pill btn-switch">
                                    <button class="btn btn-sm btn-check-active rounded-pill active">On</button>
                                    <button class="btn btn-sm btn-check-unactive rounded-pill">Off</button>
                                </div>` :
                            `<div class="btn-group btn-toggle rounded-pill btn-switch">
                                    <button class="btn btn-sm btn-check-active rounded-pill">On</button>
                                    <button class="btn btn-sm btn-check-unactive rounded-pill unactive">Off</button>
                                </div>`;
                    }
                },
                {
                    data: null,
                    render: function ( data, type, row, meta ) {
                        return '<button type="button" class="btn btn-sm button btn-change" data-toggle="modal" data-target="#modal-change">'
                            +'<i class="fas fa-unlock-alt"></i>'
                            +' Đổi mật khẩu'
                            +'</button>'
                            +'<button class="btn btn-sm button btn-detail edit mx-3">'
                            +'<i class="fas fa-edit"></i></button>'
                            +'<button class="btn btn-sm button btn-destroy">'
                            +'<i class="fas fa-trash"></i>';
                    },
                }
            ]
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        var option = {
            onfocusout: function (element) {
                var $element = $(element);
                $element.valid();
            },
            onkeyup: function (element) {
                var $row = $(element).closest(".form-control");
                if ($row.hasClass("is-row-error")) {
                    $(element).valid();
                }
            },
            highlight: function (element, errorClass, validClass) {
                var $row = $(element).closest(".form-control");
                $row.addClass("is-row-error");
                $row.removeClass("is-row-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                var $row = $(element).closest(".form-control");
                $row.addClass("is-row-valid");
                $row.removeClass("is-row-error");
            },
            rules: {
                name: {
                    required: true,
                    maxlength: 64,
                },
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    maxlength: 32,
                    minlength: 6,
                },
                repassword: {
                    equalTo: "#input-password"
                },
            },
            messages: {
                name: {
                    required: "Đây là trường bắt buộc.",
                    maxlength: "Độ dài tối đa là 64 ký tự.",
                },
                email: {
                    required: "Đây là trường bắt buộc.",
                    email: "Email không đúng định dạng.",
                },
                password: {
                    required: "Đây là trường bắt buộc.",
                    maxlength: "Mật khẩu có độ dài từ 6 - 32 ký tự.",
                    minlength: "Mật khẩu có độ dài từ 6 - 32 ký tự.",
                },
                repassword: {
                    equalTo: "Mật khẩu không khớp.",
                },
            }
        }
        var validator = $("#form-add").validate({
            ...option,
            focusCleanup: true,
            submitHandler: function (form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    beforeSend: function() {
                        $("#form-add").find("#btn-submit")
                            .attr("disabled", "")
                            .html(
                                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Tạo'
                            );
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.id){
                            $("#form-add").find(".btn-cancel").trigger("click");
                            success('Tạo tài khoản Admin thành công.');
                        }
                    },
                    error: function () {
                        $(document).Toasts("create", {
                            class: "bg-danger",
                            title: "Thất bại",
                            autohide: true,
                            delay: 2000,
                            body: "Lỗi khi trong khi tạo tài khoản.",
                        });
                    },
                    complete: function(){
                        $("#form-add").find("#btn-submit").removeAttr("disabled").html("Tạo");
                    }
                });
            },
        });

        $('.modal').on("hide.bs.modal", function () {
            $(this).find('input').val('');
            validator.resetForm();
            validatorEdit.resetForm();
            validatorChange.resetForm();
        });

        $('#table-accounts').on('click', '.btn-switch', function () {
            var data = table.row($(this).parents("tr")).data();
            console.log(data);
            $.ajax({
                url: '{{ route('admin.accounts.update') }}',
                type: 'POST',
                data: {
                    id: data.id,
                    status: data.status ? 0 : 1
                },
                beforeSend: function() {
                    $('.bg-loading').removeClass('d-none').addClass('d-flex');
                },
                success: function (response) {
                    if (response){
                        success('Cập nhật trạng thái thành công.');
                    }
                },
                error: function () {
                    $(document).Toasts("create", {
                        class: "bg-danger",
                        title: "Thất bại",
                        autohide: true,
                        delay: 2000,
                        body: "Lỗi khi trong khi cập nhật trạng thái.",
                    });
                },
                complete: function(){
                    $('.bg-loading').removeClass('d-flex').addClass('d-none');
                }
            });
        });

        $('#table-accounts').on('click', '.btn-destroy', function () {
            var data = table.row($(this).parents("tr")).data();
            $('#modal-confirm').find('#_id').val(data.id);
            $('#modal-confirm').modal('show');
        });

        $('#modal-confirm .btn-confirm').click(function () {
            $.ajax({
                url: '{{ route('admin.accounts.delete') }}',
                type: 'POST',
                data: {
                    id: $('#modal-confirm').find('#_id').val()
                },
                beforeSend: function() {
                    $('.bg-loading').removeClass('d-none').addClass('d-flex');
                },
                success: function (response) {
                    if (response){
                        success('Xóa tài khoản Admin thành công.');
                        $('#modal-confirm .close').trigger('click');
                    }
                },
                error: function () {
                    $(document).Toasts("create", {
                        class: "bg-danger",
                        title: "Thất bại",
                        autohide: true,
                        delay: 2000,
                        body: "Lỗi khi trong khi cập nhật trạng thái.",
                    });
                },
                complete: function(){
                    $('.bg-loading').removeClass('d-flex').addClass('d-none');
                }
            });
        });

        $('#table-accounts').on('click', '.btn-detail', function () {
            var data = table.row($(this).parents("tr")).data();
            $('#form-edit').find('#input-id').val(data.id);
            $('#form-edit').find('#input-name').val(data.name);
            $('#form-edit').find('#input-email').val(data.email);
            $('#modal-edit').modal('show');
        });

        var validatorEdit = $("#form-edit").validate({
            onfocusout: function (element) {
                var $element = $(element);
                $element.valid();
            },
            onkeyup: function (element) {
                var $row = $(element).closest(".form-control");
                if ($row.hasClass("is-row-error")) {
                    $(element).valid();
                }
            },
            highlight: function (element, errorClass, validClass) {
                var $row = $(element).closest(".form-control");
                $row.addClass("is-row-error");
                $row.removeClass("is-row-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                var $row = $(element).closest(".form-control");
                $row.addClass("is-row-valid");
                $row.removeClass("is-row-error");
            },
            rules: {
                name: {
                    required: true,
                    maxlength: 64,
                },
                email: {
                    required: true,
                    email: true,
                }
            },
            messages: {
                name: {
                    required: "Đây là trường bắt buộc.",
                    maxlength: "Độ dài tối đa là 64 ký tự.",
                },
                email: {
                    required: "Đây là trường bắt buộc.",
                    email: "Email không đúng định dạng.",
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    beforeSend: function() {
                        $('.bg-loading').removeClass('d-none').addClass('d-flex');
                    },
                    success: function (response) {
                        if (response){
                            success('Chỉnh sửa tài khoản Admin thành công.');
                            $('#modal-edit .close').trigger('click');
                        }
                    },
                    error: function () {
                        $(document).Toasts("create", {
                            class: "bg-danger",
                            title: "Thất bại",
                            autohide: true,
                            delay: 2000,
                            body: "Lỗi khi trong khi cập nhật trạng thái.",
                        });
                    },
                    complete: function(){
                        $('.bg-loading').removeClass('d-flex').addClass('d-none');
                    }
                });
            }
        });

        $('#table-accounts').on('click', '.btn-change', function () {
            var data = table.row($(this).parents("tr")).data();
            $('#modal-change').find('.modal-title').text('Thay đổi mật khẩu: ' + data.name);
            $('#form-change').find('#input-id').val(data.id);
            $('#modal-change').modal('show');
        });

        var validatorChange = $("#form-change").validate({
            onfocusout: function (element) {
                var $element = $(element);
                $element.valid();
            },
            onkeyup: function (element) {
                var $row = $(element).closest(".form-control");
                if ($row.hasClass("is-row-error")) {
                    $(element).valid();
                }
            },
            highlight: function (element, errorClass, validClass) {
                var $row = $(element).closest(".form-control");
                $row.addClass("is-row-error");
                $row.removeClass("is-row-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                var $row = $(element).closest(".form-control");
                $row.addClass("is-row-valid");
                $row.removeClass("is-row-error");
            },
            rules: {
                password: {
                    required: true,
                    maxlength: 32,
                    minlength: 6,
                },
                repassword: {
                    equalTo: "#password"
                },
            },
            messages: {
                password: {
                    required: "Đây là trường bắt buộc.",
                    maxlength: "Mật khẩu có độ dài từ 6 - 32 ký tự.",
                    minlength: "Mật khẩu có độ dài từ 6 - 32 ký tự.",
                },
                repassword: {
                    equalTo: "Mật khẩu không khớp.",
                },
            },
            submitHandler: function(form) {
                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: $(form).serialize(),
                    beforeSend: function() {
                        $('.bg-loading').removeClass('d-none').addClass('d-flex');
                    },
                    success: function (response) {
                        if (response){
                            success('Thay đổi mật khẩu thành công.');
                            $('#modal-change .close').trigger('click');
                        }
                    },
                    error: function () {
                        $(document).Toasts("create", {
                            class: "bg-danger",
                            title: "Thất bại",
                            autohide: true,
                            delay: 2000,
                            body: "Lỗi khi trong khi cập nhật trạng thái.",
                        });
                    },
                    complete: function(){
                        $('.bg-loading').removeClass('d-flex').addClass('d-none');
                    }
                });
            }
        });

    </script>
@endsection
