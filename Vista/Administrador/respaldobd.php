<?php
session_start();
if (!isset($_SESSION['usuario'])) {

    header("Location: ../../login.php");
}
include_once("../../Modelo/conexion.php");

$id = $_SESSION['usuario'];
$sql = $conexion->query("SELECT * FROM usuario WHERE idUsuario = $id");
$consulta = ($sql->fetch_object());

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.js"
        integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../estilos/cssadmin.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <!-- Gráfica de Profesores contratados y no contratados -->
    <script type="text/javascript">
        google.charts.load('current', { 'packages': ['bar'] });
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Move', 'Percentaje'],
                <?php
                $grafico = $conexion->query("SELECT Estatus, COUNT(DISTINCT idProfesor) as Cantidad FROM guiaaplicacion GROUP BY Estatus");
                while ($datosGrafica = $grafico->fetch_object()) {


                    echo "['" . $datosGrafica->Estatus . "'," . $datosGrafica->Cantidad . "],";


                }
                ?>
            ]);

            var options = {
                width: 700,
                legend: { position: 'none' },
                chart: {
                    title: 'Profesores',
                    subtitle: 'Contratados y no contratados'
                },
                axes: {
                    x: {
                        0: { side: 'top', label: 'Datos' } // Top x-axis.
                    }
                },
                bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
        };

    </script>


    <!----------------------------------------------- Gráfica de Profesores por academia -------------------------------------------------->
    <script type="text/javascript">
        google.charts.load('current', { 'packages': ['bar'] });
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Move', 'Percentaje'],
                <?php
                $grafico2 = $conexion->query("SELECT NombreAca, COUNT(DISTINCT idProfesor) as Cantidad FROM guiaaplicacion INNER JOIN Materia ON Materia.idMateria = guiaaplicacion.idMateria INNER JOIN academia ON academia.idAcademia = materia.idAcademia GROUP by NombreAca");
                while ($datosGrafica2 = $grafico2->fetch_object()) {


                    echo "['" . $datosGrafica2->NombreAca . "'," . $datosGrafica2->Cantidad . "],";


                }
                ?>
            ]);

            var options = {
                width: 700,
                legend: { position: 'none' },
                chart: {
                    title: 'Profesores',
                    subtitle: 'Evaluados por academia'
                },
                axes: {
                    x: {
                        0: { side: 'top', label: 'Datos' } // Top x-axis.
                    }
                },
                bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('academia'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
        };
    </script>

    
    <!----------------------------------------------- Gráfica de materias más solicitadas -------------------------------------------------->
    <script type="text/javascript">
        google.charts.load('current', { 'packages': ['bar'] });
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Move', 'Percentaje'],
                <?php
                $grafico2 = $conexion->query("SELECT NombreM, COUNT(DISTINCT idProfesor) as Cantidad FROM guiaaplicacion INNER JOIN Materia ON Materia.idMateria = guiaaplicacion.idMateria GROUP BY NombreM limit 5;");
                while ($datosGrafica2 = $grafico2->fetch_object()) {


                    echo "['" . $datosGrafica2->NombreM . "'," . $datosGrafica2->Cantidad . "],";


                }
                ?>
            ]);

            var options = {
                width: 700,
                legend: { position: 'none' },
                chart: {
                    title: 'Materias',
                    subtitle: 'Más solicitadas para dar clase'
                },
                axes: {
                    x: {
                        0: { side: 'top', label: 'Datos' } // Top x-axis.
                    }
                },
                bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('materia'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
        };
    </script>

        <!----------------------------------------------- Gráfica de periodo -------------------------------------------------->
        <script type="text/javascript">
        google.charts.load('current', { 'packages': ['bar'] });
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Move', 'Percentaje'],
                <?php
                $grafico2 = $conexion->query("SELECT Periodo, COUNT(DISTINCT idProfesor) as Cantidad FROM guiaaplicacion INNER JOIN Materia ON Materia.idMateria = guiaaplicacion.idMateria INNER JOIN academia ON academia.idAcademia = materia.idAcademia GROUP by Periodo;");
                while ($datosGrafica2 = $grafico2->fetch_object()) {


                    echo "['" . $datosGrafica2->Periodo . "'," . $datosGrafica2->Cantidad . "],";


                }
                ?>
            ]);

            var options = {
                width: 700,
                legend: { position: 'none' },
                chart: {
                    title: 'Materias',
                    subtitle: 'Más solicitadas por periodos'
                },
                axes: {
                    x: {
                        0: { side: 'top', label: 'Datos' } // Top x-axis.
                    }
                },
                bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('periodo'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
        };
    </script>
</head>

<body>
    <?php include_once("menu.php"); ?>

    <div class="container-fluid portada mt-5">
        <div class="row justify-content-end pe-3 mt-5">

            <div class="col-7">
                <p class="text-center titulo">Respaldo y restauración de la Base de Datos</p>
            </div>
        </div>
    </div>

    <div class="row m-3 mb-1 border bg-light justify-content-center">
        <!-- Se realiza el respaldo de la base de datos. -->
        <div class="col-xl-4 col-md-6 mt-2 mb-2">
            <div class="card bg-info  text-white mb-4">
                <div class="card-body text-center fs-5">Respaldo</div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <a href="./backup.php"><button class="btn btn-small btn-outline-light">Realizar copia de
                            seguridad</button></a><br>
                </div>
            </div>
        </div>

        <!-- Se realiza la restauración de la base de datos. -->
        <div class="col-xl-4 col-md-6 mt-2 mb-2">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body text-center fs-5">Restauración</div>
                <div class="card-footer d-flex align-items-center justify-content-center">
                    <form action="./restore.php" method="POST" enctype="multipart/form-data" style="display: flex;">
                        <input class="form-control" type="file" name="restore_file" id="restore_file"><button
                            class="btn btn-small btn btn-outline-light" type="submit">Restaurar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!--Div that will hold the pie chart-->
            <div id="top_x_div" style="width: 800px; height: 600px;"></div>
        </div>

        <div class="col-lg-6 mt-5 mt-lg-0">
            <!--Div that will hold the pie chart-->
            <div id="academia" style="width: 800px; height: 600px;"></div>


        </div>

        <div class="col-lg-6 mt-5">
            <!--Div that will hold the pie chart-->
            <div id="materia" style="width: 800px; height: 600px;"></div>
        </div>

        <div class="col-lg-6 mt-5">
            <!--Div that will hold the pie chart-->
            <div id="periodo" style="width: 800px; height: 600px;"></div>
        </div>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>

</body>

</html>