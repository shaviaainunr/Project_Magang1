@extends('layout')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color:#d71920;">Pemesanan SCG Plan Cirebon</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">

            <a href="{{ route('pembelian.create') }}" class="btn btn-outline-red">Buat Pesanan</a><p></p>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pesan</th> {{-- ✅ tambahan --}}
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Quantity</th>
                        <th>Grade</th>
                        <th>Harga</th>
                        <th>Tanggal Antar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pesan</th> {{-- ✅ tambahan --}}
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Quantity</th>
                        <th>Grade</th>
                        <th>Harga</th>
                        <th>Tanggal Antar</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($pembelians as $pembelian)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $pembelian->created_at->format('d-m-Y H:i') }}</td> {{-- ✅ tampilkan --}}
                            <td>{{ $pembelian->nm_cust }}</td>
                            <td>{{ $pembelian->alamat }}</td>
                            <td>{{ $pembelian->quantity }}</td>
                            <td>{{ $pembelian->grade }}</td>
                            <td>{{ $pembelian->harga }}</td>
                            <td>{{ $pembelian->tgl_antar }}</td>
                            <td>
                                @if($pembelian->status == 'Pending')
                                    <button class="btn btn-warning" disabled>Proses</button>
                                    <a href="{{ route('pembelian.payment', $pembelian->id) }}" class="btn btn-success">Bayar</a>
                                    <form action="{{ route('pembelian.batal', $pembelian->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Batalkan</button>
                                    </form>
                                @elseif($pembelian->status == 'Paid')
                                    <button class="btn btn-warning" disabled>Proses</button>
                                    <button class="btn btn-success" disabled>Sudah Dibayar</button>
                                @elseif($pembelian->status == 'Cancelled')
                                    <button class="btn btn-secondary" disabled>Dibatalkan</button>
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
