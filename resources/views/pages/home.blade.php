@extends('layouts.layout')
@section('content')
    {{-- <div class="app">
        <div class="grid__row app__content">

            

            <div class="grid__column-10"> --}}
                <div class="home-filter">
                    <span class="home-filter__label">Sắp xếp theo</span>
                    <button class="home-filter__btn btn">Phổ biến</button>
                    <button class="home-filter__btn btn btn-primary">Mới nhất</button>
                    <button class="home-filter__btn btn">Bán chạy</button>

                    <div class="select-input">
                        <span class="select-input-label">Giá</span>
                        <i class="select-input__icon fa-solid fa-chevron-down"></i>

                        <!-- List option -->
                        <ul class="select-input__list">
                            <li class="select-input__item">
                                <a href="" class="select-input__link">Giá: Thấp đến cao</a>
                            </li>
                            <li class="select-input__item">
                                <a href="" class="select-input__link">Giá: Cao đến thấp</a>
                            </li>
                        </ul>
                    </div>

                    <div class="home-filter__page">
                        <span class="home-filter__page-num">
                            <span class="home-filter__page-current">1</span>/14
                        </span>

                        <div class="home-filter__page-control">
                            <a href="" class="home-filter__page-btn home-filter__page-btn--disabled">
                                <i class="home-filter__page-icon fa-solid fa-chevron-left"></i>
                            </a>
                            <a href="" class="home-filter__page-btn">
                                <i class="home-filter__page-icon fa-solid fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="home-product ">
                    <!-- Grid ->row ->column -->
              
                </div>

                <ul class="pagination home-product__pagination">
                    <li class="pagination-item">
                        <a href="" class="pagination-item__link">
                            <i class="pagination-item__icon fa-solid fa-chevron-left"></i>
                        </a>
                    </li>

                    <li class="pagination-item">
                        <a href="" class="pagination-item__link">
                            <i class="pagination-item__icon ">1</i>
                        </a>
                    </li>
                    <li class="pagination-item pagination-item--active">
                        <a href="" class="pagination-item__link">
                            <i class="pagination-item__icon ">2</i>
                        </a>
                    </li>
                    <li class="pagination-item">
                        <a href="" class="pagination-item__link">
                            <i class="pagination-item__icon ">3</i>
                        </a>
                    </li>
                    <li class="pagination-item">
                        <a href="" class="pagination-item__link">
                            <i class="pagination-item__icon ">4</i>
                        </a>
                    </li>
                    <li class="pagination-item">
                        <a href="" class="pagination-item__link">
                            <i class="pagination-item__icon ">5</i>
                        </a>
                    </li>
                    <li class="pagination-item">
                        <a href="" class="pagination-item__link">
                            <i class="pagination-item__icon ">...</i>
                        </a>
                    </li>
                    <li class="pagination-item">
                        <a href="" class="pagination-item__link">
                            <i class="pagination-item__icon ">14</i>
                        </a>
                    </li>
                    <li class="pagination-item">
                        <a href="" class="pagination-item__link">
                            <i class="pagination-item__icon fa-solid fa-chevron-right"></i>
                        </a>
                    </li>
                </ul>
            {{-- </div>
        </div>
    </div> --}}
@endsection