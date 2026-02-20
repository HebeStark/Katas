<?php
declare(strict_types=1);

function contarVocales(string $text): array {
    $text = strtolower($text);

    $vocales = [
        'a'=>0, 'e'=>0,'i'=>0,'o'=>0,'u'=>0,
];

foreach ($vocales as $vocal => &$cantidad) {
    $cantidad= substr_count($text, $vocal);   
    
}
return $vocales;
}

 $text = "Hoy es jueves y mañana será viernes.";
 $vocales = contarVocales($text);
 echo "En el texto: \"$text\"\n";
 foreach ($vocales as $vocal => $cantidad) {
    echo "La vocal '$vocal' aparece $cantidad veces.\n";

 }

?>