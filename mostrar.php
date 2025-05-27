<!DOCTYPE html>
<html>
<head>
    <title>Lista de Asistentes</title>
</head>
<body>
    <h2>Asistentes Registrados</h2>

    <?php
    $nombreArchivo = "asistentes.txt";

    try {
        $fArchivo = fopen($nombreArchivo, "r");

        if (!$fArchivo) {
            throw new Exception("No se pudo abrir el archivo.");
        }

        echo "<ol>"; // Abrimos la lista ordenada

        // Leemos cada línea del archivo y la mostramos como un <li>
        while (($linea = fgets($fArchivo)) !== false) {
            echo "<li>" . htmlspecialchars(trim($linea)) . "</li>";
        }

        echo "</ol>"; // Cerramos la lista

        fclose($fArchivo);
    } catch (Exception $e) {
        echo "<p style='color:red;'>No hay asistentes registrados o ocurrió un error al abrir el archivo.</p>";
    }
    ?>
</body>
</html>
