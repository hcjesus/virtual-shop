<?= $this->extend('template/main') ?>

<?= $this->section('contenido') ?>
<div class="contenedor">
  <div class="section">
    
  </div>
  <div class="section cart-panel">
    <div class="encabezado">
        <h5>Carrito</h5>
      </div>
    <div class="row">
      <?php if(session()->has('cart')) : ?>      
      <div class="cartItems col s12 m8">
        <ul class="collection">
          <?php foreach (session()->cart as $value) : ?>
            <li class="collection-item" id="item0<?=$value['id']?>">
              <div class="row">
                <div class="col s12  m3 cartListImg">
                  <img src="assets/images/<?=$value['imagen']?>" alt="">
                </div>
                <div class="col s12 m9">
                  <div class="espacio">
                    <span class="title"><?=$value['item']?></span>
                    <span class="title">Precio: <span class="title2">$<?=$value['precio']?>.00</span></span>
                  </div>
                  <div class="espacio">
                    <span class="title2"><?=$value['descripcion']?></span>
                  </div>
                  <div class="">
                    <div class="row">
                      <div class="col s12 m2">
                        <select class="browser-default agregarCantidad" idI="<?=$value['id']?>">
                          <?php for ($i = 1; $i < 11 ; $i++) : ?>
                            <?php if($i == $value['cantidad']) :?>
                              <option value="<?= $i ?>" selected><?= $i ?></option>
                            <?php else : ?>  
                              <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endif ?>  
                          <?php endfor ?>  
                        </select>
                      </div>
                      <div class="col s12 m4 espacio">
                        <a href="" class="eliminarItem " idI="<?=$value['id']?>">Eliminar</a>
                      </div>
                      <div class="col s12 m6 espacio">
                        <a href="<?= base_url(route_to('showItemCategory',$value['category']))?>" class="">Productos Similares</a>
                      </div>                      
                    </div>
                    
                  </div>
                </div>
              </div>  
            </li>
          <?php endforeach ?>                     
        </ul>
      </div>
      <div class="resumen col s12 m4">
        <div class="card-panel ">
          <div class="card-content">
            <span class=" card-title">Resumen de orden</span>
          </div>
          <div class="card-content">
            <span class="title">Productos:</span>
            <span class="ct-total"><?= session()->gqty ?></span>
          </div>
          <div class="card-content">
            <span class="title">Total:</span>
            <span class="pr-total">$<?= session()->precioTotal ?>.00</span>
          </div>
          <div class="card-action">
            <a href="#" class="btn btn-pagar">Continuar con la compra</a>
          </div>
        </div>
      </div>
      <?php else : ?>
        <div class="">
          <h6>No tiene productos en el carrito</h6>
        </div>
      <?php endif ?>
        
    </div>
  </div>
</div>
<?= $this->endSection() ?>
