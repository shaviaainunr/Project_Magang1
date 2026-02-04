<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bukti Pembelian</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        h2 { text-align: center; }
    </style>
</head>
<body>

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
    </table>

</body>
</html>
