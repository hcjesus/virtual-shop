<?= $this->extend('template/main') ?>

<?= $this->section('contenido') ?>

<div class="container">
	<div class="container">
		<div class="container panel">
			<div class="encabezado">
				<h5>Nueva Categoria</h5>
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
		<?= form_open_multipart('/saveCategory',['id'=>'multipartform','class'=>'formRegistroItems']);?>
			<div class="input-field col s12">
				<?php 
					echo form_label('Categoria:','categoria',['class'=>'validate','id'=>'categoria_label']);
					echo form_input(['id'=>'categoria','name'=>'categoria','class'=>'form-control']);
				?>	
			</div>		
			
			<div class="input-field col s12">
				<?= form_submit('btnEnviar','Enviar',['class'=>'btn enviarRegistro']);?>
			</div>
		<?= form_close();?>
	</div>
</div>
<?= $this->endSection() ?>