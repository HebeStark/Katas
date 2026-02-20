# Agenda de Contactos

## Descripción

Aplicación web sencilla desarrollada en PHP puro que permite gestionar una agenda de contactos.

El sistema permite:

* ➕ Añadir contactos
* 📋 Listar contactos
* 🔍 Buscar contactos
* ❌ Eliminar contactos
* 💾 Guardar la información en un archivo JSON

Proyecto realizado como práctica.

## Estructura del proyecto

agenda-contactos/
│
├── index.php          → Lógica principal y vista
├── agenda.php         → Funciones de gestión de contactos
├── contactos.json     → Archivo donde se almacenan los datos
└── styles.css         → Estilos visuales

## 📦 Funcionamiento

Los contactos se almacenan en el archivo `contactos.json` en formato JSON.

Cada contacto contiene:

* id (generado automáticamente)
* nombre
* apellidos
* teléfono
* email
