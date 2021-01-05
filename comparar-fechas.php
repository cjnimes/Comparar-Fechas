<?php
/**
 * Comparar dos fechas.
 * El criterio para devolver el resultado es el mismo de la función strcmp() para comparar cadenas.
 * Si $fecha_1 > $fecha_2, se devuelve un número mayor que cero.
 * Si $fecha_1 < $fecha_2, se devuelve un número menor que cero.
 * Si $fecha_1 = $fecha_2, se devuelve cero.
 *
 * El número devuelto corresponde a la diferencia de días entre las dos fechas.
 * Ejemplo:
 * $fecha_1: 2020-12-15 11:30:00
 * $fecha_2: 2020-12-11 09:03:59
 * Resultado con $considerar_hora = FALSE: diferencia: 4.
 * Resultado con $considerar_hora = TRUE: diferencia: 3.
 * 
 * @param string $fecha_1
 * @param string $fecha_2
 * @param bool $considerar_hora Indica si el cálculo se hace tomando en cuenta la hora de las fechas.
 * @return int 
 */
function comparar_fechas($fecha_1, $fecha_2, $considerar_hora = false)
{
    $f1 = new DateTime($fecha_1);
    $f2 = new DateTime($fecha_2);

    // si no hay que considerar la hora, entonces se reinicia a cero.
    if (!$considerar_hora) {
        $f1->setTime(0, 0, 0);
        $f2->setTime(0, 0, 0);
    }        

    $interval = $f1->diff($f2);

    if ($f1 > $f2) {
        return $interval->days;
    } else if ($f1 < $f2) {
        return $interval->days * -1;
    } else {
        return 0;
    }
}
