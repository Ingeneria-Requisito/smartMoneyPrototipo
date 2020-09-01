<?php 
	session_start();

	if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



	<title>Smart Money</title>
	<?php require_once "php/scripts.php";?>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/historial.css">
  
</head>
<body class="fondo">

  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="Principal.php" class="navbar-brand text-white">SmartMoney</a>
        <button class= "navbar-toggler" data-target="#menu" data-toggle="collapse" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a href="invertir.php" class="nav-link">Invertir</a>
            </li>
            <li class="nav-item active">
              <a href="grafico.php" class="nav-link">Gráficos</a>
            </li>
            <li class="nav-item active">
              <a href="usuario.php" class="nav-link">Usuario</a>
            </li>
          </ul>
            <span class="navbar-text">
              <a href="php/salir.php" class="nav-link">Cerrar sesión</a>
            </span>		
        </div>
      </nav>




    <div class="row">

        <div class="col-12 col-md-12 col-lg-12 col-xl-8">
        
            <div class="panel panel-body bg-light rounded mt-3">

                <div class="col-12 tabla">
                    <table class="table mt-2 table-bordered table-hover">

                        <thead>
                            <tr class="bg-primary text-center text-white">
                                <th>Pagado</th>
                                <th>Comprado</th>
                                <th>Dólar</th>
                                <th>Euro</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php 
                            $inc = include("php/dbdbd.php");
                            if ($inc) {
                                $consulta = "SELECT * FROM divisas ORDER BY id DESC";
                                $resultado = mysqli_query($conex,$consulta);
                                if ($resultado) {
                                    while ($row = $resultado->fetch_array()) {
                                        $descuento = $row['descuento'];
                                        $compra = $row['compra'];
                                        $precioDolar = $row['precioDolar'];
                                        $precioEuro = $row['precioEuro'];
                                        $fecha = $row['fecha'];?>
                        <div>
                            <tr class="text-center">
                                <td><?php echo $descuento ?></td>
                                <td><?php echo $compra ?></td>
                                <td><?php echo $precioDolar ?></td>
                                <td><?php echo $precioEuro ?></td>
                                <td><?php echo $fecha ?></td>
                            </tr>
                        </div> 
                        <?php
                                    }
                        }
                                }
                            ?>
                    </table>
                </div>

            </div>
        </div>

        <div class="d-none d-md-block col-md-6 col-lg-6 col-xl-4">
            <div class="my-3 col-12 text-center">
                <h3 class="d-block bg-warning py-1 mx-2 rounded">Historial de transacciones</h3>
                <img src="img/fondoHistorial.jpg" class="img-fluid imgmodificar rounded" alt="fondomodificar">
            </div>
            
        </div>

    </div>
  </div>

</body>
</html>

<?php
} else {
	header("location:index.php");
	}
?>