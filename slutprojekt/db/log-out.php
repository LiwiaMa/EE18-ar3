<?php

/**
 * PHP version 7
 * @category   Inloggning
 * @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
 * @license    PHP CC
 */
include "./resurser/conn.php";
session_start();
// Logga ut 
session_destroy();

// Hoppa till index
header("Location: ../index.html");
?>
