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
	              <th>Descripcion</th>
	              <th>IMG</th>
	              <th>Carrousel</th>
	          </tr>
	        </thead>

	        <tbody>
	        	<?php if (isset($items)) : ?>
					<?php foreach ($items as $value) : ?>
						<tr>
				            <td><?= $value['title'] ?></td>
				            <td><?= $value['description'] ?></td>
				            <td><img src="<?= base_url('assets/images/'.$value['thumb']); ?>" alt=""></td>
				            <td class="carro">
				            	<div class="container">
							      <label>
							      	<?php if($value['carrousel'] == 1) : ?>
							        	<input type="checkbox" class="carrao" id="<?= $value['id'] ?>" checked="checked"/>
							        	<span></span>
									<?php else : ?>
										<input type="checkbox" class="carrao" id="<?= $value['id'] ?>" />
										<span></span>
									<?php endif ?>	
							      </label>
							    </div>
							</td>
				        </tr>
					<?php endforeach; ?>
	        	<?php endif; ?>	         
	        </tbody>
	      </table>
	      
	      
		</div>
		
	</div>
	<div class="input-field col s12">
	    <button type="button" class="btn btn-carrousel" >Guardar</button>
	</div>
</div>

<?= $this->endSection() ?>