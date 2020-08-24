<?= $this->extend('template/main') ?>

<?= $this->section('contenido') ?>

<div class="container">
	<div class="login-panel">
		<div class="row">
			<div class=" panel1 col s12 l6">
				<div class="pan">
					<h3 class="logo">Logo</h3>
					<p>Consequat sed aliqua in aliqua sint labore non occaecat do ut eiusmod est adipisicing aliqua duis nulla ad consectetur tempor eu non occaecat.</p>
				</div>
			</div>
			<div class="panel2 col s12 l6">
				<div class="logo">
					<h3>Logo</h3>
				</div>
				<div class="credenciales">
					<h6>Credenciales</h6>
				</div>
				<div class=" panel">
					<?= form_open('/valida',['class'=>'formLogin']);?>
						<div class="input-field col s12">
							<input type="text" id="correo" name="correo" class="form-control">
							<label for="correo" class="validate" id="correo_label">Correo:</label>
						</div>
						<div class="input-field col s12">
							<input type="password" id="contrasena" name="contrasena" class="form-control">
							<label for="contrasena" class="validate" id="contrasena_label">Contraseña:</label>
						</div>
						<?php if(session()->has('error')):  ?>
						<script type="text/javascript">
							M.toast({html:'Revise Usuario y/o Contraseña',classes:'error-toast'});
							$(`#correo_label`).addClass('error_');
							$(`#contrasena_label`).addClass('error_');
	      					$(`#correo`).addClass('invalid');
	      					$(`#contrasena`).addClass('invalid');
						</script >							
						<?php endif ?>

						<div class="input-field col s12 opciones">
							<?= form_submit('btnEnviar','Ingresar',['class'=>'btn enviarRegistro']);?>
							<a href="registro">Crear cuenta</a>
						</div>
					<?= form_close();?>					
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>