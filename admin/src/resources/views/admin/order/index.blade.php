@extends('admin.layouts.layouts')

@section('style')
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/order.css">
@endsection

@section('content')
    <div class="productPage">
        <div class="container page-inner mt-3 mt-lg-4">
            <div class="row box-title mb-1 mb-lg-2">
                <div class="col-6">
                    <h2>Quản lý danh sách hóa đơn</h2>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('admin.orders.create') }}" type="button" class="btn rounded-pill btn-add" id="btn_create_order" data-toggle="modal" data-target="#modal-add">
                        <i class="fas fa-plus mr-2"></i>
                        Thêm mới
                    </a>
                </div>
            </div>
            <form class="form-search bg-light" autocomplete="off">
                <div class="d-flex flex-column flex-xl-row p-4 border-dark bg-gradient-light img-rounded">
                    <input type="text" class="form-control flex-grow-lg-1 mb-3 mb-xl-0 input-search mr-3"
                           id="code"
                           placeholder="Nhập mã hóa đơn"/>
                    <input type="text" class="form-control flex-grow-lg-1 mb-3 mb-xl-0 input-search mr-3"
                           id="date"
                           placeholder="Nhập ngày"/>
                    <div class="input-search d-flex flex-row">
                        <button type="button" class="btn btn-brown d-flex align-items-center" id="btn-search"><i
                                class="fas fa-search"></i><span
                                class="ml-2">Tìm kiếm</span></button>
                        <button type="reset" class="btn btn-default ml-2" id="btn-clear"><i
                                class="fas fa-sync-alt"></i></button>
                    </div>
                </div>
            </form>
            <div class="table-responsive box-table">
                <table class="table table-list display nowrap" id="table-orders">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã hóa đơn</th>
                        <th scope="col">Ngày bán</th>
                        <th scope="col">Thu ngân</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Tổng cộng</th>
                        <th scope="col">Ghi chú</th>
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
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông tin hóa đơn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body order-detail">
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex flex-row justify-content-center">
                            <img width="100" src="/assets/images/logo.svg" alt="">
                        </div>
                        <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
                            <div>
                                <div class="d-block text-center">Hibika</div>
                                <div class="d-block text-center">1 Đại Cồ Việt, Cầu Dền,</div>
                                <div class="d-block text-center">Hai Bà Trưng, Hà Nội</div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="row mb-1">
                                <div class="col-12"><div class="col-12 text-center font-weight-bold">HÓA ĐƠN BÁN HÀNG</div></div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="left">
                                        <span class="title">Ngày bán: </span>
                                        <span class="content" id="order_date">20/01/2022 13:00</span>
                                    </div>
                                    <div class="right">
                                        <span class="title">MHĐ: </span>
                                        <span class="content" id="order_code">00000001</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="left">
                                        <span class="title"></span>
                                        <span class="content"></span>
                                    </div>
                                    <div class="right">
                                        <span class="title">Thu ngân: </span>
                                        <span class="content" id="staff_name">Hạnh</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table-borderless w-100" id="order_detail">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold">Sản phẩm</th>
                                        <th class="font-weight-bold">Đơn giá</th>
                                        <th class="font-weight-bold">SL</th>
                                        <th class="font-weight-bold text-right">T.Tiền</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row mb-1">
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="left">
                                        <span class="title">Tổng tiền T.Toán</span>
                                    </div>
                                    <div class="right">
                                        <span class="content" id="total_price">42.000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="left">
                                        <span class="title">Tổng tiền giảm</span>
                                    </div>
                                    <div class="right">
                                        <span class="content" id="reduced_price">0</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="left">
                                        <span class="title">Tiền khách trả</span>
                                    </div>
                                    <div class="right">
                                        <span class="content" id="customer_paid">42.000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="left">
                                        <span class="title">Tiền trả lại</span>
                                    </div>
                                    <div class="right">
                                        <span class="content" id="refunds">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row mb-1">
                                <div class="col-12 d-flex justify-content-between">
                                    <div class="left">
                                        <span class="title">ID khách hàng</span>
                                    </div>
                                    <div class="right">
                                        <span class="content" id="id_customer">xxxxxxxx1</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center font-weight-bold mb-1">Chỉ xuất hóa đơn trong ngày</div>
                            <div class="text-center">Tax invoice will be issued within same day</div>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center font-weight-bold mb-1">Trân trọng cảm ơn!</div>
                            <div class="text-center">Pass wifi: 12345678</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-note" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modalNote" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="" id="form-note">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label for="note">Ghi chú</label>
                        <textarea class="form-control" rows="4" id="note" name="note" placeholder="Nhập vào đây..."></textarea>
                        <label class="error"></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
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
        var table = $('#table-orders').DataTable({
            bDestroy: false,
            columnDefs: [
                {
                    className: 'text-center',
                    targets: [0, 3, 4, 5, 6]
                },
            ],
            serverSide: true,
            ajax: {
                url: "{!! route('admin.orders.show') !!}",
                data: function (d) {
                    d.order_code = $('#code').val() ?? '';
                    d.order_date = $('#date').val() ?? '';
                }
            },
            columns: [
                {
                    data: null,
                    render: (data, type, row, meta) => (meta.row + 1)
                },
                {
                    data: 'order_code'
                },
                {
                    data: 'order_date',
                    render: function (data, type, row, meta) {
                        return moment(data).format('DD/MM/YYYY HH:mm');
                    }
                },
                {
                    data: 'staff.fullname'
                },
                {
                    data: 'customer.name',
                    render: function (data, type, row, meta) {
                        return data ? data : '';
                    }
                },
                {
                    data: 'total_price',
                    render: function (data, type, row, meta) {
                        return $.number(data, 0, '.', ',') + ' đ';
                    }
                },
                {
                    data: 'note'
                },
                {
                    data: null,
                    defaultContent: `<button class="btn btn-outline btn-show">
                                <i class="far fa-eye"></i>
                            </button>
                            <button class="btn btn-outline btn-note">
                                <i class="far fa-sticky-note"></i>
                            </button>`
                }
            ]
        });

        $('#table-orders').on('click', '.btn-note', function () {
            var data = table.row($(this).parents("tr")).data();

            $('#modal-note').find('.modal-title').text('Mã hóa đơn: ' + data.order_code);
            $('#modal-note').find('input[name="id"]').val(data.id);
            $('#modal-note').find('textarea[name="note"]').val(data.note ?? '').attr('data-note', data.note ?? '');
            $('#modal-note').modal('show');
        });

        $('#form-note .btn-brown').click(function (e) {
            e.preventDefault();

            var note = $(this).find('#note').val();
            if(note !== '' && note != $('#form-note').find('#note').attr('data-note')) {
                $.ajax({
                    url: '{{ route('admin.orders.update') }}',
                    type: 'GET',
                    data: $('#form-note').serialize(),
                    beforeSend: function () {
                        $(this).prop('disabled', true).html(`<span class="spinner-border spinner-border-sm mb-2" role="status" aria-hidden="true"></span>
                                                             Lưu`);
                    },
                    success: function (res) {
                        success('Cập nhật thành công!');
                        $('#form-note').modal('hide');
                    },
                    error: function () {
                        fail('Gặp lỗi trong quá trình tải.');
                    },
                    complete: function () {
                        $(this).removeProp('disabled').text('Lưu');
                    }
                });
            }
        });

        $('#table-orders').on('click', '.btn-show', function () {
            var data = table.row($(this).parents("tr")).data();

            $.ajax({
                url: '{{ route('admin.orders.orderDetail') }}',
                type: 'GET',
                data: {
                    id: data.id
                },
                beforeSend: function () {
                    $('.bg-loading').removeClass('d-none').addClass('d-flex');
                },
                success: function (res) {
                    if(res) {
                        $('#modal-detail').find('#order_date').text(moment(data.order_date).format('YYYY-MM-DD HH:MM'));
                        $('#modal-detail').find('#order_code').text(data.order_code);
                        $('#modal-detail').find('#staff_name').text(data.staff.fullname);
                        $('#modal-detail').find('#total_price').text($.number(data.total_price, 0, '.', ',') + ' đ');
                        $('#modal-detail').find('#customer_paid').text($.number(data.customer_paid, 0, '.', ',') + ' đ');
                        $('#modal-detail').find('#refunds').text($.number(data.refunds, 0, '.', ',') + ' đ');
                        $('#modal-detail').find('#id_customer').text(data.customer ? data.customer.id : '');

                        $.each(res, function (index, item) {
                            $('#modal-detail').find('#order_detail tbody')
                                .append(`<tr>
                                    <td>${ item.product.title }</td>
                                    <td>
                                        <div class="original_price">${ item.product.price != item.price ? $.number(item.product.price, 0, '.', ',') + ' đ' : '' }</div>
                                        <div class="price">${ $.number(item.price, 0, '.', ',') + ' đ' }</div>
                                    </td>
                                    <td>${ item.number }</td>
                                    <td class="text-right">${ $.number((item.price * item.number), 0, '.', ',') + ' đ' }</td>
                                </tr>`);
                        });

                        $('#modal-detail').modal('show');
                    }
                },
                error: function () {
                    fail('Gặp lỗi trong quá trình tải.');
                },
                complete: function () {
                    $('.bg-loading').removeClass('d-flex').addClass('d-none');
                }
            });
        });

        $('#modal-detail').on('hide.bs.modal', function () {
            $('#modal-detail').find('#order_detail tbody').html('');
            $('#modal-detail').find('#order_date').html('');
            $('#modal-detail').find('#order_code').html('');
            $('#modal-detail').find('#staff_name').html('');
            $('#modal-detail').find('#total_price').html('');
            $('#modal-detail').find('#customer_paid').html('');
            $('#modal-detail').find('#refunds').html('');
            $('#modal-detail').find('#id_customer').html('');
        });

        $('#btn-search').click(function (e) {
            e.preventDefault();
            table.draw();
        });
    </script>
@endsection
