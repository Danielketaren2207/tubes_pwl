<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data SPP</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

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
                <a class="nav-link" href="{{ route('admin_dashboard') }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Home</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin_berita')}}">
                    <i class="fa-solid fa-newspaper"></i>
                    <span>Berita</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('admin_datasiswa')}}">
                    <i class="fa-solid fa-address-card"></i>
                    <span>Data Siswa</span></a>
            </li>

            
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <span>Pembayaran</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('admin_search_up')}}">Uang Pangkal</a>
                        <a class="collapse-item active" href="{{route('search_datasiswa')}}">SPP Bulanan</a>
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
                        <h2 class="subjudul"> Data SPP </h2>
                        @if(session('message'))
                        <div class="alert alert-info">
                          {{session('message')}}
                        </div>
                        @elseif(session('warning'))
                        <div class="alert alert-warning">
                            {{session('warning')}}
                        </div>
                        @elseif(session('danger'))
                        <div class="alert alert-danger">
                            {{session('danger')}}
                        </div>
                        @endif
                        @foreach ($data as $d)
                        <a href="{{ url('cetakspp', $d->id) }}"> <button type="button" class="btn btn-success mb-3"> Cetak <i class="fa-solid fa-print"></i></button> </a>
                        <div class="container mb-3">
                            <div class="card bg-white shadow p-4 mb-4">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="{{ url('storage/image/' . $d->image)}}" class="rounded" style="width: 200px"> 

                                    </div>
                                    <div class="col-8">
                                        <h2 style="font-weight: 800">{{$d->name}}</h2>
                                            <table style="border: 1px soli transparent;">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 150px;"><b>NISN</b></td>
                                                        <td>{{$d->id}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Jenis Kelamin</b></td>
                                                        <td>{{$d->jenis_kelamin}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Agama</b></td>
                                                        <td>{{$d->agama}}</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><b>Tempat Lahir</b></td>
                                                        <td>{{$d->tempat_lahir}}</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><b>Tanggal Lahir</b></td>
                                                        <td>{{$d->tanggal_lahir}}</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><b>Alamat</b></td>
                                                        <td>{{$d->alamat}}</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><b>Kota Asal</b></td>
                                                        <td>{{$d->kota_asal}}</td>
                                                    </tr>

                                                    <tr>
                                                        <td><b>Nama Ayah</b></td>
                                                        <td>{{$d->nama_ayah}}</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><b>Pekerjaan Ayah</b></td>
                                                        <td>{{$d->pekerjaan_ayah}}</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><b>No Hp Ayah</b></td>
                                                        <td>{{$d->no_hp_ayah}}</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><b>Nama Ibu</b></td>
                                                        <td>{{$d->nama_ibu}}</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><b>Pekerjaan Ibu</b></td>
                                                        <td>{{$d->pekerjaan_ibu}}</td>
                                                    </tr>

                                                    <tr>
                                                        <td><b>No Hp Ibu</b></td>
                                                        <td>{{$d->no_hp_ibu}}</td>
                                                    </tr>
                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            <div class="container mb-3">
                                <div class="card bg-white shadow p-4 mb-4">
                                    
                                    
                                    <div id="page-content-wrapper">
                                        <h4>Histori Pembayaran SPP</h4>
                                        <h6>Pembayaran sebulan sebesar Rp 150.000</h6>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">Bulan</th>
                                                    <th scope="col">Nominal</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th> 
                                                </tr>
                                        </thead>
                                        <tbody>
                                                @foreach ($histori_spp as $hs)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$hs->nama_bulan}}</td>
                                                        <td>{{$hs->nominal}}</td>
                                                        @if ($hs->nominal == 150000)
                                                            <td>
                                                                Lunas
                                                            </td>
                                                        
                                                        @elseif ($hs->nominal < 150000)
                                                            <td>
                                                                Belum Lunas
                                                            </td>
                                                        
                                                        @endif
                                                        </td>
                                                        
                                                        <td>
                                                            <a href="{{ route('spp_edit' , $hs->id) }}"> <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</button> </a>
                                                            <a href="{{ route('spp_delete' , $hs->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Hapus</a>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            </table>
                                            <br>
                                        </form>

                                        
                                        
                                    </div>
                                </div>
                            </div>

            </div>


            
                                    <div class="container mb-3 px-5">
                                        <div class=" card bg-white shadow p-4 mb-4"> 
                                            <h5 class="mb-3">Tambah Data </h5> 
                                                
                                            <form method="POST" action="{{  route('spp_create')  }}">
                                                @csrf  
                                                <input type="hidden" name="id" value="{{$nim}}" >
                                                
                                                <h6>Bulan</h6>
                                                
                                                <select class="form-select form-control" name="month" aria-label="Default select example">
                                                    <option selected>Silahkan Pilih Opsi</option>
                                                    @foreach ($bulan as $b)
                                                    <option value="{{$b->id_bulan}}">{{$b->nama_bulan}}</option>
                                                    @endforeach
                                                </select>
                                                
                                                <h6 class="mt-4">Nominal</h6>
                                                <input type="text" class="form-control mb-3" name="nominal" placeholder="Masukkan nominal">
                                                
                                                <button type="submit"  class="btn btn-success">Konfirmasi</button>
                                            </form>
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
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>

    <script src="https://kit.fontawesome.com/866812587f.js" crossorigin="anonymous"></script>

</body>

</html>