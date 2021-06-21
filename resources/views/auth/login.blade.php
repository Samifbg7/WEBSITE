@extends('layouts.index')

@section('title' ,'Connexion')

@section('content')
<form class="row g-3" action="{{route('login.submit')}}">
    <div class="col-auto">
        <label for="Email">Email</label>
        <input type="text"  class="form-control-plaintext" id="email" name="email" placeholder="email">
    </div>
    <div class="col-auto">
        <label for="inputPassword2" >Password</label>
        <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name="password">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Se connecter</button>
    </div>
</form>
@endsection
