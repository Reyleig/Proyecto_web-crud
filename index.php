<html>    
<head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/style.css" />
      <link type="text/css" rel="stylesheet" href="css/style2.css" />
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>

    
  <body>
  
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo center">Bienvenido</a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
       
      </ul>
    </div>
  </nav>
    <form method='POST' border='1'  class='borde'action='validar.php' >
 
  <div class="margen ">
      
        
        <div class="input-field col s6">
        <i class="material-icons prefix">account_circle</i>
          <input name="email" id="last_name" type="text" class="validate">
          <label for="last_name">Email</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">lock</i>
          <input name="password" id="last_name" type="password" class="validate">
          <label for="last_name">Password</label>
          <input class="margen btn" type='submit' value='Iniciar Sesion'>
        
          <a href="createUser.php" class="margin2 bton  btn" type='submit'>Registrar</a>
       
          </div>
         
      </div>
      </div>
      </div>

    </form>
    <div>
    
    </div>
         
  </body>
</html>