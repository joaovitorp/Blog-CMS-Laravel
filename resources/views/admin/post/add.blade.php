@extends('adminlte::page')

@section('title', 'Adicionar Post')

@section('content_header')
    <h1>Adicionar um post</h1>
@stop

@section('content')
<div class="col-md-8">
    <div class="box box-primary">
       
        <div class="box-header with-border">
            <h3 class="box-title">{!! isset($posts) ? "Editando o post : <strong> $posts->title </strong>" : "Nova postagem" !!}</h3>
        </div>
       <div class="col-md-12">
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
            </div>
       </div>
        <!-- /.box-header -->
        <!-- form start -->
@if( isset($posts) )
<form role="form" action="{{ route("admin.post.update", $posts->id) }}" method="post" enctype="multipart/form-data">
@else
<form role="form" action="{{ route("admin.post.post") }}" method="post" enctype="multipart/form-data">
@endif
             <!-- /.box-body -->
             {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label>Titulo</label>
                    <input type="text" name="title" class="form-control" placeholder="Titulo" value="{!! $posts->title or old("title") !!}">
                </div>
                
                <div class="form-group">
                

              </div>
                <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                    <label>Conteudo</label>
                    <textarea id="some-textarea" name="content" class="form-control" placeholder="" rows="20" value="">{!! $posts->content or old("content") !!}</textarea>
                </div>
                
                <div class="box-footer">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="submit" class="btn btn-success">Adicionar</button>
                </div>
            </div>
        
    </div>
</div>

<div class="col-md-4">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Thumb</h3>
        </div>
        <div class="box-body">       
               @if(isset($posts))  
                    <img width="500px" class="img-responsive text" src="{{ asset("uploads/".$posts->thumb) }}" alt="" >
                    <hr>
               @endif
               
               <input type="file" name="thumb" id="">        
        </div>
    </div>
   
</div>
<div class="col-md-4">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Categorias</h3>
        </div>
        <div class="box-body">         
                <ul class="cat-item">
                    @foreach($cat as $cats)
                            
                             <li>
                             
                             <input type="checkbox" name="category[]" value="{{ $cats->name }}"
                                @php
                                  if(isset($checked)){
                                        foreach($checked as $check){
                                            echo $cats->name == $check ?  "checked" : "";
                                        }
                                  }

                                @endphp
                              > {{ $cats->name }}
                            
                            </li>
                           
                        
                    @endforeach
                </ul>              
        </div>
    </div>
   
</div>

 </form>
<div class="col-md-4">
    <div class="box ">
        <div class="box-header with-border">
            <h3 class="box-title">Nova Categoria</h3>
        </div>
        <div class="box-body">   
                
               <form action="" method="post" id="form-cat">
                <div class="form-group">
                        <label for="">Nova categoria</label>
                        <input class="form-control" type="text" name="cat" id="" placeholder="Nova categoria">
                        {{ csrf_field() }}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success category"><i class="fa fa-plus"></i> Adicionar</button>
                </div> 
               </form>       
        </div>
    </div>
</div>

@stop
@push("css")
<link rel="stylesheet" href="{{ asset("vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">
<link rel="stylesheet" href="{{ asset("vendor/adminlte/plugins/iCheck/square/blue.css")}}">
<link rel="stylesheet" href="{{ asset("vendor/adminlte/plugins/iCheck/all.css")}}">
@endpush
@push("js")
 <script src="{{ asset("vendor/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
 <script src="{{ asset("vendor/adminlte/plugins/iCheck/icheck.min.js")}}"></script>
 <script type="text/javascript">
    $('#some-textarea').wysihtml5();

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue',
      increaseArea: '20%' // optional
    })

    $('.minimal').on('click', function(event) {
        $(this ).prop( "checked", false );
        
    });

    
    
    $('#form-cat').submit(function (evento) {
    event.preventDefault();
    var form = $(this);
    var data = $(this).serialize();



    $.ajax({
        url: '{{route("admin.cat.new")}}',
        data: data,
        type: 'POST',
        dataType: 'json',
        beforeSend: function () {
            
        },
        success: function (resposta) {
            if(resposta.success){
                $(".cat-item").append('<li><input type="checkbox" name="category[]" value="'+resposta.name +'" checked> '+resposta.name+'</li>');
                
            }
        }
    });

    return false;
});
 </script>
@endpush

