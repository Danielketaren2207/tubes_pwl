<?php

namespace App\Http\Controllers\Auth;
use App\Uploads;
use Illuminate\Http\Request;




use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // return User::create([ 
            $user = User::create([
       
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'jenis_kelamin' => $data['jenis_kelamin'],
            'agama' => $data['agama'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'kota_asal' => $data['kota_asal'],
            'alamat' => $data['alamat'],
            'nama_ayah' => $data['nama_ayah'],
            'nama_ibu' => $data['nama_ibu'],
            'pekerjaan_ayah' => $data['pekerjaan_ayah'],
            'pekerjaan_ibu' => $data['pekerjaan_ibu'],
            'no_hp_ibu' => $data['no_hp_ibu'],
            'no_hp_ayah' => $data['no_hp_ayah'],
            
        ]);

        if(request()->hasFile(key: 'image')){
            $image = request()->file(key: 'image')->getClientOriginalName();
            request()->file(key: 'image')->storeAs('/image', $image, options:'');
            $user->update(['image'=>$image]);
        }

        return $user;
    }


    
       
}

    


