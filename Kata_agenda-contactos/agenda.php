<?php

function obtenerContactos() {

    if (!file_exists('contactos.json')) {
       file_put_contents('contactos.json', []);
    }

    $contenido = file_get_contents('contactos.json');
    return json_decode($contenido, true);

}

function guardarContactos($contactos) {
    $json = json_encode($contactos, JSON_PRETTY_PRINT);
    file_put_contents('contactos.json', $json);
}

?>