@section('content-content')
    <a style="float: right; width: 100%; text-align: right;" href="#"
       onClick="alert('Prezado cliente, caso não tenho encontrado seu endereço' +
                        ' é por que nesse momento ainda não entregamos na sua região, '+
                        'mas ainda assim você pode fazer seu pedido online e retirar no local.')">
        Não localizei meu endereço
    </a>
    <div id="edit_profile">
        <div class="p-0">
            <form method="POST" action="{{ $route }}">
                @csrf
                @method($method)

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="uf">*Estado</label>
                            <script>
                                sessionStorage.setItem('uf-valor', '{{ old('uf', $endereco->uf) }}');
                            </script>
                            <select id="uf" name="uf" class="form-control" @error('uf') is-invalid @enderror required>
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
                            <script>
                                sessionStorage.setItem('cidade-valor', '{{ old('cidade', $endereco->cidade) }}');
                            </script>
                            <select id="cidade" name="cidade" class="form-control"  @error('cidade') is-invalid @enderror required>
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
                            <script>
                                sessionStorage.setItem('bairro-valor', '{{ old('bairro_id', $endereco->bairro_id) }}');
                            </script>
                            <select id="bairro_id" name="bairro_id" class="form-control" @error('bairro') is-invalid @enderror required>
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
                            <label for="endereco">*Endereço</label>

                            <input id="endereco" type="text" name="endereco"
                                   class="form-control @error('endereco') is-invalid @enderror"
                                   placeholder="Endereço" value="{{ old('endereco', $endereco->endereco) }}" >

                            @error('endereco')
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
                            <label for="numero">*Número</label>

                            <input type="text" name="numero"
                                   class="form-control @error('numero') is-invalid @enderror"
                                   placeholder="Número" value="{{ old('numero', $endereco->numero) }}">

                            @error('numero')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="complemento">Complemento</label>

                            <input type="text" name="complemento"
                                   class="form-control @error('complemento') is-invalid @enderror"
                                   placeholder="Complemento"
                                   value="{{ old('complemento', $endereco->complemento) }}">

                            @error('complemento')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-block btn-lg">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@include('user._user')
