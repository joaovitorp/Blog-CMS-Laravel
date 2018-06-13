@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Adicionar <small>User</small></h1>
@stop

@section('content')
<div class="box box-primary col-md-12">

        <div class="box-body">
            <form action="" method="post">
                <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nome:</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Nome:">
                        </div>
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Nome:">
                        </div>
                        <div class="form-group">
                            <label for="">Password:</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Nome:">
                        </div>
                        <div class="form-group">
                            <label for="">Re-Password:</label>
                            <input type="text" name="" id="" class="form-control" placeholder="Nome:">
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Avatar</label>
                        <input type="file" name="" id="">
                    </div>
                </div>
            </form>
        </div>

</div>
        
        
@stop