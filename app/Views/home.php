<?= $this->extend('template/main') ?>

<?= $this->section('contenido') ?>
<div class="contenedor">
  <div class="section">
    <div class="container">
      <div class="carousel">
        <?php if (isset($items)) : ?>
          <?php foreach ($items as $item) :?>
            <?php if ($item['carrousel'] == '1') : ?>
              <a class="carousel-item" href="#one<?= $item['id']?>"><img src="<?= base_url('assets/images/'.$item['imagen']); ?>"></a>
            <?php endif ?>
          <?php endforeach ?>
        <?php endif ?>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="encabezado">
      <h5>Productos mas buscados</h5>
    </div>
    <div class="">
      <div class="row">
        <?php if(isset($items)) : ?>
          ds
          <?php foreach($items as $item) : ?>
            <div class="col s12 m6 l3">
              <div class="card small  sticky-action">
                <div class="card-image waves-effect waves-block waves-light">
                  <a href="<?= base_url(route_to('detalle',$item['id']))?>" class="" id="mas-btn">
                    <img src="<?= base_url('assets/images/'.$item['imagen']); ?>" class="activa">
                  </a>                   
                </div>
                <div class="card-content">
                  <span class="card-title activator "><?= $item['title'] ?><i class="material-icons right">more_vert</i></span>                 
                </div>
                <div class="card-reveal ">
                  <span class="card-title "><?= $item['title'] ?><i class="material-icons right">close</i></span>
                  <span><p class=""><?= $item['description'] ?><p></span>
                </div>
                <div class="card-action">
                  <a href="<?= base_url(route_to('detalle',$item['id']))?>" class="" id="mas-btn">Mas</a>
                  <a class="addItem btn tooltipped" data-position="top" data-tooltip="Agregar al carrito" idI="<?= $item['id'] ?>"><i class="material-icons teal-text right">add_shopping_cart</i></a>
                </div>
              </div>
            </div>
          <?php endforeach ?>  
        <?php endif ?> 
      </div>
    </div>
  </div>
</div>


<?= $this->endSection() ?>
