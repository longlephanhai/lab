@extends('admin_layout')
@section('admin_content')
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <div class="form-w3layouts">
                <!-- page start-->
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Thêm danh mục sản phẩm
                            </header>
                            @if (Session::has('message'))
                                <span class="text-alert">
                                    {{ Session::get('message') }};
                                    {{ Session::forget('message') }};
                                </span>
                            @endif
                            <div class="panel-body">
                                <div class="position-center">

                                    {{-- Ẩn tạm thời url để xem ckeditor --}}
                                    {{-- <form role="form" action="{{ url('save-product') }}" method="post" --}}
                                    <form role="form" action="" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên sản phẩm </label>
                                            <input type="text" data-validation="length" data-validation-length="min10"
                                                data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="product_name"
                                                class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Slug</label>
                                            <input type="text" name="product_slug" class="form-control"
                                                id="exampleInputPassword1" placeholder="Tên slug">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Giá sản phẩm </label>
                                            <input type="text" data-validation="number"
                                                data-validation-error-msg="Làm ơn điền số tiền" name="product_price_old"
                                                class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Giá ưu đãi </label>
                                            <input type="text" data-validation="number"
                                                data-validation-error-msg="Làm ơn điền số tiền" name="product_price"
                                                class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                                            <input type="file" name="product_image" class="formcontrol"
                                                id="exampleInputEmail1">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                            <textarea style="width: 100%" rows="8" class="formcontrol" name="product_desc" id="ckeditor1" placeholder="Mô tả sản phẩm">
                                            </textarea>
                                            </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mô tả ngắn 1</label>
                                            <input type="text" name="product_favorite1" class="form-control"
                                                id="favorite1" placeholder="Mô tả ngắn 1">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mô tả ngắn 2</label>
                                            <input type="text" name="product_favorite2" class="form-control"
                                                id="favorite2" placeholder="Mô tả ngắn 2">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Từ khóa danh
                                                mục</label><br>
                                            <textarea style="width: 100%" rows="4" class="formcontrol" name="category_product_keywords"
                                                id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                            <textarea style="width: 100%" rows="8" class="formcontrol" name="product_content" id="id4" placeholder="Nội dung sản
                                           phẩm"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                            <select name="product_cate" class="form-control input-sm
                                            m-bot15">
                                            {{-- @foreach ($cate_product as $key=>$cate)
                                                <option value="{{ $cate->category_id }}">
                                                    {{ $cate->category_name }}
                                                </option>
                                                
                                            @endforeach --}}
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Thương hiệu</label>
                                            <select name="product_brand" class="form-control inputsm m-bot15">
                                                {{-- @foreach ($brand_product as $key=>$brand)
                                                    <option value="{{ $brand->brand_id }}">
                                                        {{ $brand->brand_brand_name }}
                                                    </option>
                                                @endforeach --}}
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Hiển thị</label>
                                            <select name="product_status" class="formcontrol input-sm m-bot15">
                                                <option value="0">Ẩn</option>
                                                <option value="1">Hiển thị</option>

                                            </select>
                                        </div>

                                        <button type="submit" name="add_product" class="btn btn-info">
                                            Thêm sản phẩm
                                        </button>


                                    </form>
                                </div>

                            </div>
                        </section>

                    </div>
                </div>

            </div>
        </section>
    </section>

    {{-- Them ckeditor --}}
{{-- @push('js-custom')
<script>
    ClassicEditor
        .create(document.querySelector('#id4'))
        .catch(error => {
            console.error(error);
        });
</script>
@endpush --}}

@endsection

