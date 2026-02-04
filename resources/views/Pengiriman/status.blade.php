@extends('layout')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color:#d71920;">
            Status Pengiriman Material - {{ $pembelian->nm_cust }}
        </h6>
    </div>

    <div class="card-body">

        <h5>Tracking Pengiriman</h5>
        <p><strong>Alamat:</strong> {{ $pembelian->alamat }}</p>
        <p><strong>Tanggal Antar:</strong> {{ $pembelian->tgl_antar }}</p>

        <hr>

        <div class="timeline">

            {{-- 1. PROSES --}}
            <div class="step">
                <h6>1️⃣ Sedang Diproses di Plant</h6>
                <p>Material sedang disiapkan dan dicampur di batching plant.</p>

                @include('pengiriman._bukti', [
                    'tahap' => 'proses',
                    'file' => $pembelian->bukti_proses,
                    'pembelian' => $pembelian
                ])
            </div>

            {{-- 2. BERANGKAT --}}
            <div class="step">
                <h6>2️⃣ Siap Berangkat</h6>
                <p>Material sudah dimuat ke truk mixer dan siap dikirim.</p>

                @include('pengiriman._bukti', [
                    'tahap' => 'berangkat',
                    'file' => $pembelian->bukti_berangkat,
                    'pembelian' => $pembelian
                ])
            </div>

            {{-- 3. SAMPAI --}}
            <div class="step">
                <h6>3️⃣ Sudah Sampai Lokasi</h6>
                <p>Material sudah tiba di lokasi proyek pelanggan.</p>

                @include('pengiriman._bukti', [
                    'tahap' => 'sampai',
                    'file' => $pembelian->bukti_sampai,
                    'pembelian' => $pembelian
                ])
            </div>
        </div>

      <div class="d-flex justify-content-between mt-3">
    <a href="{{ route('pengiriman.index') }}" class="btn btn-secondary">
        ← Kembali
    </a>

    @auth
@if(auth()->user()->role === 'admin')

    @if($pembelian->status_pengiriman !== 'selesai')
        <form action="{{ route('pengiriman.selesai', $pembelian->id) }}"
              method="POST"
              onsubmit="return confirm('Yakin pengiriman sudah selesai?')">
            @csrf
            @method('PUT')

            <button class="btn btn-success">
                ✅ Pengiriman Selesai
            </button>
        </form>
    @else
        <button class="btn btn-primary" disabled>
            🚚 Pengiriman Selesai
        </button>
    @endif

@endif
@endauth

</div>
    </div>
</div>

<style>
.timeline {
    padding-left: 20px;
}
.step {
    margin-bottom: 20px;
    border-left: 4px solid #d71920;
    padding-left: 10px;
}
</style>
@endsection
