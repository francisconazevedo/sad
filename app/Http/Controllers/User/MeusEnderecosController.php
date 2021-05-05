<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\UserEnderecoRequest;
use App\Models\Bairro;
use App\Models\User;
use App\Models\UserEndereco;
use Illuminate\Support\Facades\Session;

class MeusEnderecosController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = \Auth::user();
        $enderecos = $user->enderecos;

        return view('user.enderecos.index', compact('enderecos'));
    }

    public function create()
    {
        return view('user.enderecos.create', ['endereco' => new UserEndereco()]);
    }

    public function store(UserEnderecoRequest $enderecoRequest)
    {
        /** @var User $user */
        $user = \Auth::user();
        $requestArray = $enderecoRequest->all();
        $bairro = Bairro::where('id', $requestArray['bairro_id'])->get()->first();
        $requestArray['bairro'] = $bairro->nome;
        $endereco = new UserEndereco($requestArray);

        if ($user->enderecos()->save($endereco))
            Session::flash('notify', 'Salvo com sucesso');
        else
            Session::flash('error', 'Falha ao salvar');

        return redirect()->route('user.meus-enderecos.index', 1);
    }

    public function edit($request)
    {
        $endereco = UserEndereco::findOrFail($request);
        return view('user.enderecos.edit', ['endereco' => $endereco]);
    }

    public function update($request, UserEnderecoRequest $enderecoRequest)
    {
        $requestArray = $enderecoRequest->all();

        $endereco = UserEndereco::findOrFail($request);
        $bairro = Bairro::where('id', $requestArray['bairro_id'])->get()->first();
        $requestArray['bairro'] = $bairro->nome;
        if ($endereco->update($requestArray))
            Session::flash('notify', 'Salvo com sucesso');
        else
            Session::flash('error', 'Falha ao salvar');
        return redirect()->route('user.meus-enderecos.index', 1);
    }

    public function destroy($id)
    {
        /** @var User $user */
        $user = \Auth::user();

        if ($user->enderecos->count() == 1)
            Session::flash('error', 'Impossível apagar o único endereço');
        else
            UserEndereco::findOrFail($id)->delete();

        return redirect()->route('user.meus-enderecos.index', 1);
    }
}
