<?php



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
      <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <script src="js/jquery-1.12.3.min.js" charset="utf-8"></script>
    <script src="bootstrap/js/bootstrap.min.js" charset="utf-8"></script>
    <style>
    input[type="submit"], input[type="button"], input[type="reset"] {
    display: inline-block;
    background: #2394D5;
    padding: 5px 15px;
    color: #fff;
    border: 0 none;
    font-size: 18px;
    cursor: pointer;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
}
.error{
    background-color: #E74F4F;
    position: absolute;
    top: 0;
    padding: 10px 0 ;
    border-radius:  0 0 5px 5px;
    color: #fff;
    width: 100%;
    text-align: center;
    display: none;
}
</style>
  </head>
  <body>
    <div id="particles-js"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
        <div class="error">
        	<span>Datos de Ingreso no validos</span>
        </div>
          <form action="" id="formlg">
            <br><br>

    <div class="horizontal divPadre">
               <div class="vertical">
      <img class="animated slideInDown mediana" src="images/user.png">
    </div>
  </div>
            <br><br>
            <div class="form-content">
            <div class="form-group">
              
              <input type="text" name="user" placeholder="Usuario" id="user" class="form-control">
            </div>
            <div class="form-group">
              
              <input type="password" name="pass" placeholder="******" id="pass" class="form-control">
            </div>
            <br><br>
            <div class="form-group">
              <input type="submit" class="botonlg"  value="Iniciar Sesión" >
            </div>
            <br>
            <span id="result"></span>
          </div>
          </form>

        </div>

      </div>
    </div>

    <script src="js/particles.js"></script>
<script src="js/app.js"></script>
  </body>
</html>

<script>
jQuery(document).on('submit','#formlg',function(event){
            event.preventDefault();
            jQuery.ajax({
                url:'logueo2.php',
                type:'POST',
                dataType:'json',
                data:$(this).serialize(),
                beforeSend:function(){
                  $('.botonlg').val('Validando....');
                }
              })
              .done(function(respuesta){
                console.log(respuesta);
                if (!respuesta.error) {
                  if (respuesta.tipo=='Admin') {
                    location='header.php';
                  }else if (respuesta.tipo=='Usuario') {
                    location='paciente.php';
                  }
                }else {
                  $('.error').slideDown('slow');
                  setTimeout(function(){
                  $('.error').slideUp('slow');
                },3000);
                $('.botonlg').val('Iniciar Secion');
                }
              })
              .fail(function(resp){
                console.log(resp.responseText);
              })
              .always(function(){
                console.log("complete");
            });
      });
</script>
