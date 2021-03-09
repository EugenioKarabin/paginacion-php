<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
	<title>Practica de paginación</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
	<div class="contenedor">
		<h1>Articulos</h1>
		<section class="articulos">
			<ul>
				<?php foreach ($articulos as $articulo): ?>
					<li><?php echo $articulo['id'].'.- '.$articulo['titulo'] ?></li>
				<?php endforeach ?>
			</ul>
		</section>

		<section class="paginacion">
			<ul>
				<?php if ($pagina==1): ?>
					<li class="inactivo">&laquo;</li>
				<?php else: ?>
					<li><a href="?pagina=<?php echo $pagina -1 ?>">&laquo;</a></li>
				<?php endif; ?>

				<?php 
					for ($i=1; $i <= $numeroPaginas ; $i++) { 
						if ($pagina==$i) {
							echo "<li class='seleccionado'><a href='?pagina=$i'>$i</a></li>";
						} else {
							echo "<li><a href='?pagina=$i'>$i</a></li>";
						}
					}
				?>

				<?php if ($pagina==$numeroPaginas): ?>
					<li class="inactivo">&raquo;</li>
				<?php else: ?>
					<li><a href="?pagina=<?php echo $pagina +1 ?>">&raquo;</a></li>
				<?php endif; ?>
			</ul>
<!--				<li class="inactivo"><a href="#">&laquo;</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">&raquo;</a></li>-->
		</section>
	</div>
</body>
</html>