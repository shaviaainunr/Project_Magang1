@extends('layout')
@section('content')

<div class="row justify-content-center">
  <div class="col-lg-8 mb-4">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color:#d71920;">PEMBAYARAN PESANAN</h6>
      </div>
      <div class="card-body text-center">

        <!-- Detail Pesanan -->
        <h5>Detail Pesanan</h5>
        <p><strong>Nama:</strong> {{ $pembelian->nm_cust }}</p>
        <p><strong>Alamat:</strong> {{ $pembelian->alamat }}</p>
        <p><strong>Quantity:</strong> {{ $pembelian->quantity }}</p>
        <p><strong>Grade:</strong> {{ $pembelian->grade }}</p>
        <p><strong>Total Harga:</strong> Rp {{ number_format($pembelian->total_harga,0,',','.') }}</p>
        <p><strong>Tanggal Antar:</strong> {{ $pembelian->tgl_antar }}</p>
        <p><strong>Keterangan Proyek:</strong> {{ $pembelian->keterangan }}</p>

        <hr>

        <!-- Pilihan Pembayaran -->
        <h5>Pembayaran via QRIS</h5>
        <img src="{{ asset('img/qris.png') }}" alt="QRIS" style="width:250px; margin:15px 0;">

        <h5 class="mt-3">Atau Transfer Bank</h5>
        <p><strong>BCA:</strong> 123456789 a.n PT SCG</p>
        <p><strong>Mandiri:</strong> 987654321 a.n PT SCG</p>

        <hr>

        <!-- Countdown -->
        <h5 style="color:#d71920;">Selesaikan pembayaran dalam</h5>
        <h3 id="countdown" style="font-weight:bold;"></h3>
        <p>Jika waktu habis, pesanan otomatis dibatalkan.</p>

        <!-- Tombol setelah bayar + Upload Bukti -->
        <form method="POST" action="{{ route('pembelian.konfirmasi', $pembelian->id) }}" enctype="multipart/form-data" id="paymentForm">
          @csrf

          <!-- Upload Bukti Pembayaran -->
          <div class="form-group text-left">
              <label><strong>Upload Bukti Pembayaran (JPG/PNG/PDF)</strong></label>
              <input type="file" name="bukti_pembayaran" id="buktiPembayaran" class="form-control" accept="image/*,.pdf" required>
              <small class="text-muted">Silakan upload bukti transfer atau scan QRIS.</small>
          </div>

          <button type="submit" class="btn btn-success mt-3" id="bayarButton" disabled>Saya Sudah Bayar</button>
        </form>

      </div>
    </div>
  </div>
</div>

<!-- Script Countdown -->
<script>
  // Timer 60 menit
  var countdownMinutes = 60;
  var countdownDate = new Date().getTime() + (countdownMinutes * 60 * 1000);

  var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = countdownDate - now;

    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("countdown").innerHTML = minutes + "m " + seconds + "s ";

    if (distance < 0) {
      clearInterval(x);
      document.getElementById("countdown").innerHTML = "Waktu Habis";
      // Auto redirect ke batal
      window.location.href = "{{ route('pembelian.batal', $pembelian->id) }}";
    }
  }, 1000);
</script>
<script>
  // Aktifkan tombol jika sudah upload bukti
  document.getElementById('buktiPembayaran').addEventListener('change', function() {
      const bayarButton = document.getElementById('bayarButton');
      bayarButton.disabled = this.files.length === 0;
  });
</script>


@endsection
