@extends('layout')
@section('content')

<div class="row justify-content-center">
  <div class="col-lg-8 mb-4">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color:#d71920;">
            EDIT MATERIAL
        </h6>
      </div>

      <div class="card-body">

        <form method="POST"
              action="{{ route('barang.update', $barang->id) }}"
              enctype="multipart/form-data">

          @csrf
          @method('PUT')

          <div class="form-group">
            <label>Grade :</label>
            <input type="text"
                   class="form-control"
                   name="grade"
                   value="{{ old('grade', $barang->grade) }}">
          </div>

          <div class="form-group">
            <label>Material :</label>
            <textarea class="form-control"
                      name="material"
                      rows="4">{{ old('material', $barang->material) }}</textarea>
          </div>

          <div class="form-group">
            <label>Harga :</label>
            <input type="text"
                   class="form-control"
                   name="harga"
                   value="{{ old('harga', $barang->harga) }}">
          </div>

          <div class="form-group">
            <label>Material Pict :</label>
            <input type="file"
                   name="gambar"
                   class="form-control">

            {{-- Tampilkan gambar lama --}}
            @if($barang->gambar)
              <div class="mt-2">
                <small class="text-muted">Gambar saat ini:</small><br>
                <img src="{{ asset('uploads/barang/'.$barang->gambar) }}"
                     alt="Material"
                     width="150"
                     class="img-thumbnail">
              </div>
            @endif
          </div>

          <div class="text-center mt-4">
            <button type="submit" class="btn btn-warning">
                Simpan Perubahan
            </button>

            <a href="{{ route('barang.index') }}"
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
