<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\UserDetail;
use App\UserMotor;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
//        $this->validator($request->all())->validate();

        $input = $request->only([
            'email',
            'password',
            'password_confirmation',

            'first_name',
            'last_name',
            'state',
            'district',
            'address',

            'type',
            'manufacture',
            'model_name',
            'reg_number',
            'millage',
            'cc',
            'year',
            'colour',
            'price',
            'description',

            'images', // Motor Images
        ]);

        $validator = Validator::make($input, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],

            'first_name' => ['required', 'max:100'],
            'last_name' => ['required', 'max:100'],
            'state' => ['required', 'max:100'],
            'district' => ['required', 'max:100'],
            'address' => ['required', 'max:1000'],

            'type' => ['required', 'max:100'],
            'manufacture' => ['required', 'max:100'],
            'model_name' => ['required', 'max:100'],
            'reg_number' => ['required', 'max:100'],
            'millage' => ['required', 'numeric', 'min:0'],
            'cc' => ['required', 'numeric', 'min:0'],
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
            'colour' => ['required', 'max:30'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'max:100'],

            'images' => ['required', 'array', 'min:1', 'max:4'],
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        };

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->userDetail()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'state' => $data['state'],
            'district' => $data['district'],
            'address' => $data['address'],
        ]);

        // Create Motor Data
        // This method inside base controller
        $this->motorCreate($data, $user);

        try {
            $userDetail = $user->userDetail;

            // https://myaccount.google.com/lesssecureapps //Should Be enabled
            Mail::send('email.user-register', ['data' => $user], function ($mail) use ($user, $userDetail) {
                $mail
                    ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                    ->to($user->email, $userDetail->first_name)
                    ->subject('User registration.');
            });
        } catch (\Exception $exception) {
            \Log::error($exception);
        }

        return $user;
    }
}
