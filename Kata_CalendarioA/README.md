# Calendario de Adviento

## Descripción

Aplicación web desarrollada en PHP + HTML + CSS que simula un calendario de adviento interactivo.
Cada día del 1 al 24 muestra una frase acompañada de una imagen navideña.
El proyecto utiliza archivos JSON para almacenar los datos y el estado de los días abiertos.

## Estructura del proyecto

/calendario-adviento
│
├── index.php
├── dia.php
├── regalos.json
├── abiertos.json
├── css/
│     styles.css
└── imagenes/

## Funcionalidades

- Visualización de los 24 días en formato grid (6x4)
- Diseño tipo tarjeta postal con imagen y frase
- Frases almacenadas en regalos.json
- Persistencia del estado de los días abiertos mediante abiertos.json
- Cambio de color visual cuando un día ha sido abierto
- Botón para reiniciar el calendario
- Imágenes locales almacenadas en la carpeta /imagenes

## Tecnologías utilizadas

- PHP (manejo de sesiones y lógica)
- HTML5
- CSS3 (Grid y animaciones)
- JSON (almacenamiento de datos)
