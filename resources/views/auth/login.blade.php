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
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="password" name="password">

                                @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror

                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="seepassword()">
                                <label class="form-check-label" for="exampleCheck1">Voir le mot de passe</label>
                            </div>
                            @csrf
                            <button class="btn btn-primary " type="submit"> Se connecter </button>
                            <a class="reset_pass" href="{{route('forget-password')}}">Lost your password?</a>
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
    <script>
        function seepassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

    </script>
@endsection

