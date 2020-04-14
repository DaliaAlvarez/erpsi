<?php 
	session_start();
	if(!isset($_SESSION["autenticado"])){
		header("Location: index.php");
	}
 ?>
<!DOCTYPE html>
 <html>
 	<head>
 		<title>ERP</title>
 		<link rel="stylesheet" href="css/estilos.css">
 		<script src="js/Chart.min.js"></script>
 	</head>
 	<body>
 		<section>
 			<nav>
 	<h2>Bienvenido: <?php echo $_SESSION["usuario"]; ?></h2>
 				<ul>
 			<a href="?sec=inicio"><li>Inicio</li></a>
 			<a href="?sec=usu"><li>Usuario</li></a>
 			<a href="?sec=actividad"><li>Actividad</li></a>
 			<a href="?sec=asistencia"><li>Asistencia</li></a>
 			<a href="?sec=balance"><li>Balance</li></a>
 			<a href="?sec=cliente"><li>Cliente</li></a>
 			<a href="?sec=compra"><li>Compra</li></a>
 			<a href="?sec=detalle_compra"><li>Detalle_compra</li></a>
 			<a href="?sec=devoluciones"><li>Devoluciones</li></a>
 			<a href="?sec=empleado"><li>Empleado</li></a>
 			<a href="?sec=evaluacion"><li>Evaluacion</li></a>
 			<a href="?sec=jornada"><li>Jornada</li></a>
 			<a href="?sec=producto"><li>Producto</li></a>
 			<a href="?sec=prov"><li>Proveedor</li></a>
 			<a href="?sec=cerrar"><li>Cerrar Sesión</li></a>
 				</ul>

 				
 			</nav>
 			<article>
 				<?php 
 	if(isset($_GET["sec"])){
 		$sec = $_GET["sec"];
 		switch ($sec) {
 			case 'usu':
 				require_once("php/vistaUsuario.php");
 				break;
 			

 				case 'actividad':
 				require_once("php/vistaActividad.php");
 				break;
 			

 				case 'asistencia':
 				require_once("php/vistaAsistencia.php");
 				break;
 			

 				case 'balance':
 				require_once("php/vistaBalance.php");
 				break;
 			
 				case 'cliente':
 				require_once("php/vistaCliente.php");
 				break;
 			
 				case 'compra':
 				require_once("php/vistaCompra.php");
 				break;
 			
 				case 'detalle_compra':
 				require_once("php/vistaDetalle_compra.php");
 				break;
 			
 				case 'devoluciones':
 				require_once("php/vistaDevoluciones.php");
 				break;
 			
 				case 'empleado':
 				require_once("php/vistaEmpleado.php");
 				break;
 			
 				case 'evaluacion':
 				require_once("php/vistaEvaluacion.php");
 				break;

 				case 'jornada':
 				require_once("php/vistaJornada.php");
 				break;

 				case 'producto':
 				require_once("php/vistaProducto.php");
 				break;

 				case 'prov':
 				require_once("php/vistaProveedor.php");
 				break;

 				case 'cerrar':
 				session_destroy();
 				header("Location: index.php");
 				break;			
 				

 		}
 	}
 				 ?>		
 			</article>
 		</section>
 	</body>
 </html>