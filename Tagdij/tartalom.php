<?php
switch ($menu) {
    case "belepes":
        require_once 'belepes.php';
        break;
case "modositas":
        require_once 'modositas.php';
        break;
    case "torles":
        require_once 'torles.php';
        break;
    default:
        break;
}
?>