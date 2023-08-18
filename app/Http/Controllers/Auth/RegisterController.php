<?php

namespace App\Http\Controllers\Auth;

use App\Models\Shop;
use App\Models\User;
use App\Services\ShopService;
use App\Services\UserService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
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
            'shop' => ['required', 'array', 'size:3'],

            'shop.name' => ['required', 'string'],
            'shop.phone' => ['required', 'string'],
            'shop.address' => ['required', 'string'],

            'user' => ['required', 'array', 'size:4'],

            'user.name' => ['required', 'string', 'max:255'],
            'user.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $data['user']['name']],
            'user.password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [], [
            'shop.name'    => 'name',
            'shop.phone'   => 'phone',
            'shop.address' => 'address',
            'user.name'    => 'name',
            'user.email'   => 'email',
            'user.password' => 'password',
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
        $shop = (new ShopService)->handel($data['shop']);

        $user = (new UserService)->handel(array_merge($data['user'], ['shop_id' => $shop->id]));
        return User::find($user->id);
    }
}
