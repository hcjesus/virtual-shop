<?= $this->extend('template/main') ?>

<?= $this->section('contenido') ?>
<div class="container">
	<div class="lista-panel ">
		<div class="">
			<div class="heading row">
				<div class="col s10">
					<h5>Productos</h5>
				</div>
				<div class="col s2">
					<a href="newItem" class=" my"><i class="medium waves-light material-icons">add_circle</i></a>
				</div>				
			</div>
			<div class="message ">
				<?php if(session()->has('success')):  ?>
					<div class="card-panel error_login" role="alert">
						<ul>
							<li ><?= esc(session()->success) ?></li>
						</ul>
					</div>
				<?php endif ?>	
			</div>
		</div>

		<div>				
	      <table class="highlight">
	        <thead>
	          <tr>
	              <th>Titulo</th>
	              <th>Precio</th>
	              <th>Descripcion</th>
	              <th>Editar / Eliminar</th>
	          </tr>
	        </thead>

	        <tbody>
	        	<?php if (isset($items)) : ?>
					<?php foreach ($items as $value) : ?>
						<tr>
				            <td><?= $value['title'] ?></td>
				            <td><?= $value['price'] ?></td>
				            <td><?= $value['description'] ?></td>
				            <td><a href="<?= base_url(route_to('editar',$value['id'])) ?>" class="waves-effect waves-light btn my"><i class="material-icons">edit</i></a>&nbsp;
				            	<a href="<?= base_url(route_to('eliminar',$value['id'])) ?>" class="waves-effect waves-light btn my"><i class="material-icons">delete</i></a>
							</td>
				        </tr>
					<?php endforeach; ?>
	        	<?php endif; ?>	         
	        </tbody>
	      </table>
		</div>
		
	</div>
</div>

<?= $this->endSection() ?>