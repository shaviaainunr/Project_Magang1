@extends('layout')
@section('content')

<div class="row justify-content-center">
  <div class="col-lg-8 mb-4">
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
            <input type="number" class="form-control" name="quantity" id="quantity" min="6" value="6">
          </div>

                    <div class="form-group">
              <label>Grade :</label>
              <select class="form-control" id="grade" name="grade">
                  <option value="">-- Pilih Grade --</option>
                  @foreach($barangs as $barang)
                      <option value="{{ $barang->grade }}" data-harga="{{ $barang->harga }}">
                          {{ $barang->grade }}
                      </option>
                  @endforeach
              </select>
          </div>

          <div class="form-group">
              <label>Harga per m³ (Rp):</label>
              <input type="number" class="form-control" name="harga" id="harga" readonly>
          </div>

          <!-- 🔴 FIELD BARU: TOTAL HARGA -->
          <div class="form-group">
            <label>Total Harga (Rp):</label>
            <input type="number" class="form-control" name="total_harga" id="total_harga" readonly>
          </div>

          <div class="form-group">
            <label>Tanggal Antar :</label>
            <input type="date" class="form-control" name="tgl_antar">
          </div>

          <div class="form-group">
            <label>Keterangan Proyek :</label>
            <input type="text" class="form-control" name="keterangan">
          </div>

          <div class="text-center mt-4">
            <input type="submit" class="btn btn-primary" value="Buat Pesanan" />
          </div>

        </form>

      </div>
    </div>
  </div>
</div>

<!-- 🧮 SCRIPT HITUNG TOTAL -->
<script>
  const qtyInput = document.getElementById('quantity');
  const gradeSelect = document.getElementById('grade');
  const hargaInput = document.getElementById('harga');
  const totalInput = document.getElementById('total_harga');

  // Set harga berdasarkan grade
  gradeSelect.addEventListener('change', function() {
    let selectedGrade = this.value.toLowerCase();
    
    // Jika Pompa atau Vibra, izinkan qty < 6
    if (selectedGrade.includes('pompa') || selectedGrade.includes('vibra')) {
        qtyInput.value = 1; // default ke 1
        qtyInput.min = 1;
    } else {
        qtyInput.value = 6;
        qtyInput.min = 6;
    }

    let harga = this.options[this.selectedIndex].getAttribute('data-harga');
    hargaInput.value = harga || 0;
    hitungTotal();
});


// Minimal Quantity untuk GRADE tertentu (bukan Pompa/Vibra)
qtyInput.addEventListener('input', function() {
    let selectedGrade = gradeSelect.value.toLowerCase(); // Konversi ke lowercase agar aman
    
    if (!selectedGrade.includes('pompa') && !selectedGrade.includes('vibra')) {
        // Jika BUKAN Pompa atau Vibra, wajib minimal 6
        if (this.value < 6) {
            alert('Minimal pembelian material ini adalah 6 pcs!');
            this.value = 6;
        }
    }
    hitungTotal();
});
  
  // Hitung total harga
  function hitungTotal() {
      let qty = parseFloat(qtyInput.value) || 0;
      let harga = parseFloat(hargaInput.value) || 0;
      totalInput.value = qty * harga;
  }

  qtyInput.addEventListener('input', hitungTotal);
</script>


@endsection
