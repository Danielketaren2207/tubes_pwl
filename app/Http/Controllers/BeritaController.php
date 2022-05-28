<?php

namespace App\Http\Controllers;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\User;
use GrahamCampbell\ResultType\Success;

class BeritaController extends Controller
{


    public function utama()
    {
        $databerita = Berita::all();
        return view ('halamanutama' , compact('databerita'));
    }

    public function created()
    {
        $databerita = Berita::all();
        return view ('admin_berita' , compact('databerita'));
    }

    public function index()
    {
        $databerita = Berita::all();
        // return view ('admin_editberita' , compact('databerita'));
    }

    public function create()
    {
        return view ('admin_tambahberita');
    }

    public function store(Request $request)
    {
        $berita = Berita::create(
            [
                'title' => $request->title,
                'caption' => $request->caption,
            ]);

            if(request()->hasFile(key: 'image')){
                $image = request()->file(key: 'image')->getClientOriginalName();
                request()->file(key: 'image')->storeAs('/berita', $image, options:'');
                $berita->update(['image'=>$image]);
            }
            return redirect('adminberita')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit($id)
    {
        $editberita = Berita:: findorfail($id);
        return view ('admin_editberita' , compact('editberita') );
    }

    public function update(Request $request, $id)
    {
        $editberita = Berita:: findorfail($id);
        $editberita->update($request->all());
        if(request()->hasFile(key: 'image')){
            $image = request()->file(key: 'image')->getClientOriginalName();
            request()->file(key: 'image')->storeAs('/berita', $image, options:'');
            $editberita->update(['image'=>$image]);
        }
        return redirect('adminberita')->with ('success','Data Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        $databerita = Berita:: findorfail($id);
        $databerita->delete();
        return back();
    }

   
}
