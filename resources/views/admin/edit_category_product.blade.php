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
                            <div class="panel-body">
                                <div class="position-center">
                                    @foreach ($edit_category_product as $edit_category)
                                        <form role="form" action="{{ url('update-category-product/'.$edit_category->category_id) }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tên danh mục</label>
                                                <input type="text" value="{{ $edit_category->category_name }}"
                                                    name="category_product_name" class="form-control"
                                                    id="exampleInputEmail1" placeholder="Tên danh mục">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Slug</label>
                                                <input type="text" value="{{ $edit_category->slug_category_product }}"
                                                    name="slug_category_product" class="form-control"
                                                    id="exampleInputPassword1" placeholder="Slug">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Mô tả danh mục</label><br>
                                                <textarea style="width: 100%" rows="8" class="form-control" name="category_product_desc"
                                                    id="exampleInputPassword1" placeholder="Mô tả danh mục">{{ $edit_category->category_desc }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Từ khóa danh mục</label><br>
                                                <textarea style="width: 100%" rows="4" class="form-control" name="category_product_keywords"
                                                    id="exampleInputPassword1" placeholder="Từ khóa danh mục">{{ $edit_category->category_product_keywords }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Hiển thị</label>
                                                <select name="category_status" class="form-control input-sm m-bot15">
                                                    @if ($edit_category->category_status == 1)
                                                        <option selected value="1">Hiển thị</option>
                                                        <option value="0">Ẩn</option>
                                                    @else
                                                        <option value="0">Ẩn</option>
                                                        <option selected value="1">Hiển thị</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <button type="submit" name="add_category_product" class="btn btn-info">Cập nhật
                                                danh mục</button>
                                        </form>
                                    @endforeach

                                </div>
                        </section>

                    </div>
                </div>

            </div>
        </section>
    </section>
@endsection
