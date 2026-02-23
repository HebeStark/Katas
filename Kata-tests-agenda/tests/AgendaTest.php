<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../agenda.php';

class AgendaTest extends TestCase
{
    private $rutaTest;

    protected function setUp(): void
    {
        $this->rutaTest = __DIR__ . '/contactos_test.json';
        file_put_contents($this->rutaTest, json_encode([]));
    }

    protected function tearDown(): void
    {
        if (file_exists($this->rutaTest)) {
            unlink($this->rutaTest);
        }
    }

public function testAgregarContacto()
{
    agregarContacto("Laura", "Lopez", "123456", "lau@test.com", $this->rutaTest);

    $contactos = obtenerContactos($this->rutaTest);

    $this->assertCount(1, $contactos);
    $this->assertEquals("Laura", $contactos[0]['nombre']);
    $this->assertEquals("Lopez", $contactos[0]['apellidos']);
    $this->assertEquals("123456", $contactos[0]['telefono']);
    $this->assertEquals("lau@test.com", $contactos[0]['email']);
}

public function testEliminarContacto()
{
   $contactos = [
        [
            "id" => "1",
            "nombre" => "Laura",
            "apellidos" => "Lopez",
            "telefono" => "123",
            "email" => "lau@test.com"
        ],
        [
            "id" => "2",
            "nombre" => "Miguel",
            "apellidos" => "Perez",
            "telefono" => "456",
            "email" => "migue@test.com"
        ]
    ];

    guardarContactos($contactos, $this->rutaTest);

    eliminarContacto("1", $this->rutaTest);

    $resultado = obtenerContactos($this->rutaTest);

    $this->assertCount(1, $resultado);
    $this->assertEquals("Miguel", $resultado[0]['nombre']);
}

public function testBuscarContacto()
{
    $contactos = [
        [
            "id" => "1",
            "nombre" => "Laura",
            "apellidos" => "Lopez",
            "telefono" => "123",
            "email" => "lau@test.com"
        ],
        [
            "id" => "2",
            "nombre" => "Miguel",
            "apellidos" => "Perez",
            "telefono" => "456",
            "email" => "miguel@test.com"
        ]
    ];

    guardarContactos($contactos, $this->rutaTest);

    $resultado = buscarContacto("Laura", $this->rutaTest);

    $this->assertCount(1, $resultado);
    $this->assertEquals("Laura", array_values($resultado)[0]['nombre']);
}
}