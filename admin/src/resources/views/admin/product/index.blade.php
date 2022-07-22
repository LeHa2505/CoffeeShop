@extends('admin.layouts.layouts')

@section('style')
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/product.css">
@endsection

@section('content')
    <div class="productPage">
        <div class="container page-inner mt-3 mt-lg-4">
            <div class="row box-title mb-1 mb-lg-2">
                <div class="col-6">
                    <h2>Danh sách sản phẩm</h2>
                </div>
                <div class="col-6 text-right">
                    <button type="button" class="btn rounded-pill btn-add" id="btn_create_product" data-toggle="modal" data-target="#modal-add">
                        <i class="fas fa-plus mr-2"></i>
                        Thêm mới
                    </button>
                </div>
            </div>
            <form class="form-search bg-light" autocomplete="off">
                <div class="d-flex flex-column flex-xl-row p-4 border-dark bg-gradient-light img-rounded">
                    <input type="text" class="form-control flex-grow-lg-1 mb-3 mb-xl-0 input-search mr-3"
                           id="product_title"
                           placeholder="Nhập tên sản phẩm"/>
                    <select class="form-control flex-grow-lg-1 mb-3 mb-xl-0 input-search mr-3" name="category_id">
                        <option value="" selected>Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
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
                <table class="table table-list display nowrap" id="table-products">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Category</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
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
                    <h5 class="modal-title">Thông tin sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body product-detail">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="">
                                <img width="200" height="200" src="" class="rounded mx-auto img-thumbnail" alt="">
                            </div>
                        </div>
                        <div class="col-12 col-lg-8">
                            <div class="row mb-3">
                                <div class="col-12 d-flex align-items-center">
                                    <div class="title">Bạc xỉu</div>
                                    <div class="">
                                        <div class="category">Cà phê</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <span class="font-weight-bold">Giá: </span>
                                    <span class="price">45,000</span>
                                    <span> đ</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="description"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modalAdd" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.products.create') }}" method="POST" id="form-add" enctype="multipart/form-data" autocomplete="off">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold">Thêm sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body px-5">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="form-group">
                                    <label for="input-title">Tên sản phẩm:</label>
                                    <input type="text" name="title" class="form-control" id="input-title" placeholder="Nhập tên sản phẩm">
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label for="input-category">Category</label>
                                    <select class="form-control" name="category" id="input-category">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-file">Ảnh sản phẩm</label>
                            <div class="row">
                                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="form-control custom-file-input" id="input-file">
                                            <label class="custom-file-label" for="input-file">Chọn ảnh</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="text-center">
                                        <img class="image_preview_container" src="{{ asset('storage/image/products/image-preview.png') }}"
                                             alt="preview image" style="max-height: 300px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-price">Giá sản phẩm:</label>
                            <input type="text" name="price" class="form-control money" id="input-price" placeholder="Nhập giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="input-price">Giá sản phẩm giảm:</label>
                            <input type="text" name="reduced_price" class="form-control money" id="input-price-reduced" placeholder="Nhập giá sản phẩm giảm">
                        </div>
                        <div class="form-group">
                            <label for="input-description">Mô tả:</label>
                            <textarea name="description" class="form-control no-resize" id="input-description" rows="3"></textarea>
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
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modalDelete" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.products.delete') }}" method="POST" autocomplete="off">
                    <div class="modal-header">
                        <h5 class="modal-title">Xóa sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Bạn chắc chắn xóa sản phẩm này chứ?
                        <input type="hidden" name="id">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-brown">Xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.products.edit') }}" method="POST" id="form-edit" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" id="input-id" name="id"/>
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold">Xem sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body px-5">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <div class="form-group">
                                    <label for="input-title">Tên sản phẩm:</label>
                                    <input type="text" name="title" class="form-control" id="input-title" placeholder="Nhập tên sản phẩm">
                                </div>
                            </div>
                            <div class="col-12 col-lg-4">
                                <div class="form-group">
                                    <label for="input-category">Category</label>
                                    <select class="form-control" name="category" id="input-category">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-file">Ảnh sản phẩm</label>
                            <div class="row">
                                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="form-control custom-file-input" id="input-file">
                                            <label class="custom-file-label" for="input-file">Chọn ảnh</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="text-center">
                                        <img class="image_preview_container" src="{{ asset('storage/image/products/image-preview.png') }}"
                                             alt="preview image" style="max-height: 300px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-price">Giá sản phẩm:</label>
                            <input type="text" name="price" class="form-control money" id="input-price" placeholder="Nhập giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="input-price">Giá sản phẩm giảm:</label>
                            <input type="text" name="reduced_price" class="form-control money" id="input-price-reduced" placeholder="Nhập giá sản phẩm giảm">
                        </div>
                        <div class="form-group">
                            <label for="input-description">Mô tả:</label>
                            <textarea name="description" class="form-control no-resize" id="input-description" rows="3"></textarea>
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
        var table = $('#table-products').DataTable({
            bDestroy: false,
            columnDefs: [
                {
                    className: 'text-center',
                    targets: [0, 3, 4, 5, 6]
                },
                {
                    className: 'text-left',
                    targets: [2]
                }
            ],
            serverSide: true,
            ajax: {
                url: "{!! route('admin.products.show') !!}",
                data: function (d) {
                    d.title = $('#product_title').val() ?? '';
                    d.category_id = $('.input-search[name="category_id"]').val() ?? '';
                }
            },
            columns: [
                {
                    data: null,
                    render: (data, type, row, meta) => (meta.row + 1)
                },
                {
                    data: 'title'
                },
                {
                    data: 'description',
                    render: function (data, type, row, meta) {
                        return data && data.length > 50 ?
                            data.substr(0, 50) + '…' :
                            data;
                    }
                },
                {
                    data: 'price',
                    render: function (data, type, row, meta) {
                        return $.number(data, 0, '.', ',') + ' đ';
                    }
                },
                {
                    data: 'category.name'
                },
                {
                    data: 'status',
                    render: function (data, type, row, meta) {
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
                    defaultContent: `<button class="btn btn-outline btn-show">
                                <i class="far fa-eye"></i>
                            </button>
                            <button class="btn btn-outline btn-edit">
                                <i class="far fa-edit"></i>
                            </button>
                            <button class="btn btn-outline btn-delete">
                                <i class="far fa-trash-alt"></i>
                            </button>`
                }
            ]
        });

        $(document).ready(function (e) {
            $(".money").inputmask("decimal", {
                radixPoint: ".",
                groupSeparator: ",",
                digits: 0,
                rightAlign: false,
                autoGroup: true,
                prefix: '',
                suffix: ' ₫'
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.custom-file-input').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    console.log(e.target.result);
                    $(this).closest('.form-group').find('.image_preview_container').attr('src', e.target.result);
                }
                console.log(this.files[0].name);
                $(this).closest('.form-group').find('.custom-file-label').text(this.files[0].name);
                reader.readAsDataURL(this.files[0]);

            });

            var validator = $("#form-add").validate({
                onfocusout: function (element) {
                    var $element = $(element);
                    $element.valid();
                },
                onkeyup: function (element) {
                    var $row = $(element).closest(".form-group");
                    if ($row.hasClass("is-row-error")) {
                        $(element).valid();
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    var $row = $(element).closest(".form-group");
                    $row.addClass("is-row-error");
                    $row.removeClass("is-row-valid");
                },
                unhighlight: function (element, errorClass, validClass) {
                    var $row = $(element).closest(".form-group");
                    $row.addClass("is-row-valid");
                    $row.removeClass("is-row-error");
                },
                rules: {
                    title: {
                        required: true,
                        maxlength: 100,
                    },
                    category: {
                        required: true
                    },
                    price: {
                        required: true
                    },
                    image: {
                        required: true
                    },
                    description: {
                        required: true,
                        maxlength: 1000
                    },
                },
                messages: {
                    title: {
                        required: 'Đây là trường bắt buộc.',
                        maxlength: 'Độ dài tối đa 100 ký tự.',
                    },
                    category: {
                        required: 'Đây là trường bắt buộc.'
                    },
                    price: {
                        required: 'Đây là trường bắt buộc.'
                    },
                    image: {
                        required: 'Đây là trường bắt buộc.'
                    },
                    description: {
                        required: 'Đây là trường bắt buộc.',
                        maxlength: 'Độ dài tối đa 1000 ký tự.',
                    },
                },
                errorPlacement: function (error, element) {
                    if ($(element).is('#input-file')) {
                        error.insertAfter($(element).closest('.input-group'));
                    } else {
                        error.insertAfter(element);
                    }
                }
            });

            $("#modal-add").on("hide.bs.modal", function () {
                $('.form-control').val('');
                $('#input-category option:first-child').prop('selected', true);
                $('.custom-file-label').text('Chọn ảnh');
                $('#modal-add .image_preview_container').attr('src', '{{ asset('storage/image/products/image-preview.png') }}');
                validator.resetForm();
            });

            $('#form-add').submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    type:'POST',
                    url: '{{ route('admin.products.create') }}',
                    dataType: 'JSON',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#form-add button[type='submit']").attr("disabled", "")
                            .html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Lưu');
                    },
                    success: (data) => {
                        if(data) {
                            $('#modal-add').modal('hide');
                            success('Bạn đã thêm sản phẩm thành công.');
                        }
                    },
                    error: function(){
                        fail('Thêm sản phẩm thất bại, hãy kiểm tra lại.');
                    },
                    complete: function () {
                        $("#form-add button[type='submit']").removeAttr("disabled").html("Lưu");
                    }
                });
            });

            $('#table-products').on('click', '.btn-delete', function () {
                var data = table.row($(this).parents("tr")).data();
                $('#modal-delete').find('input[name="id"]').val(data.id);
                $('#modal-delete').modal('show');
            });

            $('#modal-delete button[type="submit"]').click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: $('#modal-delete form').attr('method'),
                    url: $('#modal-delete form').attr('action'),
                    data: $('#modal-delete form').serialize(),
                    beforeSend: function () {
                        $('#modal-delete button[type="submit"]').attr("disabled", "")
                            .html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Xóa');
                    },
                    success: (data) => {
                        if(data) {
                            $('#modal-delete').modal('hide');
                            success('Bạn đã xóa sản phẩm thành công.');
                        }
                    },
                    error: function(){
                        fail('Xóa sản phẩm thất bại, hãy kiểm tra lại.');
                    },
                    complete: function () {
                        $('#modal-delete button[type="submit"]').removeAttr("disabled").html("Xóa");
                    }
                });
            });

            $('#table-products').on('click', '.btn-edit', function () {
                var data = table.row($(this).parents("tr")).data();
                $('#form-edit').find('#input-id').val(data.id);
                $('#form-edit').find('#input-title').val(data.title);
                $('#form-edit').find('#input-category option[value="' + data.category + '"]').prop('selected', true);
                $('#form-edit').find('.image_preview_container').attr('src', '/storage' + data.link_image);
                $('#form-edit').find('#input-price').val(data.price);
                $('#form-edit').find('#input-price-reduced').val(data.reduced_price ?? data.price);
                $('#form-edit').find('#input-description').val(data.description);
                $('#modal-edit').modal('show');
            });

            $("#modal-edit").on("hide.bs.modal", function () {
                $('.form-control').val('');
                $('#input-category option:first-child').prop('selected', true);
                $('.custom-file-label').text('Chọn ảnh');
                $('#modal-edit .image_preview_container').attr('src', '{{ asset('storage/image/products/image-preview.png') }}');
                // validator.resetForm();
            });

            $('#table-products').on('click', '.btn-switch', function () {
                var data = table.row($(this).parents("tr")).data();

                $.ajax({
                    type: 'POST',
                    url: '{{ route('admin.products.updateStatus') }}',
                    data: {
                        status: data['status'],
                        id: data['id']
                    },
                    beforeSend: function () {
                        $('.bg-loading').removeClass('d-none').addClass('d-flex');
                    },
                    success: (data) => {
                        if(data) {
                            success('Bạn đã xóa sản phẩm thành công.');
                        }
                    },
                    error: function(){
                        fail('Thay đổi trạng thái sản phẩm thất bại, hãy kiểm tra lại.');
                    },
                    complete: function () {
                        $('.bg-loading').removeClass('d-flex').addClass('d-none');
                    }
                });
            });

            $('#table-products').on('click', '.btn-show', function () {
                var data = table.row($(this).parents("tr")).data();
                $('#modal-detail').find('.title').text(data.title);
                $('#modal-detail').find('.category').text(data.category.name);
                $('#modal-detail').find('.img-thumbnail').attr('src', '/storage' + data.link_image);
                $('#modal-detail').find('.price').text($.number(data.price, 0, '.', ','));
                $('#modal-detail').find('.description').html(data.description);
                $('#modal-detail').modal('show');
            });

            $("#modal-detail").on("hide.bs.modal", function () {
                {{--$('.form-control').val('');--}}
                {{--$('#input-category option:first-child').prop('selected', true);--}}
                {{--$('.custom-file-label').text('Chọn ảnh');--}}
                {{--$('#image_preview_container').attr('src', '{{ asset('storage/image/products/image-preview.png') }}');--}}
                // validator.resetForm();
            });

            $('#btn-search').click(function (e) {
                e.preventDefault();
                table.draw();
            });

            $('#form-edit').submit(function (e) {
                e.preventDefault();

                if($('#form-edit #input-title').val() == null || $('#form-edit #input-category').val() == null ||
                    $('#form-edit #input-price').val() == null || $('#form-edit #input-price-reduced').val() == null ||
                    $('#input-description').val() == null) {
                    alert("Phải nhập đủ thông tin");
                } else {
                    var formData = new FormData(this);

                    $.ajax({
                        type:'POST',
                        url: '{{ route('admin.products.edit') }}',
                        dataType: 'JSON',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            $("#form-edit button[type='submit']").attr("disabled", "")
                                .html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Lưu');
                        },
                        success: (data) => {
                            if(data) {
                                $('#modal-edit').modal('hide');
                                success('Bạn đã thêm sản phẩm thành công.');
                            }
                        },
                        error: function(){
                            fail('Thêm sản phẩm thất bại, hãy kiểm tra lại.');
                        },
                        complete: function () {
                            $("#form-edit button[type='submit']").removeAttr("disabled").html("Lưu");
                        }
                    });
                }

            });
        });
    </script>
@endsection
