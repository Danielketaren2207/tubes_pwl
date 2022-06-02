<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Uang_pangkal;
use Illuminate\Support\Facades\DB;


class UangPangkalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = User::all()->where('id' , $id);
        $histori_up = DB::table('uang_pangkal')->where('id_siswa' , $id)->get();
        $nim = $id;

        return view('admin_datauangpangkal', compact('data', 'histori_up', 'nim'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            return back()->with ('message','Data Berhasil Diupdate! Anda telah melunasi cicilan uang pangkal ');
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
            return back()->with ('message','Data Berhasil Diupdate! ');
        }
        else{
            DB::table('uang_pangkal')->insert(
                [
                    'id_siswa' => $request->id,
                    'pembayaran_ke' => $request->cicilan,
                    'nominal' => $request->nominal,
                ]
            );
            return back()->with ('message','Data Berhasil Diupdate! Anda telah melunasi cicilan uang pangkal ');
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
        Uang_pangkal::findorfail($id)->delete();
        return back()->with('message', 'Data berhasil dihapus');
    }

    public function search()
    {
        $datasiswa = User::latest()->where('hak_akses','2');

        if(request('search')){
            $datasiswa->where('name', 'like', '%'. request('search'). '%');
        }

        return view('admin_carisiswa_uangpangkal', ["datasiswa" => $datasiswa->get()]);
    }
}
