<?= $this->extend('template/main') ?>

<?= $this->section('contenido') ?>

<div class="container">
	<div class="profile-panel">
		<div class="encabezado">
			<h5>Prefil de usuario</h5>
		</div>
		<div class="datos">
			<div>
				<p>nombre:<?= $id ?></p>
			</div>
			<div>
				<p>correo</p>
			</div>
			<div>
				<p>imagen:</p>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>