<?php
require 'agenda.php';

$contactos = obtenerContactos();

$busqueda = "";

if (isset($_GET["buscar"]) && !empty($_GET["buscar"])) {
    $busqueda = strtolower($_GET["buscar"]);

    $contactos = array_filter($contactos, function ($contacto) use ($busqueda) {
        return str_contains(strtolower($contacto["nombre"]), $busqueda) || 
        str_contains(strtolower($contacto["apellidos"]), $busqueda);
    });
}


if (isset($_POST['eliminar_id'])) {

    $idEliminar = $_POST['eliminar_id'];

    $contactos = array_filter($contactos, function ($contacto) use ($idEliminar) {
        return $contacto['id'] !== $idEliminar;
    });
    guardarContactos(array_values($contactos));
    
    header('Location: index.php');
    exit();
}   


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_POST['eeliminar_id'])){

        $nuevoContacto = [
            "id" => uniqid(),
            'nombre' => $_POST['nombre'],
            'apellidos' => $_POST['apellidos'],
            'telefono' => $_POST['telefono'],
            'email' => $_POST['email']
        ];
        $contactos[] = $nuevoContacto;
        guardarContactos($contactos);

        header('Location: index.php');
        exit();

    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contactos</title>
    <link rel="stylesheet" href="styles.css">
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

 