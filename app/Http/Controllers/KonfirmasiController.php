<?php

namespace App\Http\Controllers;

use App\Models\Konfirmasi;
use Illuminate\Http\Request;
use App\Models\Uang_pangkal;
use App\Models\SPP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class KonfirmasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $data = DB::table('konfirmasi')->join('users', 'konfirmasi.id_siswa', '=', 'users.id')->where('status' , 'ongoing')->get();
        return view('admin_konfirmasi', compact('data'));

    }

    public function salur($id)
    {
        $data = DB::table('konfirmasi')->join('users', 'konfirmasi.id_siswa', '=', 'users.id')->where('status' , 'ongoing')->where('id_conf' ,'=' , $id )->get();
        $histori_up = DB::table('uang_pangkal')->where('id_siswa' , $id)->get();
        return view('admin_salurkan', compact('data', 'histori_up'));
    }

    public function allow(Request $request, $id_conf)
    {
        if($request->opsi === "Uang Pangkal"){
            $up = Uang_pangkal::all()->where('pembayaran_ke' , $request->cicilan)->where('id_siswa', $request->id)->count();
            $all_up = Uang_pangkal::all()->where('id_siswa', $request->id)->count();
            $sum_up = Uang_pangkal::all()->where('id_siswa', $request->id)->sum('nominal');
            $sisa = 1000000 - $sum_up;
            $profit = $sum_up + $request->nominal;

            if($up > 0){
                return back()->with ('warning','Cicilan ke ' .$request->cicilan. ' telah dibayar');
            }
            else if(($request->nominal) <= 0){
                return back()->with ('danger','Inputan tidak boleh dibawah atau sama dengan 0');
            }
            else if($profit > 1000000){
                return back()->with ('danger','Anda telah melebihi batas pembayaran yang ditetapkan');
            }
            else if($all_up == 9){
                if($request->nominal != $sisa ){
                    return back()->with('warning','Anda harus membayar sebesar '. $sisa . ' untuk melunasi cicilan');
                }
                else{
                DB::table('uang_pangkal')->insert(
                    [
                        'id_siswa' => $request->id,
                        'pembayaran_ke' => $request->cicilan,
                        'nominal' => $request->nominal,
                    ]
                );
                $status = Konfirmasi::find($id_conf);
                $status->update(['status' => "allowed"]);
                return redirect(route('admin_konfirmasi'))->with ('message','Data Berhasil Diupdate! Anda telah melunasi cicilan uang pangkal ');
                }
            }
            else if($profit < 1000000){
                DB::table('uang_pangkal')->insert(
                    [
                        'id_siswa' => $request->id,
                        'pembayaran_ke' => $request->cicilan,
                        'nominal' => $request->nominal,
                    ]
                    );
                    $status = Konfirmasi::findorfail($id_conf);
                    $status->update(['status' => "allowed"]);
                return redirect(route('admin_konfirmasi'))->with ('message','Data Berhasil Diupdate! ');
            }
            else{
                DB::table('uang_pangkal')->insert(
                    [
                        'id_siswa' => $request->id,
                        'pembayaran_ke' => $request->cicilan,
                        'nominal' => $request->nominal,
                    ]
                );
                $status = Konfirmasi::findorfail($id_conf);
                $status->update(['status' => "allowed"]);
                return redirect(route('admin_konfirmasi'))->with ('message','Data Berhasil Diupdate! Anda telah melunasi cicilan uang pangkal ');
            }
        }
        else if($request->opsi === "SPP"){
            $spp = SPP::all()->where('id_bulan' , $request->month)->where('id_siswa', $request->id)->count();

            if($spp > 0){
                return back()->with ('warning','Data untuk bulan ini sudah ada');
            }
            if(($request->nominal) > 150000){
                return back()->with ('warning','Harga uang sekolah yang ditetapkan ialah 150000 dan tidak diperkenankan melebihi batas maksimal');
            }
            else if(($request->nominal) <= 0){
                return back()->with ('danger','Inputan tidak boleh dibawah atau sama dengan 0');
            }
    
            else{
            DB::table('spps')->insert(
                [
                    'id_siswa' => $request->id,
                    'id_bulan' => $request->month,
                    'nominal' => $request->nominal,
                ]
            );
            $status = Konfirmasi::findorfail($id_conf);
            $status->update(['status' => "allowed"]);
            return redirect(route('admin_konfirmasi'))->with ('message','Data Berhasil Diupdate! Anda telah melunasi cicilan uang pangkal ');
        }
        }

    }

    public function block($id_conf)
    {
        $status = Konfirmasi::findorfail($id_conf);
        $status->update(['status' => "blocked"]);
        return redirect(route('admin_konfirmasi'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(request()->hasFile(key: 'gambar')){
            $image = request()->file(key: 'gambar')->getClientOriginalName();
            request()->file(key: 'gambar')->storeAs('/konfirmasi', $image, options:'');
            DB::table('konfirmasi')->insert(
                [
                    'id_siswa' => Auth::user()->id,
                    'opsi' => $request->opsi,
                    'nominal' => $request->nominal,
                    'gambar' => $image,
                    'status' => "ongoing",
                ]
            );
            return back()->with ('message','Berhasil dikirimkan ');
        }
        else{
            return back()->with('message','Gagal');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
