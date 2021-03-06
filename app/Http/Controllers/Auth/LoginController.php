<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);

        return redirect('/home');
    }

    public function findOrCreateUser($user, $provider){

        $authUser = User::where('provider_id', $user->id)->first();

        if($authUser){
            return $authUser;
        }

        if($provider == 'vkontakte'){
            if($user->sex == 1){
                $genderStr = 'f';
            } else if($user->sex == 2){
                $genderStr = 'm';
            }

            return User::create([
                'name'              => $user->name,
                'email'             => $user->accessTokenResponseBody['email'],
                'provider'          => strtoupper($provider),
                'provider_id'       => $user->id,
                'avatar'            => $user->avatar,
                'sex'               => $genderStr,
            ]);
        } elseif($provider == 'google'){
            return User::create([
                'name'              => $user->name,
                'email'             => $user->email,
                'provider'          => strtoupper($provider),
                'provider_id'       => $user->id,
                'avatar'            => $user->avatar,
            ]);
        }
    }
}
