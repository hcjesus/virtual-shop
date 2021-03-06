<?= $this->extend('template/main') ?>

<?= $this->section('contenido') ?>
<div class="container">
	<div class="container">
		<div class="container panel">
			<div class="heading">
				<h5>Nuevo Producto</h5>
			</div>
			<div class="message " hidden>
				<ul class="lista">
				</ul>	
			</div>
			<?php if(session()->has('error')):  ?>
					<div class="card-panel error_login" role="alert">
						<ul>
							<?php foreach (session()->error as $error) : ?>
						        <li ><?= esc($error) ?></li>
						    <?php endforeach ?>
						</ul>
					</div>
				<?php endif ?>
		</div>
		<?php if (isset($item)) : ?>
		<?= form_open_multipart('/updateItem',['id'=>'multipartform','class'=>'formRegistroItems']);?>
			<div class="input-field col s12">
				<?php 
					echo form_label('Producto:','producto',['class'=>'validate','id'=>'producto_label']);
					echo form_input(['id'=>'producto','name'=>'producto','class'=>'form-control','value'=>$item['title']]);
				?>	
			</div>
			<div class="input-field col s12">
				<?php 
					echo form_label('Precio:','precio',['class'=>'validate','id'=>'precio_label']);
					echo form_input(['type' => 'number','id'=>'precio','name'=>'precio','class'=>'form-control','value'=>$item['price']]);
				?>	
			</div>
			<div class="input-field col s12">
				<?php 
					echo form_label('Descripcion:','descripcion',['class'=>'validate','id'=>'descripcion_label']);
					echo form_input(['id'=>'descripcion','name'=>'descripcion','class'=>'form-control','value'=>$item['description']]);
				?>	
			</div>
			<div class="input-field col s12">
				<select name="category">
					 <option value="0" selected>Selecciona Categoria</option>				
					<?php if(isset($category)) : ?>
						<?php foreach($category as $cat) :?>
							<?php if($item['category'] == $cat['id']) :?>
								<option value="<?=$cat['id']?>" <?= set_select('category', $cat['id']); ?> selected ><?= $cat['category']?></option>
							<?php else :?>
								<option value="<?=$cat['id']?>" <?= set_select('category', $cat['id']); ?>><?= $cat['category']?></option>	
							<?php endif; ?>											    
						<?php endforeach; ?>
					<?php endif; ?>						
				</select>
				<label class="validate" for="category" id="marcas_label">Categorias</label>
			</div>			
			<div class="input-field col s12">
				<select name="marcas">
					 <option value="0" selected>Selecciona Marca</option>				
					<?php if(isset($brands)) : ?>
						<?php foreach($brands as $brand) :?>
							<?php if($item['brand'] == $brand['id']) : ?>
								<option value="<?=$brand['id']?>" <?= set_select('marcas', $brand['id']); ?>selected ><?= $brand['brand']?></option>
							<?php else :?>
								<option value="<?=$brand['id']?>" <?= set_select('marcas', $brand['id']); ?>><?= $brand['brand']?></option>	
							<?php endif; ?>											    
						<?php endforeach; ?>
					<?php endif; ?>						
				</select>
				<label class="validate" for="marcas" id="marcas_label">Marcas</label>
			</div>
			<div class="input-field col s12">
				<?php 
					echo form_label('Tags: Separar con comas','tags',['class'=>'validate','id'=>'tags_label']);
					echo form_input(['id'=>'tags','name'=>'tags','class'=>'form-control','value'=>$item['tags']]);
				?>	
			</div>										
			<div class="file-field input-field">
		      <div class="btn">
		        <span>Imagen</span>
		        <input type="file" id="imagen" name="imagen" class="form-control">
		      </div>
		      <div class="file-path-wrapper">
		        <input class="file-path validate" name="imagex" type="text" value="<?= $item['imagen'] ?>">
		      </div>
		    </div>	
				
			<div class="input-field col s12">
				<?= form_hidden('id', $item['id']); ?>
				<?= form_submit('btnEnviar','Enviar',['class'=>'btn enviarRegistro']);?>
			</div>
		<?= form_close();?>
		<?php endif ?>
	</div>
</div>

<?= $this->endSection() ?>