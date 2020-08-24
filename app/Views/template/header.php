<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <title>Starter Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="assets/css/mystyle.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">perfil</a></li>
  <li><a href="#!">compras</a></li>
  <li class="divider"></li>
  <li><?= anchor('logout','Salir');?></li>
</ul>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav container"><?= anchor('','Home',['id'=>'logo-container','class'=>'brand-logo']);?>
      <ul class="right hide-on-med-and-down">        
        <li><?= anchor('newItem','nuevo');?></li>
        <li><?= anchor('items','Lista');?></li>
        <?php if(session()->has('usuario')):  ?>
          <li><?= anchor('#!',session()->usuario,['id'=>'algo','class'=>'dropdown-trigger','data-target'=>'dropdown1']);?></li>
        <?php else: ?>
          <li><?= anchor('registro','Registro');?></li>
          <li><?= anchor('login','Login');?></li>
        <?php endif ?>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>  

  