@extends('layouts.dashboard')
@section('title','Bec | dashboard')
@section('page-header')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gestion Utilisateur</h1>
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
                    <div class="card-header">

                        <a class="btn btn-primary" href="{{route('dashboard.user.create')}}"> Ajouter un utilisateur</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>

                                <th>Editer</th>
                                <th>Supprimer</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $u)

                                <td>{{$u->lname}}</td>
                                <td>{{$u->fname}}</td>
                                <td><a href="{{route('dashboard.user.edit',['id'=>$u->id])}}"
                                       class="btn btn-primary">Editer</a></td>
                                <td>
                                    <form action="{{ route('dashboard.user.delete') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{$u->id}}">
                                        <input type="hidden" name="idd" value="{{ auth()->user()->id}}">
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Ete vous sur de vouloir supprimmer cette utilisateur')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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



