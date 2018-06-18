@extends("templates.default.layout.container")
@section("title","| Sobre")
@section("meta")
  <meta property="og:url"           content="" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="" />
  <meta property="og:description"   content=" " />
  <meta property="og:image"         content="" />
@stop
@section("container")
<section class="container">
    <div class="content-page about">
            <article class="row">
               <div class="col-6">
                    <header class="about-title">
                        <h2>Sobre min </h2>
                        <h3> Olá meu nome é <strong>João Vitor Pereira</strong></h3>
                        <p>
                                Desenvolvedor web apaixonado pelo o que faz, busco sempre estar me atualizando em relação a novas tecnologias na área. Hoje trabalho tanto com Desenvolvimento Web back end e front end.
                        </p><br><br>
                        <a class="btn btn-default" href="{{ route("contact")}}"><i class="icon-envelope" ></i> Contact</a>
                        <a class="btn btn-default"><i class="icon-social-github"></i></a>
                    </header>
               </div>
               <div class="col-6">
                   <div class="row">
                        <h2>Skills</h2>
                        <div class="skills">
                            <span class="skill-title">Html & CSS</span>
                            <p class="skill-bar" style="width:90%;"></p>
                        </div>
                        <div class="skills">
                            <span class="skill-title">PHP</span>
                            <p class="skill-bar" style="width:90%;color:#fff;"></p>
                        </div>
                        
                   </div>
                   <div class="row">
                        <h2>Frameworks / Libs</h2>
                        <div class="skills">
                            <span class="skill-title">Laravel</span>
                            <p class="skill-bar" style="width:90%;"></p>
                        </div>
                        <div class="skills">
                            <span class="skill-title">CodeIgniter</span>
                            <p class="skill-bar" style="width:70%;color:#fff;"></p>
                        </div>
                        <div class="skills">
                            <span class="skill-title">JQuery</span>
                            <p class="skill-bar" style="width:70%;"></p>
                        </div>
                        
                   </div>
               </div>
            
            </article>


    </div>
</section>



@stop

@push("scripts")
<link rel="stylesheet" href="{{ asset("assets/css/simple-grid.min.css") }}">
<style>
    .about h2{
        margin: 20px 20px 20px 0px;
    }
    .about h3{
        font-size:1.3em;
        
        margin: 20px 20px 20px 0px;
    }
    h2 small{
        font-size:14px;
    }

    .skills{
        position: relative;
        display: inline-block;
        margin: 25px 0 10px;
        background: rgba(0, 0, 0, .15);
        height: 4px;
        width: 100%;
       
    }
    .skill-bar{
        position: relative;
        height: 4px;
       
        font-size:8px;
        color:#fff !important;
        background: #545f75;
        text-align: center;
    }
    .skill-title{
        position: absolute;
        top:-25px;
    }
    .btn i{
        color:#fff;
    }
</style>
@endpush