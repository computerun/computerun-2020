<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'phone' => ['required', 'string'],
            'line' => ['nullable', 'string'],
            'whatsapp' => ['nullable', 'string'],
            'id_mobile_legends' => ['nullable', 'string'],
            'id_pubg_mobile' => ['nullable', 'string'],
            'id_valorant' => ['nullable', 'string'],
            'university_id' => ['required', 'numeric'],
            'nim' => ['nullable', 'numeric'],
            'new_university' => ['nullable', 'string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if ($data['new_university'] != ""){
            $data['university_id'] = DB::table('universities')->insertGetId(['name' => $data['new_university']]);
        }
        $binusian = ($data['university_id'] == 4) ? 1 : 0;

        if ($data['university_id'] == 2 || $data['university_id'] == 3) $data['university_id'] = 1;

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'line' => $data['line'],
            'whatsapp' => $data['whatsapp'],
            'id_mobile_legends' => $data['id_mobile_legends'],
            'id_pubg_mobile' => $data['id_pubg_mobile'],
            'id_valorant' => $data['id_valorant'],
            'nim' => $data['nim'],
            'university_id' => $data['university_id'],
            'binusian' => $binusian
        ]);
    }
}
