@extends('layouts.dashboard')
@section('title','Bec | dashboard')
@section('page-header')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Cree un Utilisateur</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection()

@section('page-content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{route('dashboard.user.store')}} " method="Post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fname">Nom</label>
                                <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" placeholder="Entrer le nom " name="fname" value="{{old('fname')}}">
                                @error('fname')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lname">Prenom</label>
                                <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" placeholder="Entrer le prenom"name="lname" value="{{old('lname')}}">
                                @error('lname')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Entrer l'email"name="email" value="{{old('email')}}">
                                @error('email')
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
    <!-- /.container-fluid -->

@endsection
