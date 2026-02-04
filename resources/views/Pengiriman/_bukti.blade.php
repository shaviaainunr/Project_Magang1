@php
    $isAdmin = auth()->check() && auth()->user()->role === 'admin';
@endphp

<div class="mt-2">

    {{-- ========================= --}}
    {{-- ADMIN: FORM UPLOAD --}}
    {{-- ========================= --}}
    @if ($isAdmin)
        <form
            action="{{ route('pengiriman.uploadBukti', [$pembelian->id, $tahap]) }}"
            method="POST"
            enctype="multipart/form-data"
            class="mb-2"
        >
            @csrf
            <input
                type="file"
                name="bukti"
                class="form-control form-control-sm mb-1"
                accept=".jpg,.jpeg,.png,.pdf"
                required
            >
            <button type="submit" class="btn btn-sm btn-danger">
                Upload Bukti
            </button>
        </form>
    @endif


    {{-- ========================= --}}
    {{-- ADMIN & USER: LIHAT / CETAK --}}
    {{-- ========================= --}}
    @if ($file)

        @php
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
        @endphp

        {{-- GAMBAR --}}
        @if (in_array($ext, ['jpg','jpeg','png']))
            <img
                src="{{ asset('storage/bukti_pengiriman/'.$file) }}"
                alt="Bukti Pengiriman"
                style="max-width: 500px; border:1px solid #ddd;"
            >

            <div class="mt-2">
                <a
                    href="{{ route('pengiriman.cetakBukti', $file) }}"
                    target="_blank"
                    class="btn btn-sm btn-outline-primary"
                >
                    🖨 Cetak Bukti (PDF)
                </a>
            </div>

        {{-- PDF --}}
        @elseif ($ext === 'pdf')
            <a
                href="{{ route('pengiriman.cetakBukti', $file) }}"
                target="_blank"
                class="btn btn-sm btn-outline-danger"
            >
                📄 Lihat / Cetak Bukti (PDF)
            </a>
        @endif

    @else
        <p class="text-muted small">Belum ada bukti</p>
    @endif

</div>
