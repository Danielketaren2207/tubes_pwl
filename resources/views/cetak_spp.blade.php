<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report SPP Siswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center mt-4 ">
          <div class="col-md-auto"> <img src="{{ asset('gambar/tutwuri.png' ) }}" alt="" width="100px"> </div>
          <div class="col-6 judul"> SD Z MEDAN <br> <span class="konten"> Jalan Dr. T. Mansur No.9, Padang Bulan, Kec. Medan Baru, Kota Medan, Sumatera Utara 20222</span> </div>
        </div>
      </div>


      <div class="container">
        <div class="row justify-content-md-center mt-5 mb-5 ">
          <div class="col-md-auto" > <h3> <b> Laporan SPP Siswa </b> </h3> </div>
        </div>
      </div>





      
                            
                       
      @foreach ($data as $d)
                            
      <div class="container mb-4 mt-4">
              <div class="row justify-content-md-center">
                  <div class="col-md-auto">
                      <img src="{{ url('storage/image/' . $d->image)}}" class="rounded" style="width: 150px"> 

                  </div>
                  <div class="col-6">
                      <h4 style="font-weight: 600">{{$d->name}}</h4>
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
          @endforeach
          
          <div class="container mb-4 mt-5">    
              <div class="row row justify-content-md-center ">   
                  <div class="col-9">          
                  
                      <h4 style="font-weight: 600" >Histori Pembayaran SPP</h4>
                      <table class="table">
                          <thead>
                              <tr>
                                  <th scope="col">No.</th>
                                  <th scope="col">Bulan</th>
                                  <th scope="col">Nominal</th>
                                  <th scope="col">Status</th>
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


<script type="text/javascript">
    window.print();
</script>

</body>
</html>

<style>

    body{
        font-family: 'Poppins', sans-serif;
        font-size: 14px;
    }

    .judul{
        font-size: 23px;
        font-weight: 600;
    }

    .konten{
        font-size: 18px;
        font-weight: 500;
    }
</style>