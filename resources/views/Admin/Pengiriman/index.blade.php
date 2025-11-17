@extends('layout')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color:#d71920;">Data Pengiriman</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Quantity</th>
                        <th>Grade</th>
                        <th>Harga</th>
                        <th>Tanggal Antar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembelians as $pembelian)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pembelian->nm_cust }}</td>
                            <td>{{ $pembelian->alamat }}</td>
                            <td>{{ $pembelian->quantity }}</td>
                            <td>{{ $pembelian->grade }}</td>
                            <td>{{ $pembelian->harga }}</td>
                            <td>{{ $pembelian->tgl_antar }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
