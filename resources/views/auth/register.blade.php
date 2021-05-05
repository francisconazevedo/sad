@section('title', 'Cadastro - ')
@section('header-title', 'Formulário de cadastro')
@extends('layouts.site.site')


@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row pt-4">
            <div class="col-lg-5 mb-4 mb-md-0 p-4 bg-white rounded shadow-sm" style="margin: 0 auto">
                <h5 class="mb-4 profile-title">1) Dados Básicos</h5>

                <div id="edit_profile">
                    <div class="p-0">
                        <div class="form-group mb-3">
                            <label for="endereco[cep]">*Nome</label>

                            <input type="text" name="user[name]"
                                   class="form-control @error('user.name') is-invalid @enderror"
                                   placeholder="*Meu Nome" value="{{ old('user.name') }}">

                            @error('user.name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="endereco[cep]">*E-mail</label>

                            <input type="email" name="user[email]"
                                   class="form-control @error('user.email') is-invalid @enderror"
                                   autofocus placeholder="*E-mail" value="{{ old('user.email') }}">

                            @error('user.email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="endereco[cep]">*Senha</label>

                            <input type="password" name="user[password]"
                                   class="form-control @error('user.password') is-invalid @enderror"
                                   placeholder="*Senha">

                            @error('user.password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="endereco[cep]">*Confirmação de Senha</label>

                            <input type="password" name="user[password_confirmation]"
                                   class="form-control @error('user.password_confirmation') is-invalid @enderror"
                                   placeholder="*Confirmação de Senha">

                            @error('user.password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 ml-md-2 p-4 bg-white rounded shadow-sm" style="margin: 0 auto">
                <h5 class="mb-4 profile-title">2) Endereço</h5>

                <div id="edit_profile">
                    <div class="p-0">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="uf">*Estado</label>

                                    <select id="uf" name="endereco[uf]" class="form-control" @error('uf') is-invalid @enderror required>
                                        <option value="">--Todos--</option>
                                    </select>
                                    @error('uf')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="cidade">*Cidade</label>

                                    <select id="cidade" name="endereco[cidade]" class="form-control"  @error('cidade') is-invalid @enderror required>
                                        <option value="">--Todos--</option>
                                    </select>

                                    @error('cidade')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="bairro_id">*Bairro</label>

                                    <select id="bairro_id" name="endereco[bairro_id]" class="form-control" @error('bairro_id') is-invalid @enderror required>
                                        <option value="">--Todos--</option>
                                    </select>
                                    @error('bairro_id')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="endereco[endereco]">*Endereço</label>

                                    <input id="endereco" type="text" name="endereco[endereco]"
                                           class="form-control @error('endereco.endereco') is-invalid @enderror"
                                           placeholder="Endereço" value="{{ old('endereco.endereco') }}" >

                                    @error('endereco.endereco')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="endereco[numero]">*Número</label>

                                    <input type="text" name="endereco[numero]"
                                           class="form-control @error('endereco.numero') is-invalid @enderror"
                                           placeholder="Número" value="{{ old('endereco.numero') }}">

                                    @error('endereco.numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="endereco[complemento]">Complemento</label>

                                    <input type="text" name="endereco[complemento]"
                                           class="form-control @error('endereco.complemento') is-invalid @enderror"
                                           placeholder="Complemento"
                                           value="{{ old('endereco.complemento') }}">

                                    @error('endereco.complemento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                     </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6" style="margin: 0 auto">
                <button type="submit" class="btn btn-success btn-block">CADASTRAR</button>
            </div>
        </div>
    </form>
@endsection

