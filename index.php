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
  <script src="jquery/jquery.js"></script>
  <script src="js/materializa.min.js"></script>
   <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
  <body>
    
  <!-- Button to Open the Modal -->


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">🐍🐍🐍Snake🐍🐍🐍</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        

      <canvas id="c" width="500" height="500"></canvas>

<script type="text/javascript">
  c=document.getElementById('c').getContext("2d");
  l=1;
  a=[{x:0,y:0}];
  xv=yv=0;
  window.onkeydown = function(e){
    e=e.keyCode;
    if(e==37){xv=-1;yv=0}
    if(e==38){xv=0;yv=-1}
    if(e==39){xv=1;yv=0}
    if(e==40){xv=0;yv=1}
  }
  function g(){
    f={
      x: Math.floor(Math.random()*15),
      y: Math.floor(Math.random()*15)
    }
  }g();
  function d(){
    x=a[0].x+xv;
    y=a[0].y+yv;
    if(x>14){x=0}
    if(x<0){x=14}
    if(y>14){y=0}
    if(y<0){y=14}
    a.unshift({x:x,y:y});
    for (var i = 1; i < l; i++) {
      if(x==a[i].x && y==a[i].y){l=1}
    }
    if(x==f.x && y==f.y){
      l++;
      g();
    }
    c.clearRect(0,0,500,500);
    c.strokeRect(0,0,15*30,15*30);
    for (var i = 0; i < l; i++) {
      c.fillRect(a[i].x*30,a[i].y*30,25,25);
    }
    c.fillRect(f.x*30,f.y*30,25,25);
  }
  setInterval(d,100);
</script>
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

</div>
      

    </div>
  </div>
</div>
  

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

          <input class="margen btn btn btn-success" type='submit' value='Iniciar Sesion'>
        
          <a href="createUser.php" class="margin2 bton  btn btn btn-success" type='submit'>Registrar</a>

       
          </div>
          <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal">🐍</button>
         
      </div>
      </div>
      </div>

    </form>
    <div>
    
    </div>
         
  </body>
</html>