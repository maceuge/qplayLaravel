<?php

namespace App\Http\Controllers\Auth;

use App\Instrument;
use App\User;
use App\Band;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/userlog';

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
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $rdate = $data['anionac'].'-'.$data['mesnac'].'-'.$data['dianac'];
        $time = strtotime($rdate);
        $birthdate = date('Y-m-d',$time);

        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'birthday' => $birthdate,
            'avatar' => '/img/default_male.jpg',
        ]);

        $user->save();

        for ($i = 0; $i < count($data['bandas']); $i++) {
            $bandas = Band::create([
                'user_id' => $user->id,
                'band' => $data['bandas'][$i],
            ]);
            $bandas->save();
        }

        for ($i = 0; $i < count($data['inst']); $i++) {
            $instrument = Instrument::create([
                'user_id' => $user->id,
                'instrument' => $data['inst'][$i],
                'level' => $data['nivelinst'][$i],
            ]);
            $instrument->save();
        }

        return $user;
    }
}
