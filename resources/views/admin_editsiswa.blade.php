<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Data Siswa</title>

    <!-- Custom fonts for this template-->
    <link href=" {{asset(' vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" >
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}" >

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                
                <div class="sidebar-brand-text mx-3">Selamat Datang Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href=" {{ route('admin_dashboard') }} ">
                    <i class="fa-solid fa-house"></i>
                    <span>Home</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href=" {{ route('admin_berita') }} ">
                    <i class="fa-solid fa-newspaper"></i>
                    <span>Berita</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href=" {{ route('admin_datasiswa') }} ">
                    <i class="fa-solid fa-address-card"></i>
                    <span>Data Siswa</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fa-solid fa-money-bill-wave"></i>
                    <span>Pembayaran</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        
                        <a class="collapse-item" href="{{ route('admin_search_up') }}">Uang Pangkal</a>
                        <a class="collapse-item" href="{{ route('search_datasiswa') }}">SPP Bulanan</a>
                    </div>
                </div>
            </li>
           
            <!-- Nav Item - Pages Collapse Menu -->
            

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin_konfirmasi') }}">
                    <i class="fa-solid fa-circle-check"></i>
                    <span>Konfirmasi Admin</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">



           

        </ul>
        <!-- End of Sidebar -->

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
                    {{-- <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> --}}

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                     

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        @include('layouts.user_information')
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div id="page-content-wrapper">
                    <div class="container-fluid mt-4">
                       <h2 class="subjudul ms-2 mb-3" >Edit Data Siswa</h2> 
        
                            <div class="container mb-3"> 
                                <div class="card bg-white shadow p-4 mb-4">                

                                    <div class="card-body">
                                        <form method="post" action="{{ route('admin_editsiswa_simpan',$editdatasiswa->id) }}" enctype="multipart/form-data">
                                            @csrf
                    
                                            <div class="row mb-3">
                                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$editdatasiswa->name}}" required autocomplete="name" autofocus>
                    
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="row mb-3">
                                                <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Foto Peserta Didik') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{$editdatasiswa->name}}" >
                                                    <img src=" {{ url('storage/image/' . $editdatasiswa->image) }}" width="300px">

                                                    @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="row mb-3">
                                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$editdatasiswa->email}}" required autocomplete="email">
                    
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="row mb-3">
                                                <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('Jenis Kelamin') }}</label>
                                                <div class="col-md-6">
                                                    <select id="jenis_kelamin" class="form-select form-control" name="jenis_kelamin" aria-label="Default select example"  value ="{{$editdatasiswa->jenis_kelamin}}" >
                                                        <option value ="{{$editdatasiswa->jenis_kelamin}}" >{{$editdatasiswa->jenis_kelamin}}</option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                      </select>


                                                    @error('jenis_kelamin')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="row mb-3">
                                                <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('Agama') }}</label>
                    
                                                <div class="col-md-6">
                    
                                                    <select id="agama" class="form-select form-control" name="agama" aria-label="Default select example">
                                                        <option selected>{{$editdatasiswa->agama}}</option>
                                                        <option value="Islam">Islam</option>
                                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                                        <option value="Katholik">Katholik</option>
                                                        <option value="Hindu">Hindu</option>
                                                        <option value="Buddha">Buddha</option>
                                                        <option value="Konghucu">Konghucu</option>
                                                      </select>
                    
                                                    @error('agama')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="row mb-3">
                                                <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('Tempat Lahir') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{$editdatasiswa->tempat_lahir}}" required >
                    
                                                    @error('tempat_lahir')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                    
                                            <div class="row mb-3">
                                                <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Lahir') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{$editdatasiswa->tanggal_lahir}}" required >
                    
                                                    @error('tanggal_lahir')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                    
                                            <div class="row mb-3">
                                                <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('Alamat') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{$editdatasiswa->alamat}}" required >
                    
                                                    @error('alamat')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                    
                                            
                    
                    
                                            <div class="row mb-3">
                                                <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('Kota Tempat Tinggal') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="kota_asal" type="text" class="form-control @error('kota_asal') is-invalid @enderror" name="kota_asal" value="{{$editdatasiswa->kota_asal}}" required >
                    
                                                    @error('kota_asal')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                    
                                            <div class="row mb-3">
                                                <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('Nama Ayah') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="nama_ayah" type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{$editdatasiswa->nama_ayah}}" required >
                    
                                                    @error('nama_ayah')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="row mb-3">
                                                <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('Pekerjaan Ayah') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="pekerjaan_ayah" type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah" value="{{$editdatasiswa->pekerjaan_ayah}}" required >
                    
                                                    @error('pekerjaan_ayah')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="row mb-3">
                                                <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('No HP Ayah') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="no_hp_ayah" type="number" class="form-control @error('no_hp_ayah') is-invalid @enderror" name="no_hp_ayah" value="{{$editdatasiswa->no_hp_ibu}}" required >
                    
                                                    @error('no_hp_ayah')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="row mb-3">
                                                <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('Nama Ibu') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="nama_ibu" type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{$editdatasiswa->nama_ibu}}" required >
                    
                                                    @error('nama_ibu')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="row mb-3">
                                                <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('Pekerjaan Ibu') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="pekerjaan_ibu" type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu" value="{{$editdatasiswa->pekerjaan_ibu}}" required >
                    
                                                    @error('pekerjaan_ibu')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                    
                                            <div class="row mb-3">
                                                <label for="text" class="col-md-4 col-form-label text-md-end">{{ __('No HP Ibu') }}</label>
                    
                                                <div class="col-md-6">
                                                    <input id="no_hp_ibu" type="number" class="form-control @error('alamat') is-invalid @enderror" name="no_hp_ibu" value="{{$editdatasiswa->no_hp_ibu}}" required >
                    
                                                    @error('no_hp_ibu')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                       
                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Edit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>   
           
                                     

                        </div>
                    </div>
                </div>
            </div>

            </div>


            
                    
                </div> 
             
        </div> 
                </div>
            </div>
    </div>


        </div>
            <!-- End of Main Content -->

            

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
                    <a class="btn btn-primary" href="login">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src=" {{ asset('vendor/jquery/jquery.min.js') }} "></script>
    <script src="  {{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>

    <!-- Core plugin JavaScript-->
    <script src="  {{ asset('vendor/jquery-easing/jquery.easing.min.js') }} "></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script src="https://kit.fontawesome.com/866812587f.js" crossorigin="anonymous"></script>

</body>

</html>