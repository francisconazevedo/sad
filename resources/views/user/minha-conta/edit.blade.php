@section('title', 'Minha Conta - ')
@section('header-title', 'Minha Conta')
@extends('layouts.site.site')

@section('content-content')
    <div id="edit_profile">
        <div class="p-0">
            <form method="POST" action="{{ route('user.minha-conta.update') }}">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="name">*Nome</label>

                    <input type="text" name="name"
                           class="form-control @error('name') is-invalid @enderror" required
                           placeholder="Nome" value="{{ old('name', $user->name) }}">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email">*E-mail</label>

                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           required
                           autofocus placeholder="E-mail" value="{{ old('email', $user->email) }}">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="twitter">Senha</label>

                    <input type="password" name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Senha">

                    <small>Somente digite se deseja alterar a senha.</small>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        sessionStorage.removeItem('uf-valor');
        sessionStorage.removeItem('cidade-valor');
        sessionStorage.removeItem('bairro-valor');
    </script>
@endsection

@include('user._user')

