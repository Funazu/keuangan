@extends('dashboard.layouts.main')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-3 col-md-3">
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <div class="card-title">
                            <p><b>{{ date('l, d F Y') }}</b></p>
                            <hr>
                            <p>Logged in as <b>{{ auth()->user()->name }}</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-3">
                <div class="card-shadow mb-3">
                    <div class="card-body shadow">
                        <form action="/dashboard/keuangan" method="post" enctype="multipart/form">
                            @csrf
                            <div class="form-group mb-2">
                                <strong>Uang Masuk</strong>
                                <input type="number" name="masuk" placeholder="Uang Masuk" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <strong>Uang Keluar</strong>
                                <input type="number" name="keluar" placeholder="Uang Keluar" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <strong>Keterangan</strong>
                                <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <button class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-wrapper" id="table">
                                <thead>
                                    <tr>
					                <th>#</th>
					                <th>Tanggal</th>
					                <th>Keterangan</th>
					                <th>Pemasukan</th>
					                <th>Pengeluaran</th>
					                <th>Saldo Sekarang</th>
				                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $saldosekarang = 0;
                                    ?>
                                    @foreach ($keuangan as $k)
                                    <?php
                                    if($k->masuk){
                                        $saldosekarang = $saldosekarang + $k->masuk;
                                    } else {
                                        $saldosekarang = $saldosekarang - $k->keluar;
                                    }
                                    ?>
                                    <tr>
                                        <th scope="row">{{ ++$i; }}</th>
                                        <td>{{ date('d F Y', strtotime($k->created_at)) }}</td>
                                        <td>{{ $k->keterangan }}</td>
                                        <td>Rp. {{ number_format($k->masuk) }}</td>
                                        <td>Rp. {{ number_format($k->keluar) }}</td>
                                        <td>Rp. {{ number_format($saldosekarang) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tr>
                                    <th colspan="3">
                                        <h6>Total Saldo</h6>
                                    </th>
                                    <th>
                                        <b><h6>Rp. {{ number_format($totaluangmasuk) }}</h6></b>
                                    </th>
                                    <th>
                                        <b><h6>Rp. {{ number_format($totaluangkeluar) }}</h6></b>
                                    </th>
                                    <th>
                                        <b><h6>Rp. {{ number_format($totalsaldo) }}</h6></b>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()