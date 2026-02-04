@extends('layout')

@section('content')
<div class="row justify-content-center">
  <div class="col-lg-8 mb-4">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color:#d71920;">
          ALASAN PENOLAKAN PESANAN
        </h6>
      </div>

      <div class="card-body">
        <form method="POST"
              action="{{ route('admin.pembelian.reject', $pembelian->id) }}">
          @csrf
          @method('PUT')

          <div class="form-group">
            <label>Nama Customer</label>
            <input type="text" class="form-control"
                   value="{{ $pembelian->nm_cust }}" disabled>
          </div>

          <div class="form-group">
            <label>Grade</label>
            <input type="text" class="form-control"
                   value="{{ $pembelian->grade }}" disabled>
          </div>

          <div class="form-group">
            <label>Alasan Penolakan</label>
            <textarea name="alasan_penolakan"
                      class="form-control"
                      rows="4"
                      placeholder="Masukkan alasan penolakan..."
                      required></textarea>
          </div>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-danger">
              Tolak Pesanan
            </button>
            <a href="{{ route('pembelian.index') }}"
               class="btn btn-secondary ml-2">
              Batal
            </a>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
