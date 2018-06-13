@extends("templates.default.layout.container")
@section("container")
<section class="container">
    <div class="content">
               

            
            @foreach($post as $posts) 
            <article class="post-item">
                    <h3 class="float-left"><a href="{{ route("view",[$posts->id,kebab_case($posts->title)])}}"> {{ $posts->title}}</a></h3>
                    <div class="post-thumb float-left">
                            <a href="{{ route("view",[$posts->id,kebab_case($posts->title)])}}">
                                <img src="{{ url("uploads/$posts->thumb")}}" alt="{{ $posts->title }}" class="img-reponsive">
                            </a>   
                    </div>
                    <div class="post-content float-left">
                        <p>
                                {{  strip_tags(str_limit($posts->content,200)) }} 
                               
                        </p>  
                    </div>
                    <div class="post-footer float-left">
                            <i class="icon-user"></i><span> João Vitor P.</span> 
                            <i class="icon-calendar"></i> <span> {{ date("d/m/Y",strtotime($posts->created_at))}}</span> 
                            <i class="icon-eye"></i> <span>Não visualizado</span>  
                            <i class="icon-tag"></i> <span>{{ $posts->category}}</span>  
                    </div>    
            </article>
            @endforeach
    </div>
</section>
@endsection