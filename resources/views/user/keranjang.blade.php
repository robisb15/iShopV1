@extends('layouts.user-layout')
@section('content')
<div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <form class="col-md-12" method="post" action="{{ route('user.keranjang.update') }}">
        @csrf
         <?php $subtotal=0; foreach($keranjangs as $keranjang): ?>
                              
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
									<img class="img-fluid" src="{{ asset('storage/'.$keranjang->image) }}" alt="" />
								</a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
									{{ $keranjang->nama_produk }}
								</a>
                                    </td>
                                    <td class="price-pr">
                                        <p>{{ number_format($keranjang->harga,2,',','.') }}</p>
                                    </td>
                                    <td class="quantity-box"><input type="number" size="4" value="{{ $keranjang->qty }}" min="1" step="1" class="c-input-text qty text" name="qty[]"></td>
                                    <td class="total-pr">
                                         <?php
                    $total = $keranjang->harga * $keranjang->qty;
                    $subtotal = $subtotal + $total;
                ?>
                                        <p>Rp. {{ number_format($total,2,',','.') }}/p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="{{ route('user.keranjang.delete',['id' => $keranjang->id]) }}">
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                </tr>
                                  <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
               
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <input value="Update Cart" type="submit">
                    </div>
                </div>
            </div>
              </form>   
            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order </h3>
                        <div class="d-flex">
                            <h4>Total</h4>
                            <div class="ml-auto font-weight-bold"> Rp. {{ number_format($subtotal,2,',','.') }} </div>
                        </div>
                        
                </div>
                <div class="col-12 d-flex shopping-box">
                    @if($cekalamat > 0)
                <div class="col-md-12">
                <a href="{{ route('user.checkout') }}" class="ml-auto btn hvr-hover" >Checkout</a> <br>
                <small>Jika Merubah Quantity Pada Keranjang Maka Klik Update Keranjang Dulu Sebelum Melakukan Checkout</small>
                </div>
                @else
                <div class="col-md-12">
                <a href="{{ route('user.alamat') }}" class="ml-auto btn hvr-hover" >Atur Alamat</a>
                <small>Anda Belum Mengatur Alamat</small>
                </div>
                @endif
                  
            </div>

        </div>
    </div>

{{-- <div class="site-section">
    <div class="container">
    <div class="row mb-5">
        <form class="col-md-12" method="post" action="{{ route('user.keranjang.update') }}">
        @csrf
            <table class="table table-bordered">
            <thead>
                <tr>
                <th class="product-thumbnail">Gambar</th>
                <th class="product-name">Produk</th>
                <th class="product-price">Harga</th>
                <th class="product-quantity">Jumlah</th>
                <th class="product-total">Total</th>
                <th class="product-remove">Hapus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    
                <?php $subtotal=0; foreach($keranjangs as $keranjang): ?>
                <td class="product-thumbnail">
                    <img src="{{ asset('storage/'.$keranjang->image) }}" alt="Image" class="img-fluid" width="150">
                </td>
                <td class="product-name">
                    <h2 class="h5 text-black">{{ $keranjang->nama_produk }}</h2>
                </td>
                <td>Rp. {{ number_format($keranjang->harga,2,',','.') }} </td>
                <td>
                    <div class="input-group mb-3" style="max-width: 120px;">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                    </div>
                    <input type="hidden" name="id[]" value="{{ $keranjang->id }}">
                    <input type="text" name="qty[]" class="form-control text-center" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" value="{{ $keranjang->qty }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                    </div>
                    </div>

                </td>
                <?php
                    $total = $keranjang->harga * $keranjang->qty;
                    $subtotal = $subtotal + $total;
                ?>
                <td>Rp. {{ number_format($total,2,',','.') }}</td>
                <td><a href="{{ route('user.keranjang.delete',['id' => $keranjang->id]) }}" class="btn btn-primary btn-sm">X</a></td>
                </tr>
                <?php endforeach;?>
            </tbody>
            </table>
        
    </div>

    <div class="row">
        <div class="col-md-6">
        <div class="row mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
            <button type="submit" class="btn btn-primary btn-sm btn-block">Update Keranjang</button>
            </div>
            </form>       
        </div>
        </div>
        <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
            <div class="col-md-7">
            <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Total Belanja</h3>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                <strong class="text-black">Rp. {{ number_format($subtotal,2,',','.') }}</strong>
                </div>
            </div>

            <div class="row">
                @if($cekalamat > 0)
                <div class="col-md-12">
                <a href="{{ route('user.checkout') }}" class="btn btn-primary btn-lg py-3 btn-block" >Checkout</a>
                <small>Jika Merubah Quantity Pada Keranjang Maka Klik Update Keranjang Dulu Sebelum Melakukan Checkout</small>
                </div>
                @else
                <div class="col-md-12">
                <a href="{{ route('user.alamat') }}" class="btn btn-primary btn-lg py-3 btn-block" >Atur Alamat</a>
                <small>Anda Belum Mengatur Alamat</small>
                </div>
                @endif
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div> --}}
@endsection