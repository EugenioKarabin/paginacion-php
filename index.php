<?php 
	try {
		$conexion = new PDO('mysql:host=localhost;dbname=paginacion', 'root','');
	}catch (PDOExeption $e){
		echo "ERROR: ".$e->getMessage();
		die();
	}

	$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$postPorPagina=5;

	$inicio = ($pagina>1) ? ($pagina*$postPorPagina-$postPorPagina) : 0;

	//$conexion->exec("SET CHARACTER SET utf8");

	$articulos = $conexion->prepare("
		SELECT SQL_CALC_FOUND_ROWS * FROM articulos 
		LIMIT $inicio, $postPorPagina"
	);

	$articulos->execute();
	$articulos = $articulos->fetchall();

	if (!$articulos) {
		header('location: index.php');
	}

	$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total');
	$totalArticulos = $totalArticulos->fetch()['total'];

	$numeroPaginas = ceil($totalArticulos/$postPorPagina);

	require 'index.view.php';

?>