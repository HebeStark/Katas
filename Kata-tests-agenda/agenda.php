<?php

function obtenerContactos($ruta = 'contactos.json') {

    if (!file_exists($ruta)) {
        file_put_contents($ruta, json_encode([]));
    }

    $contenido = file_get_contents($ruta);
    return json_decode($contenido, true) ?? [];
}

function guardarContactos($contactos, $ruta = 'contactos.json') {
    $json = json_encode($contactos, JSON_PRETTY_PRINT);
    file_put_contents($ruta, $json);
}

function agregarContacto($nombre, $apellidos, $telefono, $email, $ruta = 'contactos.json') {

    $contactos = obtenerContactos($ruta);

    $nuevoContacto = [
        'id' => uniqid(),
        'nombre' => $nombre,
        'apellidos' => $apellidos,
        'telefono' => $telefono,
        'email' => $email
    ];

    $contactos[] = $nuevoContacto;

    guardarContactos($contactos, $ruta);

    return $nuevoContacto;
}

function eliminarContacto($id, $ruta = 'contactos.json') {

    $contactos = obtenerContactos($ruta);

    $contactos = array_filter($contactos, function($contacto) use ($id) {
        return $contacto['id'] !== $id;
    });

    guardarContactos(array_values($contactos), $ruta);

}

function buscarContacto($termino, $ruta = 'contactos.json') {

    $contactos = obtenerContactos($ruta);

    $termino = strtolower($termino);

    return array_filter($contactos, function($contacto) use ($termino) {
      return str_contains(strtolower($contacto["nombre"]), $termino) ||
               str_contains(strtolower($contacto["apellidos"]), $termino);
    });
}