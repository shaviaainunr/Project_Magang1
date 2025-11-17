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
                    <th>Nama </th>
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
                    <th>Nama </th>
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
                      <td>{{ $pembelian->nm_cust }}</td>
                      <td>{{ $pembelian->alamat }}</td>
                      <td>{{ $pembelian->quantity }}</td>
                      <td>{{ $pembelian->grade }}</td>
                      <td>{{ $pembelian->harga }}</td>
                      <td>{{ $pembelian->tgl_antar }}</td>
                      <td>
                        <form action="{{ route('pembelian.destroy', $pembelian->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                        <a href="{{ route('pembelian.edit', $pembelian->id) }}" class="btn btn-warning">Edit</a>
                        <button  type="submit" class="btn btn-danger" on click="javascript: return confirm('Apakah anda ingin membatalkan pesanan..?')">Batalkan</button>
                        </form>
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