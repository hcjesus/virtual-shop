<?= $this->extend('template/main') ?>

<?= $this->section('contenido') ?>
<div class="container ">
	<div class="registro-panel ">
		<div class="row">
			<div class=" panel1 col s12 l6">
				<div class="pan">
					<h3 class="logo">Logo</h3>
					<p>Consequat sed aliqua in aliqua sint labore non occaecat do ut eiusmod est adipisicing aliqua duis nulla ad consectetur tempor eu non occaecat.</p>
				</div>
			</div>
			<div class="panel2 col s12 m6 l6">
				<div >
					<h6 class="heading">Registro</h6>
				</div>
				<div class="message " hidden>
					<ul class="lista">
					</ul>	
				</div>
				<?= form_open('/insert',['class'=>'formRegistro']);?>
					<div class="input-field col s12">
						<input type="text" id="nombre" name="nombre" class="form-control">
						<label for="nombre" class="validate" id="nombre_label">Nombre:</label>
						
					</div>
					<div class="input-field col s12">
						<input type="text" id="correo" name="correo" class="form-control">
						<label for="correo" class="validate" id="correo_label">Correo:</label>			
					</div>
					<div class="input-field col s12">
						<input type="password" id="contrasena" name="contrasena" class="form-control">
						<label for="contrasena" class="validate" id="contrasena_label">Contraseña:</label>
					</div>
					<div class="input-field col s12">
						<input type="password" id="contrasena2" name="contrasena2" class="form-control">
						<label for="contrasena2" class="validate" id="contrasena2_label">Confirmar Contraseña:</label>
					</div>
					
					<div class="input-field col s12 opciones">
						<?= form_submit('btnEnviar','Registrar',['class'=>'btn enviarRegistro']);?>
						<span>Tienes cuenta? <a href="login">Ingresar</a></span>
					</div>
				<?= form_close();?>
			</div>
			
		</div>
	</div>
</div>
<?= $this->endSection() ?>