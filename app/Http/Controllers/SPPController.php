<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\SPP;
use App\Models\Month;
use Illuminate\Contracts\Session\Session;

class SPPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        
        $data = User::all()->where('id' , $id);
        $histori_spp = DB::table('spps')->join('month', 'spps.id_bulan', '=', 'month.id_bulan')->where('id_siswa' , $id)->get();
        $nim = $id;
        $bulan = Month::all();

        return view('admin_dataspp', compact('data', 'histori_spp','bulan', 'nim'));
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
        //$spp digunakan untuk mengecek apakah ada data pada bulan yang sama 
        $spp = SPP::all()->where('id_bulan' , $request->month)->count();

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
        return back()->with ('message','Data Berhasil Diupdate!');
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
        $spp = DB::table('spps')->join('month', 'spps.id_bulan', '=', 'month.id_bulan')->where('id' , $id)->get();
        return view('admin_editspp', compact('spp'));
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
        $id_siswa = $request->input('id_siswa');

        if(($request->input('nominal')) <= 0){
            return back()->with ('danger','Inputan tidak boleh dibawah atau sama dengan 0');
        }
        else if(($request->input('nominal')) > 150000){
            return back()->with ('warning','Harga uang sekolah yang ditetapkan ialah 150000 dan tidak diperkenankan melebihi batas maksimal');
        }
        else{
            $editspp = SPP::findorfail($id);
            $editspp->update($request->all());
            
            return redirect(route('admin_spp', $id_siswa))->with ('success','Data Berhasil Diupdate!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SPP::findorfail($id)->delete();
        return back()->with('message', 'Data berhasil dihapus');
    }
}




