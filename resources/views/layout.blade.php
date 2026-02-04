<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SCG ReadyMix Indonesia - Plan Cirebon </title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">





            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ '../' }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('img/SCG4.png') }}" alt="Logo SCG" style="height:40px; width:auto;">
                </div>
                <div class="sidebar-brand-text mx-3">SRMI CIREBON</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">







            <!-- Bagian Pembuka Menu Template -->
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                @auth
                    <a class="nav-link"
                        href="{{ auth()->user()->role === 'admin' ? route('admin.beranda') : route('user.beranda') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                @endauth
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Barang -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('barang.index') }}">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Barang</span>
                </a>
            </li>

            <!-- Nav Item - Pembelian -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pembelian.index') }}">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Pembelian</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pengiriman.index') }}">
                    <i class="fas fa-truck"></i>
                    <span>Pengiriman</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <!-- Bagian Penutup Menu Template -->








        <!-- Bagian Pembuka Header Template -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
                        onsubmit="return false;">
                        <div class="input-group">
                            <input type="text" id="searchInput" class="form-control bg-light border-0 small"
                                placeholder="Search..." aria-label="Search" onkeyup="searchContent()">
                            <div class="input-group-append">
                                <button class="btn" type="button"
                                    style="background-color:#d71920; border-color:#ff0000;">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    Welcome, {{ Auth::user()->name }}
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="{{ Auth::user()->foto 
                                            ? asset('img/' . Auth::user()->foto) 
                                            : asset('img/SCG1.png') }}" alt="Profile">
                            </a>
                            <!-- Dropdown HARUS berada di luar <a> -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('userprofil.edit', Auth::id()) }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Bagian Penutup Header Template -->


                @yield('content')







            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->










    </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->










    <!-- Bagian pembuka Show logout Template -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bagian Penutup Show logout Template -->












    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

    <script>
        function searchContent() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let sections = document.querySelectorAll('.search-section');
            let found = false;

            sections.forEach(section => {
                let text = section.innerText.toLowerCase();
                if (text.includes(input) && input !== "") {
                    section.scrollIntoView({
                        behavior: 'smooth'
                    });
                    section.style.background = "yellow"; // Highlight sederhana
                    setTimeout(() => {
                        section.style.background = ""; // Hilangkan highlight
                    }, 2000);
                    found = true;
                }
            });

            if (!found && input !== "") {
                console.log("Tidak ditemukan dalam area khusus");
            }
        }
    </script>
    @yield('scripts') 
    <script>
document.getElementById('togglePassword').addEventListener('click', function () {
    const input = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
});
</script>
<script>
    // Script untuk notifikasi selamat datang
    @if(session('welcome'))
        Swal.fire({
            title: 'Selamat Datang!',
            text: '{{ session("welcome") }}',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 3000,  // Auto-close setelah 3 detik (opsional)
            timerProgressBar: true
        });
    @endif
</script>
</body>

</html>
