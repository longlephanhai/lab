<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Brand;

session_start();

class BrandProduct extends Controller
{
    public function AuthLogin() {
        $admin_id = Session::get('admin_id');
        if($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function add_brand_product() {
        return view('admin.add_brand_product');
    }

    public function all_brand_product() {
        $this->AuthLogin();
        //hàm get: lấy tất cả các dữ liệu trong tbl_brand
        //DB::table: truy vấn trực tiếp tới tbl_brand mà ko thông qua Eloquent model
        // $all_brand_product = DB::table('tbl_brand')
        //                         ->get();
        // // all: ghi dè lên ::table->get
        // $all_brand_product = Brand::all();
        //orderBy :sắp sếp theo id tăng dần, thg kết hợp với .get() or .with() để lấy ỏr xử lí dl
        $all_brand_product = Brand::orderBy('brand_id', 'asc')->get();
        $manage_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product', $manage_brand_product);
    }

    public function save_brand_product(Request $request) {
        $this->AuthLogin();
        $data = $request->all();
        $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_slug = $data['brand_slug'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();

        Session::put('message', "Thêm thương hiệu sản phẩm thành công");
        return Redirect::to('/add-brand-product');
    }

    public function unactive_brand_product($brand_product_id) {
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id', $brand_product_id)
                                ->update(['brand_status'=>1]);
        Session::put('message', 'Không kích hoạt thương hiệu sản phẩm này thành công');
        return Redirect::to('/all-brand-product');
    }

    public function active_brand_product($brand_product_id) {
        $this->AuthLogin();
        DB::table(('tbl_brand'))->where('brand_id', $brand_product_id)
                                ->update(['brand_status'=>0]);
        Session::put('message', 'Kích hoạt thương hiệu thành công');
        return Redirect::to('/all-brand-product');
    }

    //edit brand
    public function edit_brand_product($brand_product_id) {
        $this->AuthLogin();
        $edit_brand_product = Brand::where('brand_id', $brand_product_id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }

    //cập nhật dữ liệu (thực thi nút 'Cập nhật thương hiệu')
    public function update_brand_product(Request $request, $brand_product_id) {
        $this->AuthLogin();
        $data = $request->all();
        $brand = Brand::find($brand_product_id);
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_slug = $data['brand_product_slug'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();
        Session::put('message', 'Cập nhật thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }

    //Xoa thuong hieu sp
    public function delete_brand_product($brand_product_id) {
        $this->AuthLogin();
        // DB::table('tbl_brand')->where('brand_product_id', $brand_product_id)->delete();
        Brand::where('brand_id', $brand_product_id)->delete();
        Session::put('message', 'Xóa thương hiệu sản phẩm thành công');
        return Redirect::to('all-brand-product');
    }

    //Cap nhat mau khi kich vao
    public function show_brand_product($slug_brand_product) {
        Session::get('active_brand_slug', $slug_brand_product);
        $brand_product= DB::table('tbl_brand')->where('slug_brand_product', $slug_brand_product)
                            ->first();
        return view('pages.home', compact('brand_product'));
    }
}   

