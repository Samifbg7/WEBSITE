@extends('layouts.dashboard')
@section('title','Bec | dashboard')
@section('page-header')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profil de {{$user->fname}} {{$user->lname}}</h1>
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
                    <div class="card-body">
                       <div class="row">
                           <div class="col-md-6">
                               <p>prenom : {{$user->fname}}</p>
                               <p class="mt-3">nom : {{$user->lname}}</p>
                               <p class="mt-3"> email : {{$user->email}}</p>
                           </div>
                           <div class="col-md-6">
                               <p> date de création du compte : {{$user->created_at}}</p>
                               @if($user->created_at == $user->updated_at)
                                   <p>le compte a jamais ete mise a jour</p>
                               @else
                                <p> mise a jour du compte : {{$user->updated_at}} </p>
                               @endif
                           </div>
                       </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

@endsection

