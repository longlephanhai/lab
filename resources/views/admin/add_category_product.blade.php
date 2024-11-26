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

                                    <form role="form" action="{{ route('save-category-product') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tên danh mục </label>
                                            <input type="text" name="category_product_name" class="form-control"
                                                id="exampleInputEmail1" placeholder="Tên danh mục">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Slug</label>
                                            <input type="text" name="slug_category_product" class="form-control"
                                                id="exampleInputPassword1" placeholder="Số lượng sản phẩm">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Mô tả danh
                                                mục</label><br>
                                            <textarea style="width: 100%" rows="8" class="formcontrol" name="category_product_desc" id="exampleInputPassword1"
                                                placeholder="Mô tả danh mục"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Từ khóa danh
                                                mục</label><br>
                                            <textarea style="width: 100%" rows="4" class="formcontrol" name="category_product_keywords"
                                                id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Hiển thị</label>
                                            <select name="category_product_status" class="formcontrol input-sm m-bot15">
                                                <option value="0">Ẩn</option>
                                                <option value="1">Hiển thị</option>

                                            </select>
                                        </div>

                                        <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh
                                            mục</button>

                                        {{-- tự đọngo thêm file hình ảnh --}}
                                        {{-- <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <input type="file" id="exampleInputFile">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div> --}}
                                    </form>
                                </div>

                            </div>
                        </section>

                    </div>
                </div>

            </div>
        </section>
    </section>
@endsection
