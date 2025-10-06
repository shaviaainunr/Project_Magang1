@extends('layout')
@section('content')

<div class="row justify-content-center"> <!-- Tambahkan row dan center -->
  <div class="col-lg-8 mb-4">
    <!-- Illustrations -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color:#d71920;">INPUT PESANAN ANDA</h6>
      </div>
      <div class="card-body">

        <form class="user" method="POST" action="{{ route('pembelian.store')}}" enctype="multipart/form-data">
          @csrf

          <div class="form-group">
            <label>Nama :</label>
            <input type="text" class="form-control" name="nm_cust">
          </div>

          <div class="form-group">
            <label>Alamat :</label>
            <textarea class="form-control" name="alamat"></textarea>
          </div>

          <div class="form-group">
            <label>Quantity :</label>
            <input type="number" class="form-control" name="quantity">
          </div>

          <div class="form-group">
            <label>Grade :</label>
            <input type="text" class="form-control" name="grade">
          </div>

          <div class="form-group">
            <label>Harga :</label>
            <input type="text" class="form-control" name="harga">
          </div>

          <div class="form-group">
            <label>Tanggal Antar :</label>
            <input type="date" class="form-control" name="tgl_antar">
          </div>

          <div class="text-center mt-4">
            <input type="submit" class="btn btn-primary" value="Buat Pesanan" />
          </div>

        </form>

      </div>
    </div>
  </div>
</div>

@endsection
