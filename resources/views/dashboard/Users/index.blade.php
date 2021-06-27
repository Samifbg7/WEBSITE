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
    <div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Confirmer la suppression
                </div>
                <div class="modal-body">
                  Etes vous sur de vouloir supprimer l'utilisateur <span id="lname"></span> <span id="fname"></span> ?
                    <!-- We display the details entered by the user here -->

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <form  id="formfield" method="post" action="{{route('dashboard.user.delete')}}">
                        <input id="idf" name="id" type="hidden" >
                        <input name="idd" type="hidden" value="{{auth()->user()->id}}">
                        @csrf
                        <button type="submit" id="submit" class="btn btn-success success">Confirmer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                                    <td>{{$u->fname}}
                                    </td>
                                    <td><a href="{{route('dashboard.user.edit',['id'=>$u->id])}}"
                                           class="btn btn-primary">Editer</a></td>
                                    <td>
                                        <form onsubmit="openModal()" id="formfield">
                                            <input id="id" name="id" type="hidden" value="{{$u->id}}">
                                            <input  id="lastname" type="hidden" value="{{$u->lname}}">
                                            <input  id="firstname" type="hidden" value="{{$u->fname}}">
                                            <input type="button" name="btn" value="Supprimer" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-danger" />
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
@section('sript')
    $('#submitBtn').click(function() {
    /* when the button in the form, display the entered values in the modal */
    $('#lnamef').val($('#lastname').val());
    $('#fnamef').val($('#firstname').val());
    $('#idf').val($('#id').val());
    $('#lname').text($('#lastname').val());
    $('#fname').text($('#firstname').val());
    });

    $('#submit').click(function(){
    /* when the submit button in the modal is clicked, submit the form */
    $('#formfield').submit();
    });
@endsection


