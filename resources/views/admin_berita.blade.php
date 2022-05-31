<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href=" {{asset('vendor/fontawesome-free/css/all.min.css')}} " rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Custom styles for this template-->
    <link href=" {{asset('css/sb-admin-2.min.css')}} " rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                
                <div class="sidebar-brand-text mx-3">Selamat Datang Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="admin">
                    <i class="fa-solid fa-house"></i>
                    <span>Home</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="adminberita">
                    <i class="fa-solid fa-newspaper"></i>
                    <span>Berita</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="admindatasiswa">
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
                        
                        <a class="collapse-item" href="admintambahuangpangkal">Uang Pangkal</a>
                        <a class="collapse-item" href="admincarisiswa">SPP Bulanan</a>
                    </div>
                </div>
            </li>
           
            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="adminkonfirmasi">
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
                        <h2 class="subjudul ms-2 mb-3" >Berita  <a href="{{ route('admin_tambahberita') }}"> <button type="button" class="btn btn-success"> Tambah Berita </button> </a> </h2>
        
                            <div class="container mb-3">
                                <div class="card bg-white shadow p-4 mb-4">

                                    <table class="table">
                                        <thead>
                                          <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Title</th>
                                            <th  scope="col" style="width: 200px" >Description</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($databerita as $item)
                                                <tr>
                                                    <th scope="row"> {{$loop->iteration}} </th>
                                                    <td>{{$item->title}}</td>
                                                    <td> {{$item->caption}} </td>
                                                    <td>
                                                        <img src="{{ url('storage/berita/' . $item->image) }}" class="rounded" style="width: 200px">
                                                    </td>
                                                    <td> {{ date('d-m-Y' , strtotime($item->created_at)) }}</td>
                                                    <td><a href="{{ url('admineditberita', $item->id) }}"> <button type="button" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button> </a>

                                                        {{-- HAPUS DATA --}}
                                                        <button type="button" class="btn btn-danger delete" data-id="{{$item->id}}" ><i class="fa-solid fa-trash-can"></i></button>
                                                            
                                                            


                                                    </td>

                                                </tr>
                                            @endforeach
                                            {{-- ----template-----
                                          {{-- <tr>
                                            <th scope="row">1</th>
                                            <td>Bermain Sambil Belajar</td>
                                            <td>Kemajuan bangsa Indonesia di masa depan tergantung generasi muda saat ini. Untuk menciptakan generasi yang unggul, anak-anak muda perlu dibekali pendidikan karakter yang baik.</td>

                                            <td> <img src="gambar/th (1).jpg" alt="" width="200px" height="150px"> </td>
                                            <td>2022-05-12</td>
                                            <td> <a href="{{ route('admin_editberita') }}"> <button type="button" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button> </a>
                                                <button type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                            </td>
                                          </tr> --}}
                                        </tbody>
                                      </table>
                                      <br>
            {{-- PAGINATION --}}
                                      
                                      <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-center">
                                          <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                              <span aria-hidden="true">&laquo;</span>
                                            </a>
                                          </li>
                                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                                          <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                              <span aria-hidden="true">&raquo;</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </nav> 

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
    <script src=" {{asset('vendor/jquery/jquery.min.js')}} "></script>
    <script src=" {{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}} "></script>

    <!-- Core plugin JavaScript-->
    <script src=" {{asset('vendor/jquery-easing/jquery.easing.min.js')}} "></script>

    <!-- Custom scripts for all pages-->
    <script src=" {{asset('js/sb-admin-2.min.js')}} "></script>

    <!-- Page level plugins -->
    <script src=" {{asset('vendor/chart.js/Chart.min.js')}} "></script>

    <!-- Page level custom scripts -->
    <script src=" {{asset('js/demo/chart-area-demo.js')}} "></script>
    <script src=" {{asset('js/demo/chart-pie-demo.js')}} "></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/866812587f.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    @include('sweetalert::alert')

</body>
<script>

$('.delete').click( function(){
    var beritaid = $(this).attr('data-id');
    swal({
            title: "Apakah Anda Yakin?",
            text: "Kamu Akan Menghapus Berita Ini! ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location = "/admin_hapusberita/"+beritaid+""
                swal("Berita Berhasil Dihapus!", {
                icon: "success",
                });
            } 
            // else {
            //     swal("Your imaginary file is safe!");
            // }
            });
});
            
</script>
</html>