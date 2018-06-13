@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Configuração do Website</h1>
   
@stop

@section('content')
<div class="box box-default color-palette-box">
        <div class="box-header with-border">
          <h3 class="box-title"> Settings</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-md-8">
               <form action="" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Titulo</label>
                            <input type="text" name="title" class="form-control" placeholder="Titulo" value="{!! $posts->title or old("title") !!}">
                        </div>
                        
                        <div class="form-group">
                        

                    </div>
                        <div class="form-group">
                            <label>Conteudo</label>
                            <textarea id="some-textarea" name="content" class="form-control" placeholder="" rows="20" value="">{!! $posts->content or old("content") !!}</textarea>
                        </div>
                        
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
               </form>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
@stop