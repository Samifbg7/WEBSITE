@extends('layouts.dashboard')
@section('title','Bec | dashboard')
@section('page-header')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{$title}}</h1>
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
                    <form action="{{route('dashboard.user.update')}}" method="Post">
                        <div class="card-body">
                            <input type="text" hidden class="form-control" id="id" name="id" value="{{ $user->id }}">

                            <div class="form-group">
                                <label for="fname">Prenom</label>
                                <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" placeholder="Entrer le nom " name="fname" value="{{$user->fname}} ">
                                @error('fname')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="lname">Nom</label>
                                <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" placeholder="Entrer le prenom"name="lname" value="{{$user->lname}} ">
                                @error('lname')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Entrer l'email"name="email" value="{{$user->email}} ">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            @csrf

                            <button class="btn btn-primary " type="submit">Mettre a jour </button>
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
