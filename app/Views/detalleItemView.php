<?= $this->extend('template/main') ?>

<?= $this->section('contenido') ?>
<div class="container detalleItem">
	<div class="">
	    <h5 class="header">Detalle producto</h5>
	    <div class="row">
	    	<?php if (isset($item)):?>
				<div class=" col s12 l6">	      
			     <div class="">
			        <img src="<?= base_url('assets/images/'.$item['imagen']) ?>">
			      </div>
			    </div>
			    <div class="card col s12 l6">	      
			      <div class=" ">
			      	<div class="card-content">
			      		<h6 class="card-title"><?= $item['title'] ?></h6>
			      	</div>   
			        <div class="card-content">
			          <p><?=$item['description']?></p>
			        </div>
			        <div class="card-content">
			        	
			        </div>
			        <div class="card-action">
			          <span >Precio: <span class="td">$<?=$item['price']?>.00</span></span>
			          <a class="addItem btn tooltipped" data-position="top" data-tooltip="Agregar al carrito" idI="<?= $item['id'] ?>"><i class="material-icons ">add_shopping_cart</i></a>
			        </div>
			      </div>
			    </div>
	    	<?php endif ?>    	
		    
	    </div>
	    
	  </div>
</div>
<?= $this->endSection() ?>