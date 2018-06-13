@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard <small>Welcome</small> </h1>
@stop

@section('content')
    
<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Exibindo todos os post do servidor</h3>
           
        </div>
        <div class="col-md-12">
            <div class="box-alert">

            </div>
        </div>
        <div class="box-body">
            <div class="col-md-12">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%" scope="col">id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">E-mail</th>
                                    <th width="10%" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $users)
                                <tr>
                                    <th>{{ $users->id }}</th>
                                    <th>{{ $users->name }}</th>
                                    <th>{{ $users->email }}</th>
                                    <th>
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-gears"></i>
                                                <span class="fa fa-caret-down"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href=""><i class="fa fa-edit"></i> Editar</a></li>
                                                <li><a class="delete" href=""><i class="fa fa-trash"></i> Deletar</a></li>
                                                
                                            </ul>
                                        </div>

                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

            </div>
        </div>
    </div>
</div>

@stop