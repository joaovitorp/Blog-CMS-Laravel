@extends("templates.default.layout.container")
@section("container")
<section class="container">
    <div class="content-page ">
            <article>
                <header class="row">
                    <div class="col-12">
                            <h2>Contato</h2>
                            <small>Entre em contato por telefone ou e-mail e marque uma reunião. Estou ansioso para levar para sua empresa minhas melhores ideias e soluções, a fim de possibilitar um crescimento amplo e sustentável em suas ações de marketing e internet..</small>
                     
                    </div>
               </header>

                <div class="row">
                    <div class="col-6">
                       <div class="alert">
                           
                       </div>   
                       <div class="preloader">
                           <img src="{{ url("assets/img/ajax-loader.gif")}}" alt="" srcset="">
                       </div>  
                       <section>
                            <form action="{{ route("contact.send")}}" id="form-contact" class="form" method="POST">
                                    <div class="col-12 form-item">
                                        <input type="text" name="name" placeholder="Nome:">
                                    </div>
                                    {{ csrf_field() }}
                                    <div class="col-12 form-item">
                                        <input type="email" name="email" placeholder="E-mail:">
                                    </div>
                                    <div class="col-12 form-item">
                                        <input type="text" name="tel" placeholder="Telefone:">
                                    </div>
                                    <div class="col-12 form-item">
                                        <textarea name="mensagem"  rows="15" cols="50" placeholder="Digite uma mensagem..."></textarea>
                                    </div>
                                    <div class="col-12 form-item">
                                        <button type="submit" class="btn btn-default btn-block">Enviar</button>
                                    </div>
                                    
                            </form>
                       </section>
                    </div>
                    <div class="col-6">
                       <section>
                           <div class="col-12">
                               <h4>Telefone & Whatsapp</h4>
                               <p><a href="tel:+19993270225">(19) 99327-0225</a></p>
                           </div>
                           <div class="col-12">
                               <h4>Email</h4>
                               <a href="mailto:jvpereirafaustino@gmail.com">jvpereirafaustino@gmail.com</a>
                           </div>

                       </section>
                    </div>
                </div>
            </article>
    </div>
</section>
@stop

@push("scripts")
<script>
    $('#form-contact').submit(function () {
    var form = $(this);
    var data = $(this).serialize();
    $.ajax({
        data: data,
        type: 'POST',
        dataType: 'json',
        beforeSend: function () {
            $(".preloader").fadeIn(1000);
            $('#form-contact').slideUp();
            $('.alert').fadeOut(100);
        },
        success: function (resposta) {
            var msg = resposta.errors;
            
            if(resposta.success){
                $(".preloader").fadeOut(300);
                $('.alert').fadeIn(300);
                $('.alert').html('<div class="success">Mensagem enviada, em breve retornarei o contato.</div>');

            }else{
                var valor = '';
                msg.email == null ?         '' :      valor +='<p>'+ msg.email +'</p>' ;
                msg.name == null ?          '' :      valor +='<p>'+ msg.name +'</p>' ;
                msg.mensagem == null ?      '' :      valor +=' <p>'+ msg.mensagem +'</p>' ;
               
              
                $('.alert').fadeIn(300);

                $('.alert').html('<div class="warning">'+valor+'</div>');
                $('#form-contact').slideDown('slow');
                $(".preloader").fadeOut(300);
            }
        },
       
    });

    return false;
});
</script>
<link rel="stylesheet" href="{{ asset("assets/css/simple-grid.css") }}">
@endpush