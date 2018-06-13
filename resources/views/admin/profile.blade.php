@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Profile <small>seu perfil</small></h1>
@stop

@section('content')
<div class="box box-primary col-md-12">

        <div class="box-body">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>Aviso!</h4>
                    {{ session('status') }}
                </div>
                
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="{{ route("admin.profile.update") }}" method="post" enctype="multipart/form-data">

                <div class="col-md-4">
                        {{ csrf_field() }}
                        <div class="form-group ">
                            <label for="">Nome:</label>
                        <input type="text" name="name" id="" class="form-control " placeholder="Nome:" value="{{ auth()->user()->name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="text" name="email" id="" class="form-control" placeholder="Nome:" value="{{ auth()->user()->email}}">
                        </div>
                       
                        <div class="form-group">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-success">Atualizar perfil</button>
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <img src="{{ url("uploads/".auth()->user()->avatar)}}" class="img-circle" alt="" width="100px">
                    </div>
                    <div class="form-group">
                            <label for="">Avatar</label>
                            
                            <br>
                            <input type="file" name="avatar" id="">
                    </div>
                </div>
            </form>
        </div>

</div>
@stop