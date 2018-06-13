<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{ $title or "Joao Vitor P. - Desenvolvedor Web"}} @yield("title")</title>
    <link rel="stylesheet" href="{{ asset("assets/css/theme.min.css") }}">
    <link rel="shortcut icon" href="{{ asset("assets/img/images.png") }}" type="image/x-icon">
    
	@yield("meta")
</head>
<body>


<div class="navbar">
        
            <div class="perfil-img">
                <figure>
                    <img src="{{ asset("assets/img/perfil.jpg")}}" alt="" class="avatar">
                </figure>
                
                        <h1>João Vitor P.</h1>
                        <h3>Desenvolvedor Web </h3>
               
                <div class="sobre">
                    <a href="#" class="btn btn-default" title="">Sobre</a>
                </div>
             </div>
             <div class="mobile-btn">
                 <div></div>
                 <div></div>
                 <div></div>
             </div>
        
        <nav class="nav"> 
                <ul class="nav-item">
                    <li ><a  href="{{ route("home")}}" class="active" title="">Home</a></li>
                    <li><a href="" title="">Blog</a></li>
                    <li><a href="{{ route("contact")}}" title="">Contato</a></li>
                </ul>
        </nav>
        <nav class="redes-socias">
            <ul>
                <li><a href="http://"><i class="icon-social-facebook"></i></a></li>
                <li><a href="http://"><i class="icon-social-twitter"></i></a></li>
                <li><a href="http://"><i class="icon-social-linkedin"></i></a></li>
            </ul>
        </nav>
<!-- footer -->
        <footer>
            <div class="footer-container">
            </div>
        </footer>
</div>

@yield("container")

<script src="{{ asset("assets/js/jquery.js")}}"></script>
<script src="{{ asset("assets/js/custom.js")}}"></script>
<link rel="stylesheet" href="{{ asset("assets/css/simple-line-icons.css") }}">
@stack('scripts')
</body>
</html>