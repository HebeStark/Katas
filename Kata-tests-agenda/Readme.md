# Agenda de Contactos

## Descripción

Aplicación web sencilla desarrollada en PHP puro que permite gestionar una agenda de contactos de forma sencilla.

El sistema permite:

* ➕ Añadir contactos
* 📋 Listar contactos
* 🔍 Buscar contactos
* ❌ Eliminar contactos
* 💾 Guardar la información en un archivo JSON

Proyecto realizado como práctica.

## Validar la lógica mediante tests automatizados con PHPUnit

Proyecto realizado como práctica para aplicar buenas prácticas de separación de responsabilidades y testing en PHP.

## Estructura del proyecto

agenda-contactos/
│
├── index.php          → Controlador simple y vista (formularios y listado)
├── agenda.php         → Lógica (CRUD de contactos)
├── tests/
│   └── AgendaTest.php     → Tests automatizados con PHPUnit
├── contactos.json     → Archivo donde se almacenan los datos
├── composer.lock
├── composer.json
├── .gitignore
└──CSS/
   └──styles.css         → Estilos visuales

## Funcionamiento

Los contactos se almacenan en el archivo `contactos.json` en formato JSON.

Cada contacto contiene:

* id (generado automáticamente)
* nombre
* apellidos
* teléfono
* email

La lógica de gestión de contactos se encuentra en agenda.php, que incluye funciones para:

* Obtener contactos
* Añadir contacto
* Eliminar contacto
* Buscar contacto

## Testing con PHPUnit

Se testean las siguientes funcionalidades:

✔ Añadir contacto
✔ Eliminar contacto
✔ Buscar contacto

Los tests utilizan un archivo JSON temporal para no afectar los datos reales.

Para ejecutar los tests:

vendor\bin\phpunit tests
🚀 Cómo ejecutar la aplicación

Clonar el repositorio.

Instalar dependencias:
-composer install
-Iniciar el servidor interno de PHP:
PHP Server: Serve project
