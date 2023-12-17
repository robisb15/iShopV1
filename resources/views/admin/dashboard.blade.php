@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <div class="card m-5">

            <div class="card-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white mr-2">
                        <i class="mdi mdi-home"></i>
                    </span> Dashboard
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span><i
                                class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">weekend</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Pendapatan</p>
                                    <h4 class="mb-0">Rp. {{ number_format($pendapatan->penghasilan, 2, ',', '.') }}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">

                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">weekend</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Transaksi</p>
                                    <h4 class="mb-0">{{ $transaksi->total_order }}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">

                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="material-icons opacity-10">person</i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Pelanggan</p>
                                    <h4 class="mb-0">{{ $pelanggan->total_user }}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">

                        </div>
                    </div>

                </div>



            </div>

            <div class="row">
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">10 Transaksi Terbaru</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> Invoice </th>
                                            <th> Pemesan </th>
                                            <th> Subtotal </th>
                                            <th> Status Pesanan </th>
                                            <th> Aksi </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_baru as $order)
                                            <tr>
                                                <td>{{ $order->invoice }}</td>
                                                <td>{{ $order->nama_pemesan }}</td>
                                                <td>{{ $order->subtotal + $order->biaya_cod }}</td>
                                                <td>{{ $order->name }}</td>
                                                <td> <a href="{{ route('admin.transaksi.detail', ['id' => $order->id]) }}"
                                                        class="btn btn-warning btn-sm">Detail</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
