@csrf
<div class="form-group">
    <input type="text" value="{{ $client->name ?? old('name') }}" name="name" class="form-control" placeholder="Nome">
</div>
<div class="form-group">
    <input type="text" value="{{ $client->email ?? old('email') }}" name="email" class="form-control" placeholder="Email">
</div>
<div class="form-group">
    <input type="text" value="{{ $client->phone ?? old('phone') }}" name="phone" class="form-control" placeholder="Telefone">
</div>
<div class="form-group">
    <input type="text" value="{{ $client->address ?? old('address') }}" name="address" class="form-control" placeholder="Endereço">
</div>
<div class="form-group">
    <textarea name="obs" class="form-control" cols="30" rows="10" placeholder="Obs.">{{ $client->obs ?? old('obs') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
