<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();

class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return redirect('dashboard');
        } else {
            return redirect('admin')->send();
        }

    }

    //mucj tiêu: lấy id, name category, brand->view(admin.add_product)
    public function add_product() {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_id', 'asc')->get();
        return view('admin.add_product')->with('cate_product', $cate_product)
                                            ->with('brand_product', $brand_product);
    }

    public function save_product(Request $request) {
        $this->AuthLogin();
        //khoi tao array
        $data = $request->only([
                'product_name',
                'product_slug',
                'product_cate',
                'product_brand',
                'product_desc',
                'product_content',
                'product_price',
                // 'product_image',
                'product_status',
                'product_favorite1',
                'product_price_old',
                'product_favorite2'
        ]);
        $data['category_id'] = $data['product_cate'];
        $data['brand_id'] = $data['product_brand'];
        unset($data['product_cate'], $data['product_brand']); //xoa 2 cot khoi array data
        //kiem tra du lieu trong ô product_image có phải dạng file hay ko
        $get_image = $request->file('product_image');

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //lay ten goc cua file
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME); //lay ten file ma ko co phan mo rong
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            
            //di chuyen vao thu muc mong muon
            $get_image->move('/upload/product', $new_image);

            //gan ten file image vao database
            $data['product_image'] = $new_image;
        } else {
            $data['product_image'] = '';
        }

        //Luu dl
        Product::create($data);

        session(['message'=>'Thêm sản phẩm thành công']);
        return redirect('add-product');
    }

    public function all_product() {
        $this->AuthLogin();
        $all_product = Product::with(['category', 'brand'])
                        ->orderBy('product_id', 'asc')
                        ->get();
        
        //truyen dl vao all_product
        return view('admin.all_product', compact('all_product'));
    }

    public function unactive_product($product_id) {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status'=>0]);
        session(['message'=>'Không kích hoạt sản phẩm thành công']);
        return redirect('all-product');
    }

    public function active_product($product_id) {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status'=>1]);
        session(['message'=>'Kích hoạt sản phẩm thành công']);
        return redirect('all-product');
    }

}
