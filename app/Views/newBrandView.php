<?= $this->extend('template/main') ?>

<?= $this->section('contenido') ?>

<div class="container">
	<div class="container ">
		<div class="container panel">
			<div class="encabezado">
				<h5>Nueva Marca</h5>
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
		<?= form_open('/saveBrand',['id'=>'multipartform','class'=>'formRegistroItems']);?>
			<div class="input-field col s12">
				<?php 
					echo form_label('Marca:','brand',['class'=>'validate','id'=>'brand_label']);
					echo form_input(['id'=>'brand','name'=>'brand','class'=>'form-control']);
				?>	
			</div>					
			<div class="input-field col s12">
				<?= form_submit('btnEnviar','Enviar',['class'=>'btn enviarRegistro']);?>
			</div>
		<?= form_close();?>
	</div>
</div>
<?= $this->endSection() ?>