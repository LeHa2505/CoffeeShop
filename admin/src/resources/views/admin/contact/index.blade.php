@extends('admin.layouts.layouts')

@section('style')
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/contact.css">
@endsection

@section('content')
    <div class="productPage">
        <div class="container page-inner mt-3 mt-lg-4">
            <div class="row box-title mb-1 mb-lg-2">
                <div class="col-6">
                    <h2>Quản lý hòm thư</h2>
                </div>
            </div>
            <div class="table-responsive box-table">
                <table class="table table-list display nowrap" id="table-contacts">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Người gửi</th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Phản hồi</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Ngày gửi</th>
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
    <div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông tin chi tiết</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body contact-detail">
                    <div class="row">
                        <div class="col-3">
                            <div class="title">Người gửi: </div>
                        </div>
                        <div class="col-9">
                            <div class="content dt-name"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="title">Tiêu đề: </div>
                        </div>
                        <div class="col-9">
                            <div class="content dt-option"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="title">Email: </div>
                        </div>
                        <div class="col-9">
                            <div class="content dt-email"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="title">Số điện thoại:</div>
                        </div>
                        <div class="col-9">
                            <div class="content dt-phone"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="title">Trạng thái:</div>
                        </div>
                        <div class="col-9">
                            <div class="content dt-status"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="title">Ngày gửi: </div>
                        </div>
                        <div class="col-9">
                            <div class="content dt-date"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="title">Phản hồi</div>
                        </div>
                        <div class="col-9">
                            <div class="content dt-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
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
                    <input id="_id" type="hidden" value="" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal" aria-label="Close" aria-invalid="false">Hủy</button>
                    <button type="button" class="btn btn-brown btn-confirm">Xóa</button>
                </div>
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
        var table = $('#table-contacts').DataTable({
            bDestroy: false,
            columnDefs: [
                {
                    className: 'text-center',
                    targets: [0, 3, 4, 6]
                },
                {
                    className: 'text-left',
                    targets: [5]
                }
            ],
            ajax: {
                url: "{!! route('admin.contacts.show') !!}",
            },
            columns: [
                {
                    data: null,
                    render: (data, type, row, meta) => (meta.row + 1)
                },
                {
                    data: 'name'
                },
                {
                    data: 'option',
                    render: function (data, type, row, meta) {
                        return data === 1 ? 'Dịch vụ'
                            : data === 2 ? 'Thêm thông tin'
                            : 'Khác';
                    }
                },
                {
                    data: 'email',
                    render: function (data, type, row, meta) {
                        return data.length > 30 ?
                            data.substr(0, 30) + '…' :
                            data;;
                    }
                },
                {
                    data: 'phone'
                },
                {
                    data: 'feedback',
                    render: function (data, type, row, meta) {
                        return data.length > 50 ?
                            data.substr(0, 50) + '…' :
                            data;;
                    }
                },
                {
                    data: 'status',
                    render: function (data, type, row, meta) {
                        return `<select class="form-select rounded status-select">
                                    <option value="1" ${ data === 1 ? 'selected' : '' }>Mới</option>
                                    <option value="2" ${ data === 2 ? 'selected' : '' }>Đã đọc</option>
                                    <option value="3" ${ data === 3 ? 'selected' : '' }>Đã trả lời</option>
                                  </select>`;
                    }
                },
                {
                    data: 'created_at',
                    render: function (data, type, row, meta) {
                        return moment(data).format('DD-MM-YYYY');
                    }
                },
                {
                    data: null,
                    defaultContent: `<button class="btn btn-outline btn-show">
                                <i class="far fa-eye"></i>
                            </button>
                            <button class="btn btn-outline btn-delete">
                                <i class="far fa-trash-alt"></i>
                            </button>`
                }
            ]
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $('#table-contacts').on('click', '.btn-delete', function () {
            var data = table.row($(this).parents("tr")).data();
            $('#modal-delete').find('#_id').val(data.id);
            $('#modal-delete').modal('show');
        });

        $('#modal-delete .btn-confirm').click(function () {
            $.ajax({
                url: '{{ route('admin.contacts.delete') }}',
                type: 'POST',
                data: {
                    id: $('#modal-delete').find('#_id').val()
                },
                beforeSend: function() {
                    $('.bg-loading').removeClass('d-none').addClass('d-flex');
                },
                success: function (response) {
                    if (response) {
                        success('Xóa thư thành công.');
                        $('#modal-delete .close').trigger('click');
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

        $('#table-contacts').on('click', '.btn-show', function () {
            var data = table.row($(this).parents("tr")).data();

            $('#modal-detail').find('.dt-name').text(data.name);
            $('#modal-detail').find('.dt-option').text(data.option === 1 ? 'Dịch vụ' : data.option === 2 ? 'Thêm thông tin' : 'Khác');
            $('#modal-detail').find('.dt-email').text(data.email);
            $('#modal-detail').find('.dt-phone').text(data.phone);
            $('#modal-detail').find('.dt-status').text(data.status === 1 ? 'Mới' : data.status === 2 ? 'Đã đọc' : 'Đã trả lời');
            $('#modal-detail').find('.dt-date').text(moment(data.created_at).format('DD-MM-YYYY'));
            $('#modal-detail').find('.dt-feedback').text(data.feedback);
            $('#modal-detail').modal('show');
        });

        $('#table-contacts').on('change', '.status-select', function () {
            var data = table.row($(this).parents("tr")).data();
            $.ajax({
                url: '{{ route('admin.contacts.update') }}',
                type: 'POST',
                data: {
                    id: data.id,
                    status: $(this).val()
                },
                beforeSend: function() {
                    $('.bg-loading').removeClass('d-none').addClass('d-flex');
                },
                success: function (response) {
                    if (response) {
                        success('Cập nhật trạng thái thành công.');
                        $('#modal-delete .close').trigger('click');
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
    </script>
@endsection
