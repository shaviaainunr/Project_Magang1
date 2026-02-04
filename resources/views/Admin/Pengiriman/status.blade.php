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

        <!-- Tahapan Status Pengiriman -->
        <div class="timeline">

            <!-- 1. Sedang Diproses -->
            <div class="step">
                <h6>1️⃣ Sedang Diproses di Pabrik</h6>
                <p>Material sedang disiapkan dan dicampur di batching plant.</p>
            </div>

            <!-- 2. Siap Berangkat -->
            <div class="step">
                <h6>2️⃣ Siap Berangkat</h6>
                <p>Material sudah dimuat ke truk mixer dan siap dikirim.</p>
            </div>

            <!-- 3. Sudah Sampai -->
            <div class="step">
                <h6>3️⃣ Sudah Sampai Lokasi</h6>
                <p>Material sudah tiba di lokasi proyek pelanggan.</p>
            </div>

        </div>

        <a href="{{ route('pengiriman.index') }}" class="btn btn-secondary mt-3">← Kembali</a>
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
