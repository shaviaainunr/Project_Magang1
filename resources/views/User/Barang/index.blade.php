@extends('layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color:#d71920;">Pricelist Material per M3</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('barang.create') }}" class="btn btn-outline-red">Tambah Material</a>
                    <p></p>
                @endif
                <table class="table table-bordered table-red" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Material Pict</th>
                            <th>Grade</th>
                            <th>Material</th>
                            <th>Harga (Rp)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Material Pict</th>
                            <th>Grade</th>
                            <th>Material</th>
                            <th>Harga (Rp)</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($barangs as $barang)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td><img src="{{ url('/Foto_Material/' . $barang->gambar) }}" width="50px"></td>
                                <td>{{ $barang->grade }}</td>
                                <td>{{ $barang->material }}</td>
                                <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                                <td>
                                    {{-- ADMIN --}}
                                    @if (Auth::user()->role === 'admin')
                                        <a href="{{ route('admin.barang.edit', $barang->id) }}" class="btn btn-success btn-sm">
                                            Edit <i class="fas fa-edit ml-1"></i>
                                        </a>
                                    @endif

                                    {{-- USER --}}
                                    @if (Auth::user()->role === 'user')
                                        <a href="{{ route('pembelian.create') }}" class="btn btn-primary btn-sm">
                                        Pembelian <i class="fas fa-shopping-cart ml-1"></i>
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

    <!-- Bagian Penutup Isi Conten Template -->
    </div>
    <!-- /.container-fluid -->
@endsection
