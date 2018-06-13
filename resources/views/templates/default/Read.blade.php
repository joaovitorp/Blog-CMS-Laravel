@extends("templates.default.layout.container")
@section("title","| $post->title")
@section("meta")
  <meta property="og:url"           content="{{ route("view",[$post->id,kebab_case($post->title)])}}" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="{{ $post->title }}" />
  <meta property="og:description"   content=" {{  strip_tags(str_limit($post->content,200)) }} " />
  <meta property="og:image"         content="{{ url("uploads/$post->thumb")}}" />
@stop
@section("container")
<section class="container">
    <div class="content-page ">
            <article>
                <header class="row">
                    <div class="col-12">
                            <h2>{{ $post->title }}</h2>
                            <ul class="post-info">
                                <li><i class="icon-user"></i>{{ $post->autor }}</li>
                                <li><i class="icon-tag"></i>  {{ $post->category }}   </li>
                                <li><i class="icon-calendar"></i> {{ date("d/m/Y \á\s H:i",strtotime($post->created_at))}}    </li>
                            </ul>
                    </div>
                   
               </header>
                <div class="row">
                    <div class="col-12">
                        <p>
                            {!! $post->content !!}     
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="network-share">
                            <strong>Compartilhamento</strong>
                            <nav>
                                <ul class="redes">
                                    <li><a href=""><i class="icon-social-facebook"></i></a></li>
                                    <li><a href=""><i class="icon-social-twitter"></i></a></li>
                                    <li><a href=""><i class="icon-social-linkedin"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </article>


    </div>
</section>

<section class="container">
    <div class="content-page">
            <article>
                    <div class="row">
                        <div class="col-12">
                            <header>
                                <h3>Comentários</h3>
                            </header>
                        </div>
                        <div class="col-12">
                        <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://joaovitorpblog.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                        </div>
                    </div>
            </article>
    </div>
</section>
@stop

@push("scripts")
<link rel="stylesheet" href="{{ asset("assets/css/simple-grid.min.css") }}">
@endpush