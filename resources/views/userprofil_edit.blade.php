@extends('layout')

@section('content')
<a 
    href="{{ Auth::user()->role == 'admin' ? route('admin.beranda') : route('user.beranda') }}" 
    class="btn btn-scg-back mb-3"
>
    ← Back
</a>

    <h1 class="h3 mb-3">Edit Profil Anda</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <form action="{{ route('userprofil.update', auth()->id()) }}"
                        method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="name">Nama</label>
                            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="form-control" id="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                name="email"
                                value="{{ auth()->user()->email }}"
                                class="form-control"
                                id="email"
                                readonly>
                        </div>

                        <!-- Field Password dengan Toggle Visibility -->
                        <div class="form-group mb-3">
                        <label for="password">Password</label>

                        <div class="input-group">
                            <input type="password" name="password" class="form-control" id="password">

                            <span class="input-group-text" id="togglePassword" style="cursor:pointer;">
                                <i class="fa-solid fa-eye" id="eyeIcon"></i>
                            </span>
                        </div>

                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                        <div class="form-group mb-3">
                            <label for="foto">Foto Profil</label>

                            @if(auth()->user()->foto)
                                <div class="mb-2">
                                    <img 
                                        src="{{ asset('img/' . auth()->user()->foto) }}"
                                        alt="Foto Profil"
                                        style="width:100px;height:100px;border-radius:50%;object-fit:cover;"
                                    >
                                </div>
                            @endif

                            <input 
                                type="file" 
                                name="foto" 
                                class="form-control" 
                                accept="image/*"
                            >

                            @error('foto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')  {{-- Jika layout Anda memiliki section scripts, gunakan ini; jika tidak, tambahkan di akhir body --}}

<script>
    
console.log("toggle =", document.getElementById('togglePassword'));
console.log("password =", document.getElementById('password'));
console.log("icon =", document.getElementById('eyeIcon'));

document.addEventListener("DOMContentLoaded", function () {

    const toggle = document.getElementById('togglePassword');
    const pass = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');

    toggle.addEventListener('click', function () {
        const isHidden = pass.type === "password";
        pass.type = isHidden ? "text" : "password";

        icon.classList.toggle("fa-eye");
        icon.classList.toggle("fa-eye-slash");
    });

});
</script>
@endsection