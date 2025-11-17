@extends('layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color:#d71920;">Pemesanan SCG Plan Cirebon</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                @if (Auth::user()->role === 'user')
                    <a href="{{ route('pembelian.create') }}" class="btn btn-outline-red">Buat Pesanan</a>
                    <p></p>
                @endif

                <table class="table table-bordered table-red" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pesan</th> {{-- ✅ tambahan --}}
                            <th>Nama</th>
                            <th>Quantity</th>
                            <th>Grade</th>
                            <th>Total Harga</th>
                            <th>Tanggal Antar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pesan</th> {{-- ✅ tambahan --}}
                            <th>Nama</th>
                            <th>Quantity</th>
                            <th>Grade</th>
                            <th>Total Harga</th>
                            <th>Tanggal Antar</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($pembelians as $pembelian)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $pembelian->created_at->timezone('Asia/Jakarta')->format('d-m-Y H:i') }}
                                <td>{{ $pembelian->nm_cust }}</td>
                                <td>{{ $pembelian->quantity }}</td>
                                <td>{{ $pembelian->grade }}</td>
                                <td>{{ $pembelian->total_harga }}</td>
                                <td>{{ $pembelian->tgl_antar }}</td>
                                <td>
                                    <a href="{{ route('pembelian.show', $pembelian->id) }}"
                                        class="btn btn-info btn-sm">Detail</a>

                                    @if ($pembelian->status == 'Pending' && Auth::user()->role === 'user')
                                        <a href="{{ route('pembelian.payment', $pembelian->id) }}"
                                            class="btn btn-success btn-sm">Bayar</a>
                                    @elseif ($pembelian->status == 'Processing')
                                        <button class="btn btn-warning btn-sm" disabled>Sedang Diproses...</button>
                                    @elseif ($pembelian->status == 'Paid')
                                        <button class="btn btn-success btn-sm" disabled>Pembayaran Sukses</button>
                                    @elseif ($pembelian->status == 'Invalid')
                                        <button class="btn btn-danger btn-sm" disabled>Pembayaran Invalid</button>
                                    @elseif ($pembelian->status == 'Cancelled')
                                        <button class="btn btn-secondary btn-sm" disabled>Dibatalkan</button>
                                    @endif

                                    @if ($pembelian->status == 'Processing' && Auth::user()->role === 'admin')
                                        <form action="{{ route('admin.pembelian.approve', $pembelian->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            <button class="btn btn-success btn-sm">Setujui</button>
                                        </form>

                                        <form action="{{ route('admin.pembelian.reject', $pembelian->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            <button class="btn btn-danger btn-sm">Tolak</button>
                                        </form>
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
