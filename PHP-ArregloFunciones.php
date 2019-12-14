<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1 - PHP [Arreglos y Funciones]</title>
</head>

<body>
    <?php
    function vectorLlenado()
    {
        $vectorCalificacionesMaterias = array(
            'A'        => $calif = array(60, 55, 100, 77, 88, 99),
            'B'        => $calif = array(90, 95, 100, 77, 88, 99),
            'C'      => $calif = array(76, 96, 80, 66, 89, 79),
            'D'        => $calif = array(99, 56, 60, 77, 98, 95),
            'E'        => $calif = array(60, 56, 100, 76, 68, 95),
            'F'         => $calif = array(70, 70, 70, 77, 87, 79),
            'G'       => $calif = array(60, 65, 60, 76, 86, 96),
            'H'         => $calif = array(96, 96, 65, 67, 86, 96),
            'I'         => $calif = array(56, 56, 90, 88, 88, 77),
            'J'         => $calif = array(79, 95, 71, 77, 87, 99)
        );

        return $vectorCalificacionesMaterias;
    }

    function mostrarAlumnosPromedios($vCM)
    {
        foreach ($vCM as $key => $value) {
            echo "Alumno " . $key . ": --> ";
            for ($i = 0; $i < count($value); $i++) {
                echo $value[$i] . " - ";
            }
            echo " ==> promedio: " . obtenerPromedioAlumno($value) . " <br>";
        }
    }

    function obtenerPromedioAlumno($vector)
    {
        $sum = 0;
        foreach ($vector as $key => $value) {
            $sum += $value;
        }
        return $sum / count($vector);
    }

    function promedioGeneralGrupo($vCM)
    {
        $suma = 0;
        foreach ($vCM as $key => $value) {
            $suma += obtenerPromedioAlumno($value);
        }
        return $suma / count($vCM);
    }

    function promedioMateria($vector)
    {
        for ($i = 0; $i < 6; $i++) {
            $suma = 0;
            foreach ($vector as $key => $value) {
                $suma += $vector[$key][$i];
            }
            echo $suma / sizeof($vector) . " - ";
        }
    }

    function obtenerMejorPromedioAlumno($vector)
    {
        $valor = 0;
        $alumno = "";
        foreach ($vector as $key => $value) {
            if (obtenerPromedioAlumno($value) > $valor) {
                $valor = obtenerPromedioAlumno($value);
                $alumno = $key;
            }
        }

        echo $alumno . " con promedio de: " . $valor;
    }

    function promedioPorEncimaPro($vector)
    {
        $contador = 0;
        foreach ($vector as $key => $value) {
            if (promedioGeneralGrupo($vector) < obtenerPromedioAlumno($value)) {
                $contador++;
            }
        }
        return $contador;
    }
    ?>

    <h3>Alumnos, calificaciones y sus promedios.</h3>
    <?php
    mostrarAlumnosPromedios(vectorLlenado());
    echo "<br>";
    echo "<hr>";
    echo "Promedio general del grupo: ";
    echo promedioGeneralGrupo(vectorLlenado());
    echo "<br>";
    echo "<hr>";
    echo "Promedio por materias: ";
    promedioMateria(vectorLlenado());
    echo "<br>";
    echo "<hr>";
    echo "El mejor promedio es del alumno ";
    obtenerMejorPromedioAlumno(vectorLlenado());
    echo "<br>";
    echo "<hr>";
    echo "Se encuentran " . promedioPorEncimaPro(vectorLlenado()) . " promedios por encima del promedio general del grupo.";
    echo "<br>";
    echo "<hr>";
    ?>
</body>

</html>