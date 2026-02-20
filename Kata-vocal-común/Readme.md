# Contador de Vocales en PHP

📖 Descripción

-Este ejercicio consiste en desarrollar una función que, dado un string, devuelva la cantidad de veces que se repite cada vocal (a, e, i, o, u).

-La solución implementada normaliza el texto a minúsculas para evitar duplicar el conteo entre mayúsculas y minúsculas.

## Tecnologías utilizadas

PHP 8+
strict_types
Funciones nativas de PHP (strtolower, substr_count)

## Funcionamiento

La función:
Convierte el texto a minúsculas.
Inicializa un array con las cinco vocales.
Cuenta cuántas veces aparece cada vocal utilizando substr_count.
Devuelve un array asociativo con los resultados.
