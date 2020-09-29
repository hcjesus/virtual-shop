<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <title>Starter Template - Materialize</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="<?= base_url('assets/css/materialize.css') ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?= base_url('assets/css/style.css')?> " type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?= base_url('assets/css/mystyle.css')?> " type="text/css" rel="stylesheet" media="screen,projection"/>
  <script src="https://kit.fontawesome.com/f8e7fbd458.js" crossorigin="anonymous"></script>
  <script src="<?= base_url('assets/js/jquery-3.4.1.min.js')?> "></script>
  <script src="<?= base_url('assets/js/materialize.js')?> "></script>
  <script src="<?= base_url('assets/js/init.js')?> "></script>
  <script src="<?= base_url('assets/js/myjs.js')?> "></script>
</head>
<body>
<ul id="dropdown1" class="dropdown-content">
  <li><a href="<?= base_url(route_to('profile'))?>">Perfil</a></li>
  <li><a href="<?= base_url(route_to('cartPage'))?>">Carrito</a></li>
  <li class="divider"></li>
  <li><?= anchor('logout','Salir');?></li>
</ul>
<ul id="dropdown2" class="dropdown-content">
  <li><?= anchor('newBrand','Marca');?></li>
  <li><?= anchor('newCategory','Categoria');?></li>
  <li><?= anchor('newItem','Producto');?></li>
  <li class="divider" tabindex="-1"></li>
  <li><?= anchor('itemsCarrousel','Carrousel');?></li>
</ul>
<ul id="dropdown3" class="dropdown-content">
  <li><?= anchor('showItemCategory/1','Celulares');?></li>
  <li><?= anchor('showItemCategory/3','Laptops');?></li>
  <li><?= anchor('showItemCategory/2','Televisores');?></li>
</ul>
<ul id="mdropdown1" class="dropdown-content">
  <li><a href="#!">Perfil</a></li>
  <li><a href="<?= base_url(route_to('cartPage'))?>">Carrito</a></li>
  <li class="divider"></li>
  <li><?= anchor('logout','Salir');?></li>
</ul>
<ul id="mdropdown2" class="dropdown-content">
  <li><?= anchor('newBrand','Marca');?></li>
  <li><?= anchor('newCategory','Categoria');?></li>
  <li><?= anchor('newItem','Producto');?></li>
  <li class="divider" tabindex="-1"></li>
  <li><?= anchor('itemsCarrousel','Carrousel');?></li>
</ul>
<ul id="mdropdown3" class="dropdown-content">
  <li><?= anchor('showItemCategory/1','Celulares');?></li>
  <li><?= anchor('showItemCategory/3','Laptops');?></li>
  <li><?= anchor('showItemCategory/2','Televisores');?></li>
</ul>
  <nav class="" role="navigation">
    <div class="nav "><?= anchor('','<i class="large material-icons home">home</i>',['id'=>'logo-container','class'=>'brand-logo']);?>
      <ul class="right hide-on-med-and-down">
        <?php $session = \Config\Services::session(); ?>
        <?php if(session()->has('usuario')):  ?>
          <?php if($session->usuario['rol'] == '0'): ?>
            <li><?= anchor('#!','Nuevo',['id'=>'algo','class'=>'dropdown-trigger','data-target'=>'dropdown2']);?></li>
            <li><?= anchor('items','Lista');?></li>
            <li>
              <a href="#!" id="algo" class="dropdown-trigger" data-target="dropdown1">                
                  <div class="usr-name">
                    <span><?= $session->usuario['usuario'] ?></span>
                  </div>
              </a>
            </li>
          <?php else : ?>
            <li><?= anchor('#!','Categorias',['id'=>'algo','class'=>'dropdown-trigger','data-target'=>'dropdown3']);?></li>     
            <li>
              <?= form_open('/buscarItem',['id'=>'buscarItem','class'=>'buscarItem']);?>
                <div class="row">
                  <div class="col buscador">
                    <?= form_input(['id'=>'clave','name'=>'clave','class'=>'inp-buscar browser-default']);?>
                  </div>
                  <div class="col buscador">
                    <button type="submit" class="enviarRegistro btn-buscar" disabled><i class="fas fa-search fa-lg"></i></button>  
                  </div>
                </div>
              <?= form_close();?> 
            </li>

            <li>
              <a href="<?= base_url(route_to('cartPage'))?>" >
                <i class="cart-icon large material-icons">shopping_cart</i>
                <?php if(session()->has('gqty')):  ?>
                  <span for="" class="algo conteo" id="lblCartCount" ><?= session()->gqty?></span>
                <?php else : ?>
                  <span for="" class="algo conteo" id="lblCartCount" >0</span>  
                <?php endif ?>  
              </a>
            </li>
            <li><?= anchor('#!','session()->usuario[]',['id'=>'algo','class'=>'dropdown-trigger','data-target'=>'dropdown1']);?></li>
          <?php endif ?> 
        <?php else : ?>
          <li><?= anchor('registro','Registro');?></li>
          <li><?= anchor('login','Login');?></li>
          <li><?= anchor('#!','Categorias',['id'=>'algo','class'=>'dropdown-trigger','data-target'=>'dropdown3']);?></li>     
          <li>
            <?= form_open('/buscarItem',['id'=>'buscarItem','class'=>'buscarItem']);?>
              <div class="row">
                <div class="col buscador">
                  <?= form_input(['id'=>'clave','name'=>'clave','class'=>'inp-buscar browser-default']);?>
                </div>
                <div class="col buscador ">
                  <button type="submit" class="enviarRegistro btn-buscar" disabled><i class="fas fa-search fa-lg"></i></button>  
                </div>
              </div>
            <?= form_close();?> 
          </li>

          <li>
            <a href="<?= base_url(route_to('cartPage'))?>" >
              <i class="cart-icon large material-icons">shopping_cart</i>
              <?php if(session()->has('gqty')):  ?>
                <span for="" class="algo conteo" id="lblCartCount" ><?= session()->gqty?></span>
              <?php else : ?>
                <span for="" class="algo conteo" id="lblCartCount" >0</span>  
              <?php endif ?>  
            </a>
          </li>
        <?php endif ?>               
        
      </ul>

      <!--  Menu movil    -->
      <ul id="nav-mobile" class="sidenav">
           <?php if(session()->has('usuario')):  ?>
          <?php if(session()->rol == '0'): ?>
            <li><?= anchor('#!','Nuevo',['id'=>'algo','class'=>'dropdown-trigger','data-target'=>'mdropdown2']);?></li>
            <li><?= anchor('items','Lista');?></li>
            <li><?= anchor('#!',session()->usuario,['id'=>'algo','class'=>'dropdown-trigger','data-target'=>'mdropdown1']);?></li>
          <?php else : ?>
            <li><?= anchor('#!','Categorias',['id'=>'algo','class'=>'dropdown-trigger','data-target'=>'mdropdown3']);?></li>
            <li class="divider"></li>     
            <li class="busc">
              <?= form_open('/buscarItem',['id'=>'buscarItem','class'=>'inp-buscar buscarItem']);?>
                <div class="row">
                  <div class="col buscador">
                    <?= form_input(['id'=>'clave','name'=>'clave','class'=>'inp-buscar browser-default']);?>
                  </div>
                  <div class="col buscador">
                    <button type="submit" class="enviarRegistro btn-buscar" disabled><i class="fas fa-search fa-lg"></i></button>  
                  </div>
                </div>
              <?= form_close();?> 
            </li>
            <li class="divider"></li>
            <li>
              <a href="<?= base_url(route_to('cartPage'))?>" >
                <i class="cart-icon large material-icons">shopping_cart</i>
                <?php if(session()->has('gqty')):  ?>
                  <span for="" class="algo conteo" id="lblCartCount" ><?= session()->gqty?></span>
                <?php else : ?>
                  <span for="" class="algo conteo" id="lblCartCount" >0</span>  
                <?php endif ?>  
              </a>
            </li>
            <li class="divider"></li>
            <li><?= anchor('#!','session()->usuario',['id'=>'algo','class'=>'dropdown-trigger','data-target'=>'mdropdown1']);?></li>
          <?php endif ?> 
        <?php else : ?>
          <li><?= anchor('registro','Registro');?></li>
          <li class="divider"></li>
          <li><?= anchor('login','Login');?></li>
          <li class="divider"></li>
          <li><?= anchor('#!','Categorias',['id'=>'algo','class'=>'dropdown-trigger','data-target'=>'mdropdown3']);?></li> 
          <li class="divider"></li>    
          <li class="busc">
            <?= form_open('/buscarItem',['id'=>'buscarItem','class'=>'buscarItem']);?>
              <div class="row">
                <div class="col buscador">
                  <?= form_input(['id'=>'clave','name'=>'clave','class'=>'inp-buscar browser-default']);?>
                </div>
                <div class="col buscador">
                  <button type="submit" class="enviarRegistro btn-buscar" disabled><i class="fas fa-search fa-lg"></i></button>  
                </div>
              </div>
            <?= form_close();?> 
          </li>
          <li class="divider"></li>
          <li>
            <a href="<?= base_url(route_to('cartPage'))?>" >
              <i class="cart-icon large material-icons">shopping_cart</i>
              <?php if(session()->has('gqty')):  ?>
                <span for="" class="algo conteo" id="lblCartCount" ><?= session()->gqty?></span>
              <?php else : ?>
                <span for="" class="algo conteo" id="lblCartCount" >0</span>  
              <?php endif ?>  
            </a>
          </li>
          <li class="divider"></li>
        <?php endif ?> 


      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger">
        <i class="material-icons">menu</i>
        
      </a>
      <!--  Menu movil    -->
    </div>
  </nav> 

   <?= $this->renderSection('contenido') ?>

  
  <footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">Laborum est proident in pariatur ex minim amet quis excepteur incididunt laboris excepteur non incididunt proident incididunt do cillum dolore elit duis aliquip commodo magna consectetur cillum qui consectetur sunt sed.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li>Consequat culpa.</li>
            <li>Nostrud irure ea.</li>
            <li>Duis nostrud non.</li>
            <li>Nostrud amet.</li>
            <li>Enim sit.</li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="" href="http://materializecss.com">Cordero</a>
      </div>
    </div>
  </footer>


   <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h5>Producto agregado al carrito</h5>
      <p class="titulo"></p>
      <div class="row">
        <div class="col s12 m6">
          <div>
            <img class="imagenModal" src="" alt="">
          </div>
        </div>
        <div class="col s12 m6">
          <div class="card">
            <div class="card-content">
              <span class="titulo2"></span>   
            </div>                   
            <div class="card-content ">
              <p class="contenido"></p>
            </div>
            <div class="card-content ">
              <p class="contenido2"></p>
            </div>
                       
          </div>
        </div>
      </div>
    </div>    
    <div class="modal-footer">
      <a  class="btn seguir">Seguir comprando</a>
      <a href="<?= base_url(route_to('cartPage'))?>" class="btn">Ir al Carrito</a>
    </div>
  </div>


  <!--  Scripts-->
  
  
  
  

  </body>
</html>
