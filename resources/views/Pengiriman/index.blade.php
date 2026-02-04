@extends('layout')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color:#d71920;">Data Pengiriman</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
<table class="table table-bordered table-red" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Quantity</th>
                        <th>Grade</th>
                        <th>Total Harga (Rp)</th>
                        <th>Tanggal Antar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Quantity</th>
                        <th>Grade</th>
                        <th>Total Harga(Rp)</th>
                        <th>Tanggal Antar</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($pembelians as $pembelian)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pembelian->nm_cust }}</td>
                            <td>{{ $pembelian->alamat }}</td>
                            <td>{{ $pembelian->quantity }}</td>
                            <td>{{ $pembelian->grade }}</td>
                            <td>Rp {{ number_format($pembelian->total_harga, 0, ',', '.') }}</td>
                            <td>{{ $pembelian->tgl_antar }}</td>
                            <td>
    @if($pembelian->status === 'Cancelled')
    <button class="btn btn-secondary btn-sm" disabled>
        Dibatalkan
    </button>

@elseif($pembelian->status !== 'Paid')
    <button class="btn btn-warning btn-sm" disabled>
        Menunggu Persetujuan
    </button>

@elseif($pembelian->status_pengiriman === 'selesai')
    <a href="{{ route('pengiriman.status', $pembelian->id) }}"
       class="btn btn-primary btn-sm">
        🚚 Pengiriman Selesai
    </a>

@else
    <a href="{{ route('pengiriman.status', $pembelian->id) }}"
       class="btn btn-success btn-sm">
        Lihat Status Pengiriman
    </a>
@endif
</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
