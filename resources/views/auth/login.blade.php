@extends('layouts.index')

@section('title' ,'Connexion')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('login.authenticate')}} " method="Post">
                        <div class="card-body">
                            @include('flash.messageb5')

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Entrer l'email"name="email" value="{{old('email')}}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputPassword2" >Password</label>
                                <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name="password" value="{{old('password')}}">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            @csrf
                            <button class="btn btn-primary " type="submit"> Enregistrer </button>
                        </div>
                        <!-- /.card-body -->
                    </form>

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@endsection
