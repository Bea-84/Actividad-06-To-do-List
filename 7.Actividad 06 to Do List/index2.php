<?php

//Primero, el código verifica si se ha enviado una solicitud POST al servidor 
//y si existe una variable llamada 'tarea' en esa solicitud.

            if (isset($_POST['tarea'])) {
                $nueva_tarea = $_POST['tarea'];

//Si la cookie 'tareas' ya existe, se decodifica su valor almacenado en JSON 
//y se asigna a la variable $tareas. Si no existe, se inicializa como un arreglo vacío.

                if (isset($_COOKIE['tareas'])) {
                    $tareas = json_decode($_COOKIE['tareas']);
                } else {
                    $tareas = array();
                }

//Luego, agrega la nueva tarea (almacenada en $nueva_tarea) al arreglo $tareas.

                $tareas[] = $nueva_tarea;

                //A continuación, se establece una cookie llamada 'tareas'

                setcookie('tareas', json_encode($tareas), time() + 3600); // Cookie válida por 1 hora
            }

 
//Después el código verifica si existe una cookie llamada 'tareas'. 
//Si la cookie existe, se decodifica su valor en un arreglo de tareas 
//y se recorre ese arreglo para imprimir cada tarea en una lista HTML (<li>).           

            if (isset($_COOKIE['tareas'])) {
                $tareas = json_decode($_COOKIE['tareas']);
                foreach ($tareas as $tarea) {
                    echo '<li class="list-group-item">' . $tarea . '</li>';
                }
            }
            ?>
