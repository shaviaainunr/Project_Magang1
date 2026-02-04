@extends('layout')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold" style="color:#d71920;">
            Detail Pembelian - {{ $pembelian->nm_cust }}
        </h6>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Nama Customer</th>
                <td>{{ $pembelian->nm_cust }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $pembelian->alamat }}</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td>{{ $pembelian->quantity }}</td>
            </tr>
            <tr>
                <th>Grade</th>
                <td>{{ $pembelian->grade }}</td>
            </tr>
            <tr>
                <th>Harga Satuan</th>
                <td>Rp {{ number_format($pembelian->harga, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td>
                    <strong>Rp {{ number_format($pembelian->total_harga, 0, ',', '.') }}</strong>
                </td>
            </tr>
            <tr>
                <th>Tanggal Antar</th>
                <td>{{ $pembelian->tgl_antar }}</td>
            </tr>
            <tr>
                <th>Keterangan Proyek</th>
                <td>{{ $pembelian->keterangan }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @if($pembelian->status == 'Pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif($pembelian->status == 'Paid')
                        <span class="badge bg-success">Paid</span>
                    @elseif($pembelian->status == 'Cancelled')
                        <span class="badge bg-danger">Ditolak</span>
                    @endif
                </td>
            </tr>
            @if($pembelian->status == 'Cancelled' && $pembelian->alasan_penolakan)
            <tr>
                <th>Alasan Penolakan</th>
                <td>
                    <div class="alert alert-danger mb-0">
                        {{ $pembelian->alasan_penolakan }}
                    </div>
                </td>
            </tr>
            @endif
            <tr>
                <th>Tanggal Pesan</th>
                <td>{{ $pembelian->created_at->format('d-m-Y H:i') }}</td>
            </tr>
            <tr>
            <th>Bukti Pembayaran</th>
            <td>
                @if ($pembelian->bukti_pembayaran)
                    @php
                        $ext = pathinfo($pembelian->bukti_pembayaran, PATHINFO_EXTENSION);
                    @endphp

                    @if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png']))
                        {{-- Jika gambar --}}
                        <img src="{{ asset('uploads/bukti/' . $pembelian->bukti_pembayaran) }}" 
                        alt="Bukti Pembayaran" 
                        style="
                                width: 500px;
                                max-width: 100%;
                                border: 1px solid #ddd;
                                padding: 0;
                                display: block;">
                                
                    @elseif ($ext === 'pdf')
                        {{-- Jika PDF --}}
                        <a 
                            href="{{ asset('uploads/bukti/' . $pembelian->bukti_pembayaran) }}" 
                            target="_blank"
                            class="btn btn-sm btn-outline-danger"
                        >
                            Lihat Bukti Pembayaran (PDF)
                        </a>
                    @else
                        <span class="text-muted">Format file tidak didukung</span>
                    @endif
                @else
                    <span class="text-muted">Belum ada bukti pembayaran</span>
                @endif
            </td>
        </tr>
        <tr>
        <th style="vertical-align: top;">Foto Lokasi Proyek</th>
        <td>
            @if($pembelian->foto_lokasi)
                @php
                    $ext = pathinfo($pembelian->foto_lokasi, PATHINFO_EXTENSION);
                @endphp
            <div style="display: flex; align-items: flex-start; gap: 15px;">
                @if(in_array(strtolower($ext), ['jpg','jpeg','png']))
                    <img 
                        src="{{ asset('uploads/lokasi/'.$pembelian->foto_lokasi) }}"
                        alt="Foto Lokasi"
                        style="
                            width: 260px;
                            max-width: 100%;
                            border-radius: 2px;
                            border: 1px solid #ddd;
                            box-shadow: 0 2px 6px rgba(0,0,0,.1);">
                @elseif(strtolower($ext) === 'pdf')
                    <a 
                        href="{{ asset('uploads/lokasi/'.$pembelian->foto_lokasi) }}"
                        target="_blank"
                        style="
                            padding: 6px 12px;
                            background-color: #dc3545;
                            color: #fff;
                            text-decoration: none;
                            border-radius: 4px;
                            font-size: 13px; ">
                        📄 Lihat Foto Lokasi (PDF)
                    </a>
                @endif
            </div>
        @else
            <span class="text-muted">Belum ada file</span>
        @endif
    </td>
</tr>
        </table>
        <a href="{{ route('pembelian.cetak', $pembelian->id) }}" class="btn btn-danger" target="_blank">
    Cetak PDF
</a>
        <a href="{{ route('pembelian.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>

@endsection
