<form method="POST" action="{{ $action }}">
    @csrf
    @method($method)
    <div class="card-body">
        <div class="form-group mb-0">
            <label for="facebook">Facebook</label>
            <input type="text" class="form-control" id="facebook" name="facebook"
                   value="{{ old('facebook', $configuracao->facebook) }}">
        </div>

        <div class="form-group mb-0">
            <label for="twitter">Twitter</label>
            <input type="text" class="form-control" id="twitter" name="twitter"
                   value="{{ old('twitter', $configuracao->twitter) }}">
        </div>

        <div class="form-group mb-0">
            <label for="instagram">Instagram</label>
            <input type="text" class="form-control" id="instagram" name="instagram"
                   value="{{ old('instagram', $configuracao->instagram) }}">
        </div>

        <div class="form-group mt-5">
            <label for="whatsapplink">Whatsapp Link</label>
            <input type="text" class="form-control" id="whatsapplink" name="whatsapp_link"
                   value="{{ old('whatsapp_link', $configuracao->whatsapp_link) }}">
        </div>

        <div class="form-group mt-0">
            <label for="intagramiframe">Maps Iframe</label>
            <input type="text" class="form-control" id="maps_iframe" name="maps_iframe"
                   value="{{ old('maps_iframe', $configuracao->maps_iframe) }}">
        </div>


        <div class="form-group mt-5">
            <label for="telefone1">Telefone 1</label>
            <input type="text" class="form-control" id="telefone1" name="telefone1"
                   value="{{ old('telefone1', $configuracao->telefone1) }}">
        </div>

        <div class="form-group mt-0">
            <label for="telefone2">Telefone 2</label>
            <input type="text" class="form-control" id="telefone2" name="telefone2"
                   value="{{ old('telefone2', $configuracao->telefone2) }}">
        </div>


        <div class="form-group mt-5">
            <label for="email1">E-mail 1</label>
            <input type="text" class="form-control" id="email1" name="email1"
                   value="{{ old('email1', $configuracao->email1) }}">
        </div>

        <div class="form-group mt-0">
            <label for="email2">E-mail 2</label>
            <input type="text" class="form-control" id="email2" name="email2"
                   value="{{ old('email2', $configuracao->email2) }}">
        </div>

        <div class="row mt-5">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="rua">*Rua</label>
                    <input type="text" class="form-control @error('rua') is-invalid @enderror" id="rua" name="rua"
                           value="{{ old('rua', $configuracao->rua) }}">

                    @error('rua')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="bairro">*Bairro</label>
                    <input type="text" class="form-control @error('bairro') is-invalid @enderror" id="bairro"
                           name="bairro"
                           value="{{ old('bairro', $configuracao->bairro) }}">

                    @error('bairro')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="cidade">*Cidade</label>
                    <input type="text" class="form-control @error('cidade') is-invalid @enderror" id="cidade"
                           name="cidade"
                           value="{{ old('cidade', $configuracao->cidade) }}">

                    @error('cidade')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <label for="estado">*Estado</label>
                    <input type="text" class="form-control @error('estado') is-invalid @enderror" id="estado"
                           name="estado"
                           value="{{ old('estado', $configuracao->estado) }}">

                    @error('estado')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="horario_funcionamento">Horário de Funcionamento</label>
            <input type="text" class="form-control" id="horario_funcionamento" name="horario_funcionamento"
                   value="{{ old('horario_funcionamento', $configuracao->horario_funcionamento) }}">
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="introducao">História da empresa</label>
                <textarea name="historia_empresa" type="text" class="form-control" id="historia_empresa"
                >{{ old('introducao', $configuracao->historia_empresa) }}</textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="introducao">Introdução Quem somos</label>
                <textarea type="text" class="form-control" id="historia_empresa" name="introducao"
                >{{ old('introducao', $configuracao->introducao) }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="missao">Missão da empresa</label>
                <textarea type="text" class="form-control" id="missao" name="missao"
                >{{ old('missao', $configuracao->missao) }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="visao">Visão da empresa</label>
                <textarea type="text" class="form-control" id="visao" name="visao"
                >{{ old('visao', $configuracao->visao) }}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="valores">Valores da empresa</label>
                <textarea type="text" class="form-control" id="valores" name="valores"
                >{{ old('valores', $configuracao->valores) }}</textarea>
            </div>
        </div>


    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'historia_empresa' );
    CKEDITOR.replace( 'introducao' );
    CKEDITOR.replace( 'missao' );
    CKEDITOR.replace( 'visao' );
    CKEDITOR.replace( 'valores' );
</script>