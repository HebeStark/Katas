<?php
session_start();

$mensaje = "❌ Día no válido.";
$imagen = "null";
$dia = null;

$regalos = json_decode(file_get_contents("regalos.json"), true);
$abiertos = json_decode(file_get_contents("abiertos.json"), true);

if (!$abiertos) {
    $abiertos = [];
}


if (isset($_GET['dia'])) {
    $dia = (int) $_GET['dia'];
    $diaActual = (int) date("j");

   if ($dia >= 1 && $dia <= 24 && $dia <= $diaActual && isset($regalos[$dia])) {

        $mensaje = htmlspecialchars($regalos[$dia]["frase"]);
        $imagen = $regalos[$dia]["imagen"];

          $_SESSION["abiertos"][$dia] = true;

            if (!in_array($dia, $abiertos)) {
            $abiertos[] = $dia;
            file_put_contents("abiertos.json", json_encode($abiertos));
        }
    }
}
$colores = ["#ffadad", "#ffd6a5", "#caffbf", "#9bf6ff", "#bdb2ff"];
$colorTarjeta = $colores[array_rand($colores)];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Día <?php echo $dia; ?></title>
    <link rel="stylesheet"  href="css/styles.css">
</head>
<body>

<h1>🎄 Día <?php echo $dia; ?> 🎄</h1>

<div class="tarjeta" style="background-color: <?php echo $colorTarjeta; ?>;">
    <?php if ($imagen): ?>
        <img src="<?php echo $imagen; ?>" alt="Navidad">
    <?php endif; ?>

    <p><?php echo $mensaje; ?></p>
</div>

<a class="volver" href="index.php">⬅ Volver al calendario</a>

</body>
</html>