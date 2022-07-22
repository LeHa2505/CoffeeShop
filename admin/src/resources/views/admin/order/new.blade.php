@extends('admin.layouts.layouts')

@section('style')
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/order.css">
@endsection

@section('content')
    <div class="addProductPage">
        <div class="container page-inner mt-3 mt-lg-4">
            <div class="row box-title mb-1 mb-lg-2">
                <div class="col-6">
                    <h2>Thêm hóa đơn</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-7">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <form action="" class="form-search p-3">
                                    <div class="d-flex">
                                        <input type="text" class="form-control input-title" placeholder="Nhập tên sản phẩm">
                                        <button type="reset" class="btn btn-default ml-3"><i class="fas fa-sync-alt"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="product-list">
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="card p-3">
                        <div class="title">
                            <h2>
                                Hóa đơn:
                            </h2>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <div class="left">
                                <label for="" class="text-weight-bold">Nhân viên</label>
                            </div>
                            <div class="right">
                                <select class="form-control" name="staff" id="input-staff">
                                    @foreach($staffs as $staff)
                                        <option value="{{ $staff->id }}">{{ $staff->fullname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="list">
                            <table class="table table-borderless w-100" id="invoice">
                                <thead>
                                <tr>
                                    <th scope="col" class="name">Tên</th>
                                    <th scope="col" class="price">Đơn giá</th>
                                    <th scope="col" class="number">SL</th>
                                    <th scope="col" class="total">T.Tiền</th>
                                    <th scope="col" class="remove"></th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <div class="total-money">
                                <div class="d-flex justify-content-between">
                                    <div class="left">
                                        <label for="" class="text-weight-bold">Tổng</label>
                                    </div>
                                    <div class="right" id="total">0 đ</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="left">
                                        <label for="" class="text-weight-bold">Khách trả</label>
                                    </div>
                                    <div class="right">
                                        <input type="text" class="form-control" class="money w-50" id="customer_paid" name="customer_paid">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="left">
                                        <label for="" class="text-weight-bold">Trả lại</label>
                                    </div>
                                    <div class="right" id="refunds">0 đ</div>
                                </div>
                            </div>
                        </div>
                        <div class="action mt-3">
                            <button type="button" class="btn btn-brown w-100" id="addInvoice">Thêm hóa đơn</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="bg-loading d-none">
        <div class="spinner-border text-light" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        let productList = [];
        $("#customer_paid").inputmask("decimal", {
            radixPoint: ".",
            groupSeparator: ",",
            digits: 0,
            autoGroup: true,
            suffix: ' đ'
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            async: false,
            url: '{{ route('admin.orders.getProductList') }}',
            success: function(data) {
                productList = data;

                $('#product-list').html();
                $.each(productList, function (index, item) {
                    $('#product-list').append(`<div class="col-3 product-item">
                            <div class="card">
                                <div class="product-image">
                                    <img src="${ item.link_image ? '/storage' + item.link_image : 'storage/image/products/image-preview.png' }" alt="">
                                </div>
                                <div class="product-info">
                                    <div class="product-title">
                                        <div class="name">${ item.title }</div>
                                    </div>
                                    <div class="product-price">
                                        <div class="original">${ item.reduced_price != item.price && item.reduced_price ? $.number(item.price, 0, '.', ',') + ' đ' : '' }</div>
                                        <div class="reduce">${ item.reduced_price != item.price && item.reduced_price
                                                            ? $.number(item.reduced_price, 0, '.', ',') + ' đ'
                                                            : $.number(item.price, 0, '.', ',') + ' đ' }</div>
                                    </div>
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-brown">Thêm</button>
                                </div>
                            </div>
                        </div>`);
                })
            }
        });

        let order = {
            total: 0,
            customer_paid: 0,
            refunds: 0,
            order_detail: []
        };

        function filterItems(id) {
            return order['order_detail'].findIndex((item) => item.product_id === id);
        }

        function caculateTotal() {
            var total = order['order_detail'].reduce((x, el) => {
                return x + el['price'] * el['number'];
            }, 0);
            order.total = total;
            $('.total-money #total').text($.number(total, 0, '.', ',') + ' đ');
        }

        $('#customer_paid').keyup(function () {
            var paid = Number($(this).val().replace(/\D/g, ''));
            if (order.total <= paid) {
                order.customer_paid = paid;
                order.refunds = paid - order.total;
                $('.total-money #refunds').text($.number(order.refunds, 0, '.', ',') + ' đ');
            } else {
                $('.total-money #refunds').text('0 đ')
            }
        });

        $('.input-title').keyup(function () {
            var str = $(this).val();

            if(str) {
                $('.product-item').each(function (index, el) {
                    if($(this).find('.name').text().toLowerCase().includes(str.toLowerCase())) {
                        $(this).removeClass('d-none');
                    } else {
                        $(this).addClass('d-none');
                    }
                })
            } else {
                $('.product-item').removeClass('d-none');
            }
        });

        function change_number (el) {
            var number = el.val();

            if(number) {
                var id = el.closest('tr').data('product');
                var index = filterItems(id);
                order['order_detail'][index]['number'] = Number(number);
                console.log(order['order_detail'][index]);
                var price = Math.round(order['order_detail'][index]['price'] * 1000000) / 1000000;
                el.closest('tr').find('.totalItem').text($.number(price * Number(number), 0, '.', ',') + ' đ');
                caculateTotal();
            }
        }

        $('.product-item .btn-brown').click(function () {
            var index = $(this).closest('.product-item').index();
            var product = productList[index];

            if(filterItems(product.id) >= 0) {
                order['order_detail'].map((item) => {
                    if (item.product_id === product.id) {
                        item.number += 1;
                        $('.invoice tr["data-product"="' + product.id + '"]').find('input').val(item.number);
                    }
                });
                caculateTotal();
            } else {
                order.order_detail.push({
                    'product_id': product.id,
                    'price': Math.round((product.reduced_price ?? product.price) * 1000000) / 1000000,
                    'number': 1
                });
                caculateTotal();
                $('#invoice tbody').append(`<tr data-product="${ product.id }">
                                    <td class="name">${ product.title }</td>
                                    <td class="price">
                                        <div class="original_price">${ product.reduced_price != product.price && product.reduced_price ? $.number(product.price, 0, '.', ',') + ' đ' : '' }</div>
                                        <div class="reduced_price">${ $.number(product.price, 0, '.', ',') + ' đ' }</div>
                                    </td>
                                    <td class="number">
                                        <input type="number" class="form-control" min="1" max="100" value="1" onchange="change_number($(this))">
                                    </td>
                                    <td class="totalItem">${ $.number(product.price, 0, '.', ',') + ' đ' }</td>
                                    <td class="remove">
                                        <button type="button" onclick="remove($(this))" class="btn btn-remove"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>`);
            }
        });

        $('.form-search button[type="reset"]').click(function () {
            $('.product-item').removeClass('d-none');
        });

       function remove (el) {
            var id = el.closest('tr').data('product');
            el.closest('tr').remove();
            order.order_detail.splice(filterItems(id), 1);
            caculateTotal();
        }

        $('#addInvoice').click(function () {
            if(order.customer_paid != 0) {
                order['staff_id'] = $('#input-staff').val();
                console.log(order);
                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.orders.create') }}',
                    data: order,
                    beforeSend: function () {
                        $('.bg-loading').removeClass('d-none').addClass('d-flex');
                    },
                    success: (data) => {
                        if(data) {
                            $(document).Toasts("create", {
                                class: "bg-success",
                                title: "Thành công",
                                autohide: true,
                                delay: 2000,
                                body: 'Hóa đơn đã được thêm.',
                            });

                            $('#invoice tbody').html('');
                            $('#customer_paid').val('');
                            order = {
                                total: 0,
                                customer_paid: 0,
                                refunds: 0,
                                order_detail: []
                            };
                        }
                    },
                    error: function(){
                        $(document).Toasts("create", {
                            class: "bg-danger",
                            title: "Thất bại",
                            autohide: true,
                            delay: 2000,
                            body: 'Thêm hóa đơn thất bại.',
                        });
                    },
                    complete: function () {
                        $('.bg-loading').removeClass('d-flex').addClass('d-none');
                    }
                });
            } else {
                alert('Nhập đầy đủ thông tin.');
            }
        });
    </script>
@endsection
