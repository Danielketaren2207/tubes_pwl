<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $datasiswa = User::all()->where('hak_akses','2');
        return view ('admin_datasiswa' , compact('datasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin_tambahdatasiswa');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tambahdatasiswa = User::create(
            [
                'title' => $request->title,
                'caption' => $request->caption,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request['password']),
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kota_asal' => $request->kota_asal,
                'alamat' => $request->alamat,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'pekerjaan_ayah' => $request->pekerjaan_ayah,
                'pekerjaan_ibu' => $request->pekerjaan_ibu,
                'no_hp_ibu' => $request->no_hp_ibu,
                'no_hp_ayah' => $request->no_hp_ayah,
            ]);

            if(request()->hasFile(key: 'image')){
                $image = request()->file(key: 'image')->getClientOriginalName();
                request()->file(key: 'image')->storeAs('/image', $image, options:'');
                $tambahdatasiswa->update(['image'=>$image]);
            }
            return redirect('admindatasiswa')->with('success', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viewdatasiswa = User:: findorfail($id);
        return view ('admin_viewsiswa' , compact('viewdatasiswa') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editdatasiswa = User:: findorfail($id);
        return view ('admin_editsiswa' , compact('editdatasiswa') );
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
        $editdatasiswa = User:: findorfail($id);
        $editdatasiswa->update($request->all());
        if(request()->hasFile(key: 'image')){
            $image = request()->file(key: 'image')->getClientOriginalName();
            request()->file(key: 'image')->storeAs('/image', $image, options:'');
            $editdatasiswa->update(['image'=>$image]);
        }
        return redirect('admindatasiswa')->with ('success','Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tambahdatasiswa = User:: findorfail($id);
        $tambahdatasiswa->delete();
        return back();
    }

    public function search()
    {
        $datasiswa = User::oldest()->where('hak_akses','2');

        if(request('search')){
            $datasiswa->where('name', 'like', '%'. request('search'). '%');
        }

        return view('admin_carisiswa', ["datasiswa" => $datasiswa->get()]);
    }

    public function search2()
    {
        $datasiswa = User::oldest()->where('hak_akses','2');

        if(request('search')){
            $datasiswa->where('name', 'like', '%'. request('search'). '%');
        }

        return view('admin_datasiswa', ["datasiswa" => $datasiswa->get()]);
    }


}
