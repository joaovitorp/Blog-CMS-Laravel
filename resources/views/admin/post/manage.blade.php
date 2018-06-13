@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content_header')
    <h1>Manager</h1>
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
                    
                 @if( count($post) > 0 )
                        

                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th width="5%" scope="col">id</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">content</th>
                                    <th width="10%" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($post as $posts)
                                <tr>
                                    <th scope="row">{{ $posts->id }}</th>
                                    <td>{!! str_limit($posts->title,50,"...") !!}</td>
                                    <td>{!! str_limit($posts->content,50,"...") !!}</td>
                                    <td>
                                        <div class="input-group-btn">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-gears"></i>
                                                <span class="fa fa-caret-down"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route("admin.post.edit", $posts->id) }}"><i class="fa fa-edit"></i> Editar</a></li>
                                                <li><a class="delete" href="{{ route("admin.post.del",$posts->id)}}"><i class="fa fa-trash"></i> Deletar</a></li>
                                                
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach    
                                </tbody>
                            </table>
                           
                      
                        @else
                                
                                <h3>Nenhum resultado</h3>
                             
                         @endif
                    
                    {{ $post->links() }}
                </div>
            </div>
        </div>
    </div>
@stop

@push("js")
<script>


$(".delete ").on('click', function(){
    var href = this.href;
    var tr = $(this).closest('tr');
    if(confirm("Deseja realmente excluir a postagem?")){
    tr.fadeOut(400, function(){
        tr.remove();
    });

    //$(this).remove();
    $.ajax({
        url: href,
        type: 'GET',
        dataType: 'json',
        beforeSend: function () {
            $(".delete").prop("disabled", true);
        },
        success: function (resposta) {
            if(resposta.success){
                $(".box-alert").html("<div class='alert alert-success'>  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>"+resposta.success+"</div>");
                
            }
        }
    });
    }
    return false;
});
</script>
@endpush