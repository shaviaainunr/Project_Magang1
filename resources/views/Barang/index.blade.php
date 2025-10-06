@extends('layout')
@section('content')
<div class="card shadow mb-4">
           <div class="card-header py-3">
  <h6 class="m-0 font-weight-bold" style="color:#d71920;">Pricelist Material per M3</h6>
</div>

            <div class="card-body">
              <div class="table-responsive">
                              
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>No</th>
                    <th>Material Pict</th>
                    <th>Grade</th>
                    <th>Material</th>
                    <th>Harga</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>No</th>
                    <th>Material Pict</th>
                    <th>Grade</th>
                    <th>Material</th>
                    <th>Harga</th>
                    <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($barangs as $barang)
                    <tr>
                    <td>{{ ++$i }}</td>
                      <td><img src="{{ url('/Foto_Material/'.$barang->gambar) }}" width="50px"></td>
                      <td>{{ $barang->grade }}</td>
                      <td>{{ $barang->material }}</td>
                      <td>{{ $barang->harga }}</td>
                      <td>
                        <a href="{{ route('pembelian.create') }}" class="btn btn-success">Pembelian</a>
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