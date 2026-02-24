<?php
session_start();

if (isset($_GET['reset'])) {
    file_put_contents("abiertos.json", json_encode([]));
    $_SESSION["abiertos"] = [];
    header("Location: index.php");
    exit;
}

$diaActual = (int) date("j");

$abiertos = json_decode(file_get_contents("abiertos.json"), true);

    if (!$abiertos) {
        $abiertos = [];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
       <title>Calendario de Adviento</title>
    <link rel="stylesheet"  href="css/styles.css">
</head>
<body>

<h1>🎄 Calendario de Adviento 🎄</h1>

<div class="calendario">
    <?php for ($i = 1; $i <= 24; $i++): ?>
        
      <?php if ($i > $diaActual): ?>
        <div class="dia bloqueado"><?php echo $i; ?></div>

    <?php else: ?>
        <a class="dia <?php echo in_array($i, $abiertos) ? 'abierto' : ''; ?>"
           href="dia.php?dia=<?php echo $i; ?>">
            <?php echo $i; ?>
        </a>
    <?php endif; ?>

<?php endfor; ?>
<a href="?reset=1" class="reset">🔄 Reiniciar calendario</a>
</div>

</body>
</html>