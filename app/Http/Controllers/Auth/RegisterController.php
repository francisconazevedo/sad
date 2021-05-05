<?php

namespace App\Http\Controllers\Auth;

use App\Models\Bairro;
use App\Models\UserEndereco;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

        parent::__construct();
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'user.name' => ['required', 'string', 'max:255'],
                'user.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'user.password' => ['required', 'string', 'min:8', 'confirmed'],

                'endereco.endereco' => ['required'],
                'endereco.numero' => ['required'],
                'endereco.bairro_id' => ['required'],
                'endereco.cidade' => ['required'],
                'endereco.uf' => ['required'],
            ],
            [],
            [
                'user.name' => 'Nome',
                'user.email' => 'E-mail',
                'user.password' => 'Senha',
                'user.password_confirmation' => 'Confirmação de Senha',

                'endereco.endereco' => 'Endereço'
            ]
        );
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $endereco = new UserEndereco();

        return view('auth.register', compact('endereco'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->get('user'))));
        // Salvando o Endereço
        $requestEndereco = $request->get('endereco');

        $bairro = Bairro::where('id', $request->get('endereco')['bairro_id'])->get()->first();
        $requestEndereco['bairro'] = $bairro->nome;
        $user->enderecos()->save(new UserEndereco($requestEndereco));

        $this->guard()->login($user);

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


}
