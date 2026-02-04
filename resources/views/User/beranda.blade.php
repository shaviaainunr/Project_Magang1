@extends('layout')
@section('content') 
    


<!-- Bagian Pembuka Kepala Info Judul Template -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

    <!-- Pesanan Anda -->
    <div class="col-xl-4 col-md-4 mb-4">
        <a href="{{ route('pembelian.index') }}" style="text-decoration: none;">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pesanan Anda</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $totalPesanan ?? 0 }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Pengiriman Dalam Proses -->
    <div class="col-xl-4 col-md-4 mb-4">
        <a href="{{ route('pengiriman.index') }}" style="text-decoration: none;">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Pengiriman Dalam Proses
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $pengirimanProses ?? 0 }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-truck fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Pengiriman Selesai -->
    <div class="col-xl-4 col-md-4 mb-4">
        <a href="{{ route('pengiriman.index') }}" style="text-decoration: none;">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Pengiriman Selesai
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $pengirimanSelesai ?? 0 }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-truck-loading fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>


          <!-- Content Row -->
		  <!-- Bagian Penutup Kepala Info Template -->
		  
		  
		  
		  
		  
		  
		  

         
		 <!-- Bagian Pembuka Isi Conten Template -->
          <!-- Content Row -->
          <div class="row d-flex justify-content-center">
          <div class="col-12">
            <div class="search-section">
              <h6 class="section-title-full text-center">Harga Material Per M3</h6>
              <hr class="header-line">
            </div>
          </div>

          <div class="col-lg-4 mb-4">
              <a href="{{ route('barang.index') }}" style="text-decoration: none;">
                  <div class="card shadow h-100 py-4 text-center card-menu">
                      <img src="{{ asset('img/K175.png') }}" alt="Data Material">
                      <h5 class="font-weight-bold text-primary">K175</h5>
                      <p class="text-muted small-text">Lihat dan Pesan Material</p>
                  </div>
              </a>
          </div>


    <div class="col-lg-4 mb-4">
    <a href="{{ route('barang.index') }}" style="text-decoration: none;">
        <div class="card shadow h-100 py-4 text-center card-menu">
            <img src="{{ asset('img/K200.png') }}" alt="Data Material">
            <h5 class="font-weight-bold text-primary">K200</h5>
            <p class="text-muted small-text">Lihat dan Pesan Material</p>
        </div>
    </a>
</div>

    <div class="col-lg-4 mb-4">
    <a href="{{ route('barang.index') }}" style="text-decoration: none;">
        <div class="card shadow h-100 py-4 text-center card-menu">
            <img src="{{ asset('img/K225.png') }}" alt="Data Material">
            <h5 class="font-weight-bold text-primary">K225</h5>
            <p class="text-muted small-text">Lihat dan Pesan Material</p>
        </div>
    </a>
</div>

<div class="col-lg-4 mb-4">
    <a href="{{ route('barang.index') }}" style="text-decoration: none;">
        <div class="card shadow h-100 py-4 text-center card-menu">
            <img src="{{ asset('img/K250.png') }}" alt="Data Material">
            <h5 class="font-weight-bold text-primary">K250</h5>
            <p class="text-muted small-text">Lihat dan Pesan Material</p>
        </div>
    </a>
</div>

<div class="col-lg-4 mb-4">
    <a href="{{ route('barang.index') }}" style="text-decoration: none;">
        <div class="card shadow h-100 py-4 text-center card-menu">
            <img src="{{ asset('img/K275.png') }}" alt="Data Material">
            <h5 class="font-weight-bold text-primary">K275</h5>
            <p class="text-muted small-text">Lihat dan Pesan Material</p>
        </div>
    </a>
</div>

<div class="col-lg-4 mb-4">
    <a href="{{ route('barang.index') }}" style="text-decoration: none;">
        <div class="card shadow h-100 py-4 text-center card-menu">
            <img src="{{ asset('img/K300.png') }}" alt="Data Material">
            <h5 class="font-weight-bold text-primary">K300</h5>
            <p class="text-muted small-text">Lihat dan Pesan Material</p>
        </div>
    </a>
</div>

<div class="col-lg-4 mb-4">
    <a href="{{ route('barang.index') }}" style="text-decoration: none;">
        <div class="card shadow h-100 py-4 text-center card-menu">
            <img src="{{ asset('img/K350.png') }}" alt="Data Material">
            <h5 class="font-weight-bold text-primary">K350</h5>
            <p class="text-muted small-text">Lihat dan Pesan Material</p>
        </div>
    </a>
</div>
<div class="col-lg-4 mb-4">
    <a href="{{ route('barang.index') }}" style="text-decoration: none;">
        <div class="card shadow h-100 py-4 text-center card-menu">
            <img src="{{ asset('img/standar.png') }}" alt="Data Material">
            <h5 class="font-weight-bold text-primary">Pompa Beton Standar>
            <p class="text-muted small-text">Lihat dan Sewa Pompa</p>
        </div>
    </a>
</div>
<div class="col-lg-4 mb-4">
    <a href="{{ route('barang.index') }}" style="text-decoration: none;">
        <div class="card shadow h-100 py-4 text-center card-menu">
            <img src="{{ asset('img/longboom.png') }}" alt="Data Material">
            <h5 class="font-weight-bold text-primary">Pompa Beton Long Boom>
            <p class="text-muted small-text">Lihat dan Sewa Pompa</p>
        </div>
    </a>
</div>
<div class="col-lg-4 mb-4">
    <a href="{{ route('barang.index') }}" style="text-decoration: none;">
        <div class="card shadow h-100 py-4 text-center card-menu">
            <img src="{{ asset('img/vibra.png') }}" alt="Data Material">
            <h5 class="font-weight-bold text-primary">Vibraton Beton>
            <p class="text-muted small-text">Lihat dan Sewa Vibra</p>
        </div>
    </a>
</div>
</div>

		
		  <!-- Bagian Penutup Isi Conten Template -->
        <div class="search-section">
          <h6 class="section-title-full text-center">Informasi Mutu Beton & Fungsi</h6>
        </div>
<hr class="header-line">

<table class="table-mutu">
    <thead>
        <tr>
            <th>Mutu Karakter</th>
            <th>Fungsi Struktur</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>K225 - K250</td>
            <td>Rumah Tinggal < 200 m², lantai 1-2</td>
        </tr>
        <tr>
            <td>K250 - K300</td>
            <td>Ruko lantai 1-4</td>
        </tr>
        <tr>
            <td>K250 - K350</td>
            <td>Jalan Perumahan (beban truk ringan)</td>
        </tr>
        <tr>
            <td>K300 - K500</td>
            <td>Jalan Utama</td>
        </tr>
        <tr>
            <td>K350 ></td>
            <td>Lantai Pabrik</td>
        </tr>
        <tr>
            <td>K350 ></td>
            <td>Kolam Renang</td>
        </tr>
    </tbody>
</table>

<!-- MAP LOCATION -->
<div class="contact-map">
    <div class="search-section">
    <h6 class="text-center text-white">Lokasi Kami</h6>
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3017.994763447369!2d108.53040037356284!3d-6.7594365660947995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1d2effedd16f%3A0x7e1e6bafe0838fd4!2sJayamix%20by%20SCG%20-%20Batching%20Plant%20Cirebon!5e1!3m2!1sid!2sid!4v1760448760030!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        width="100%" 
        height="300" 
        style="border:0; border-radius: 8px; margin-top:15px;" 
        allowfullscreen="" 
        loading="lazy">
    </iframe>
    </div>
</div>

<!-- BAGIAN CONTACT US -->
<div class="search-section">
    <h6 class="section-title-full text-center">Contact Us</h6>
    <hr class="header-line">
</div>

<div class="contact-full">
    <div class="text-center">
        <h5 class="font-weight-bold">PT SCG Readymix Indonesia Plant Cirebon</h5>
        <p class="mb-1">Head Office</p>
        <p class="mb-3">Jl. Pangeran Limboro, Ciperna, Talun, Cirebon, Jawa Barat, Indonesia 45171</p>

        <p class="mb-1"><i class="fas fa-phone-alt"></i> 0819-7741-5555</p>
        <p class="mb-3"><i class="fas fa-envelope"></i> info@scgreadymix.co.id</p>

        <a href="https://wa.me/6281977415555" target="_blank" class="btn btn-light btn-sm font-weight-bold">
            <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
        </a>
    </div>
</div>

@endsection