<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Piedra Papel Tijeras</title>
        <!-- CSS Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Hojas de estilo-->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <?php 
        include('mano.php');
        include('contador.php');

        error_reporting(E_ALL);// Notificar todos los errores de PHP.
            
        if(!isset($co)) {
            $co = new Contadores(); //Objeto contador
        }   
        if(isset($_POST['form_reset'])){
            $co->resetPartida();
        }



        $manos = ['piedra' => new Piedra, 'papel' => new Papel, 'tijeras' => new Tijeras];//Se crean los objetos de piedra papel tijera
        $opciones = [
            //array_keys() devuelve todas las claves de un array o un subconjunto de claves de un array
        // 'jugador1' => array_keys($manos)[rand(0, 2)], en el caso de que el jugador 1 eligiera aleatoriamente.
            'jugador2' => array_keys($manos)[rand(0, 2)]
        ];

        ?>

        <div class="container">
            <div class="row mt-5">
                <div class="col m-auto text-light text-center border border-dark bg-dark rounded pb-5 ">
                    <h1 class=" display-4 mt-3">Piedra Papel Tijeras</h1>
                    <?php 
                            //Se ejecuta si el número de partidas es menor o igual a 100, lo que da lugar al inicio de la partida
                            if ($co->getContador() <= 100) {
                                $jugador1Mano =  $manos['piedra'];//Jugador uno siempre elige piedra
                                $jugador2Mano = $manos[$opciones['jugador2']]; //Jugador 2 elige

                                echo '<p>Jugador 1 elige '.$jugador1Mano. ' </p>';
                                echo '<p>Jugador 2 elige '.$jugador2Mano. ' </p>';
                                echo "<h3 class='m-4'>Resultado de la partida número: ". $co->increment()."</h3> ";//Incrementa el contador de partidas
                                        
                                try {
                                    if ( $jugador2Mano->beats($jugador1Mano)) {
                                        $co->jugador2Victorias(); //Contador de num Victorias del jugador 2
                                        echo sprintf("Jugador 2 gana, %s gana frente a %s\n", $jugador2Mano, $jugador1Mano);
                                    } else {
                                        $co->jugador1Victorias(); //Contador de num Victorias del jugador 2
                                        echo sprintf("Jugador 1 gana, %s gana frente a %s\n", $jugador1Mano, $jugador2Mano);
                                        
                                    }
                                } catch (ExcepcionEmpate $ex) {
                                    $co->empates();
                                    echo $ex->getMessage() . "\n";
                                }
                                ?>
                    <!-- Botón para seguir jugando -->
                    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?> " method="post">
                            <input class="btn btn-primary mt-4" type="submit" name="form_submit" value="Jugar!" />
                    </form>

                    <?php }//Fin del WHILE

                        //RESUMEN PARTIDA
                        //Si el número de partidas ha superado 100 muestra los resultados y un botón para resetear todos los contadores.
                        else{
                                echo '<h2 class="m-5">Fin de la partida </h2>';
                                $co->resumenVictorias ();// Resumen del número de victorias de cada jugador y el número de empates.
                                
                            
                    ?>
                    <!-- Botón para resetear la partida -->
                    <form action="" method="post">
                        <input class="btn btn-primary m-3" type="submit" id="form_reset" name="form_reset" value="Reset!" />
                    </form>
                    <?php }?> <!-- Fin del else -->
                </div>
            </div>
        </div>
    </body>
</html>