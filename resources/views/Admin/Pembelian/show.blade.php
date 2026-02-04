@extends('layout')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color:#d71920;">
            Detail Pembelian - {{ $pembelian->nm_cust }}
        </h6>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Nama Customer</th>
                <td>{{ $pembelian->nm_cust }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $pembelian->alamat }}</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td>{{ $pembelian->quantity }}</td>
            </tr>
            <tr>
                <th>Grade</th>
                <td>{{ $pembelian->grade }}</td>
            </tr>
            <tr>
                <th>Harga Satuan</th>
                <td>Rp {{ number_format($pembelian->harga, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td>
                    <strong>Rp {{ number_format($pembelian->total_harga, 0, ',', '.') }}</strong>
                </td>
            </tr>
            <tr>
                <th>Tanggal Antar</th>
                <td>{{ $pembelian->tgl_antar }}</td>
            </tr>
            <tr>
                <th>Keterangan Proyek</th>
                <td>{{ $pembelian->keterangan }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($pembelian->status == 'Pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif($pembelian->status == 'Paid')
                        <span class="badge bg-success">Paid</span>
                    @else
                        <span class="badge bg-secondary">Cancelled</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>Tanggal Pesan</th>
                <td>{{ $pembelian->created_at->format('d-m-Y H:i') }}</td>
            </tr>
        </table>
        <a href="{{ route('pembelian.cetak', $pembelian->id) }}" class="btn btn-danger" target="_blank">
    Cetak PDF
</a>
        <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>

@endsection
