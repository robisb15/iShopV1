@extends('layouts.user-layout')
@section('content')
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100"
                                    src="{{ asset('storage/' . $produk->image) }}" alt="First slide"> </div>

                        </div>

                      
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{ $produk->name }}</h2>
                        <h5> <del>@currency($produk->harga * 1.05)</del>@currency($produk->harga)</h5>
                        <p class="available-stock"><span> Stok <a href="#">{{ $produk->stok }}</a></span>
                        <p>
                        <h4> Deskripsi</h4>
                        <p> {{ $produk->description }}</p>
                        <ul>
                            <li>
                                <form action="{{ route('user.keranjang.simpan') }}" method="post">
                                    @csrf
                                    @if (Route::has('login'))
                                        @auth
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        @endauth
                                    @endif
                                    <input type="hidden" name="products_id" value="{{ $produk->id }}">
                                    <input type="hidden" value="{{ $produk->stok }}" id="sisastok">


                                    <div class="form-group quantity-box">
                                        <label class="control-label">Quantity</label>
                                        <input class="form-control" value="1" min="1" type="number"
                                            name="qty">
                                    </div>


                                    <div class="price-box-bar">
                                        <div class="cart-and-bay-btn">
                                           
                                            <button type="submit" class="btn hvr-hover" data-fancybox-close=""
                                                >Add to cart</button>
                                        </div>
                                    </div>
                                </form>
                            </li>
                        </ul>


                        <div class="add-to-btn">

                            <div class="share-bar">
                                <a class="btn hvr-hover" href="#"><i class="fab fa-facebook"
                                        aria-hidden="true"></i></a>
                                <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus"
                                        aria-hidden="true"></i></a>
                                <a class="btn hvr-hover" href="#"><i class="fab fa-twitter"
                                        aria-hidden="true"></i></a>
                                <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p"
                                        aria-hidden="true"></i></a>
                                <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
    {{-- <div class="bg-light py-3">
    <div class="container">
    <div class="row">
        <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Tank Top T-Shirt</strong></div>
    </div>
    </div>
</div>  

<div class="site-section">
    <div class="container">
    <div class="row">
        <div class="col-md-6">
        <img src="{{ asset('storage/'.$produk->image) }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6">
        <h2 class="text-black">{{ $produk->name }}</h2>
        <p>
            {{ $produk->description }}
        </p>
        <p><strong class="text-primary h4">Rp {{ $produk->harga }} </strong></p>
        <div class="mb-5">
            <form action="{{ route('user.keranjang.simpan') }}" method="post">
                @csrf
                @if (Route::has('login'))
                    @auth
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endauth
                @endif
            <input type="hidden" name="products_id" value="{{ $produk->id }}">
            <small>Sisa Stok {{ $produk->stok }}</small>
            <input type="hidden" value="{{ $produk->stok }}" id="sisastok">
            <div class="input-group mb-3" style="max-width: 120px;">
            <div class="input-group-prepend">
            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
            </div>
            <input type="text" name="qty" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
            <div class="input-group-append">
            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
            </div>
        </div>

        </div>
        <p><button type="submit" class="buy-now btn btn-sm btn-primary">Add To Cart</button></p>
        </form>
        </div>
    </div>
    </div>
</div> --}}
@endsection
