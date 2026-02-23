<?php
require 'agenda.php';

$contactos = obtenerContactos();

if (isset($_GET["buscar"]) && !empty($_GET["buscar"])) {
    $contactos = buscarContacto($_GET["buscar"]);
}

if (isset($_POST['eliminar_id'])) {
    eliminarContacto($_POST['eliminar_id']);
    header('Location: index.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['eliminar_id'])) {

    agregarContacto(
        $_POST['nombre'],
        $_POST['apellidos'],
        $_POST['telefono'],
        $_POST['email']
    );

    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contactos</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <h2> Agregar Nuevo Contacto</h2>

    <h3>Buscar Contacto</h3>
    <form method="GET" action="index.php">
        <input type="text" name="buscar" placeholder="Buscar por nombre o apellidos">
        <button type="submit">Buscar</button>
    </form>
    <br>

    <form method="POST" action="index.php">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" required><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <button type="submit">Guardar</button>
    </form>

    <h2>Contactos Guardados</h2>
    <?php if (empty($contactos)): ?>
        <p>No hay contactos guardados.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($contactos as $contacto): ?>
                <li>
                    <strong>Nombre:</strong> <?php echo htmlspecialchars($contacto['nombre']); ?><br>
                    <strong>Apellidos:</strong> <?php echo htmlspecialchars($contacto['apellidos']); ?><br>
                    <strong>Teléfono:</strong> <?php echo htmlspecialchars($contacto['telefono']); ?><br>
                    <strong>Email:</strong> <?php echo htmlspecialchars($contacto['email']); ?>  

                    <form method="POST"  style="display:inline;">
                        <input type="hidden" name="eliminar_id" value="<?php echo $contacto['id']; ?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </li><br>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>    

 