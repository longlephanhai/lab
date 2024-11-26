
    
        
            <nav class="category">
                <h3 class="category__heading"> Danh mục </h3>

                <ul class="category-list" >

                    @foreach ($category as $key=>$cate)

                        <li class="category-item {{ (Session::get('active_category_slug') == $cate->slug_category_product || ($key == 0 && !Session::has('active_category_slug'))) ? 'category-item--active' : '' }}">
                            {{-- session::get : ktra slug có đc lưu trong session có = với slug hiện tại --}}
                            <a href="{{ URL::to('/danh-muc-san-phan/'. $cate->slug_category_product) }}" class="category-item__link">
                                {{ $cate->category_name }}
                                {{-- <span class="toggle-btn">&#x25BC;</span> --}}
                            </a>

                            
                        </li>
                        
                    @endforeach
                </ul>

                <div class="category">
                    <h3 class="category__heading"> Thương hiệu  </h3>
    
                    <ul class="category-list">
    
                        @foreach ($brand as $key=>$brand)
    
                            <li class="category-item {{ (Session::get('active_brand_slug') == $brand->brand_slug) ? 'category-item--active' : '' }}">
            
                                <a href="{{ URL::to('/thuong-muc-san-phan/'. $brand->brand_slug) }}" class="category-item__link">
                                    {{ $brand->brand_name }}                                    
                                </a>
                             
                            </li>
                            
                        @endforeach
                    </ul>
                </div>

            </nav>

            
       

    

