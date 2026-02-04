<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bukti Pembelian</title>
        <style>
            body { 
                font-family: Arial, sans-serif; 
                font-size: 12px; 
            }

            .header {
                width: 100%;
                margin-bottom: 20px;
            }

            .logo {
                width: 120px;
            }

            h2 { 
                text-align: center; 
                margin-top: -40px; /* naikkan judul agar sejajar */
            }

            table { 
                width: 100%; 
                border-collapse: collapse; 
                margin-top: 20px; 
            }

            th, td { 
                border: 1px solid #000; 
                padding: 8px; 
                text-align: left; 
            }
        </style>
    </head>
    <body>

        <!-- HEADER -->
        <table width="100%" style="margin-bottom:20px; border:none;">
        <tr>
            <!-- Logo Kiri -->
            <td style="border:none; text-align:left;">
                <img 
                    src="{{ public_path('img/SCG1.png') }}" 
                    style="width:120px;"
                    alt="Logo SCG Kiri"
                >
            </td>

            <!-- Logo Kanan -->
            <td style="border:none; text-align:right;">
                <img 
                    src="{{ public_path('img/JAYAMIX.png') }}" 
                    style="width:120px;"
                    alt="Logo SCG Kanan"
                >
            </td>
        </tr>
    </table>

    <h2>Bukti Pemesanan SCG</h2>
    <p><strong>Tanggal Cetak:</strong> {{ date('d-m-Y H:i') }}</p>


    <table>
        <tr><th>Nama</th><td>{{ $pembelian->nm_cust }}</td></tr>
        <tr><th>Alamat</th><td>{{ $pembelian->alamat }}</td></tr>
        <tr><th>Quantity</th><td>{{ $pembelian->quantity }}</td></tr>
        <tr><th>Grade</th><td>{{ $pembelian->grade }}</td></tr>
        <tr><th>Harga</th><td>Rp {{ number_format($pembelian->harga,0,',','.') }}</td></tr>
        <tr><th>Total Harga</th><td>Rp {{ number_format($pembelian->total_harga,0,',','.') }}</td></tr>
        <tr><th>Tanggal Antar</th><td>{{ $pembelian->tgl_antar }}</td></tr>
        <tr><th>Keterangan</th><td>{{ $pembelian->keterangan }}</td></tr>

        <tr>
            <th>Bukti Pembayaran</th>
            <td>
                @if($pembelian->bukti_pembayaran)
                    <img 
                        src="{{ public_path('uploads/bukti/'.$pembelian->bukti_pembayaran) }}" 
                        style="width:300px; border:1px solid #000;"
                        alt="Bukti Pembayaran">
                @else
                    <em>Belum ada bukti pembayaran</em>
                @endif
            </td>
        </tr>
    </table>

</body>
</html>
