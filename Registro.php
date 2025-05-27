<!DOCTYPE html>
<html>
<head>
    <title>Registro de Asistentes</title>
</head>
<body>
    <h2>Formulario de Registro</h2>

    <form method="POST" action="">
        <label for="nombre">Nombre del asistente:</label>
        <input type="text" id="nombre" name="nombre" required>
        <button type="submit">Registrar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = trim($_POST["nombre"]);
        $nombreArchivo = "asistentes.txt";

        try {
            // Abrimos el archivo en modo append para no sobrescribir los registros anteriores
            $fArchivo = fopen($nombreArchivo, "a");

            if (!$fArchivo) {
                throw new Exception("No se pudo abrir el archivo.");
            }

            // Escribimos el nombre con salto de línea
            fwrite($fArchivo, $nombre . PHP_EOL);
            fclose($fArchivo);

            echo "<p style='color:green;'>Nombre registrado correctamente: $nombre</p>";
        } catch (Exception $e) {
            echo "<p style='color:red;'>Ocurrió un error: " . $e->getMessage() . "</p>";
        }
    }
    ?>
</body>
</html>
