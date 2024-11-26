<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();
class CategoryProduct extends Controller
{
    public function add_category_product()
    {
        return view('admin.add_category_product');
    }

    public function all_category_product()
    {
        $this->AuthLogin();
        //Lay tat ca dl danh muc sp
        $all_category_product = DB::table('tbl_category_product')->get();
        //truyền dl vào view
        //hàm with() truyền dl từ controller vào view: with('key: tên biến muốn tạo trong view', 'value, giá trị ỏ dl mà bạn muốn truyền vào view')
        //mục tiêu có 'key': dùng foreach()
        // Biến manage tạo 1 view con và truyền dl vào
        $manage_category_product = view('admin.all_category_product')->with('all_category_product', $all_category_product);
        // admin_layout là view chính mà bạn muốn đỏo view
        return view('admin_layout')->with('admin.all_category_product', $manage_category_product);
    }

    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }


    public function save_category_product(Request $request)
    {
        $this->AuthLogin();

        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_product_keywords'] = $request->category_product_keywords;
        $data['slug_category_product'] = $request->slug_category_product;
        $data['category_desc'] = $request->category_product_desc;
        $data['category_status'] = $request->category_product_status;

        DB::table('tbl_category_product')->insert($data);
        Session::flash('message', 'Thêm danh mục sản phẩm thành công');
        // return Redirect::to('add-category-product');

        //Redirect: chuyển hướng đến URL /add-category-product sau khi hoàn thành 1 thao tác
        return Redirect::to('add-category-product');
    }

    public function unactive_category_product($category_product_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')
            ->where('category_id', $category_product_id)
            ->update(['category_status'=>0]);
        Session::put('message', 'Ẩn danh mục sản phẩm, update thành công');
        return Redirect::to('all-category-product');
    }

    public function active_category_product($category_product_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')
            ->where('category_id', $category_product_id)
            ->update(['category_status'=>1]);
        Session::put('message', 'Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    //cập nhật mục nào sáng khi được chọn or mặc định mục đầu tiên
    public function show_Category_Product($slug_category_product) {
        //lưu slug vào session khi người dùng click vào
        Session::put('active_category_slug', $slug_category_product);
        
        //lấy thông tin danh mục sp dựa vào slug
        $category_product = DB::table('tbl_category_product')
                                ->where('slug_category_product', $slug_category_product)
                                ->first();
        //hàm first() lấy bản ghi đầu tiên từ kq của 1 truy vấn
        return view('pages.home', compact('category_product'));
    }


    //edit-category-product
    public function edit_category_product($category_product_id) {
        $this->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')
                                    ->where('category_id', $category_product_id)
                                    ->get();
        // $manager_category_product = view('admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        // return Redirect::to('all-category-product')->with('manager_category_product', $manager_category_product);
        return view('admin.edit_category_product', ['edit_category_product' => $edit_category_product]);
    }

    public function update_category_product(Request $request,$category_product_id) {
        $this->AuthLogin();
        $data = $request->all();
        
         DB::table('tbl_category_product')
                                ->where('category_id', $category_product_id)
                                ->update([
                                    'category_name'=>$data['category_product_name'],
                                    'slug_category_product'=>$data['slug_category_product'],
                                    'category_desc'=>$data['category_product_desc'],
                                    'category_product_keywords'=>$data['category_product_keywords'],
                                    'category_status'=>$data['category_status']
                                ]);

        Session::put('message', 'Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');

    }

    //Xoa danh muc sp
    public function delete_category_product($category_product_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }
}
