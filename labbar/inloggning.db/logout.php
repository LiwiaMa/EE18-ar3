<?php

/**
 * PHP version 7
 * @category   Inloggning
 * @author     Liwia Matuszczak <liwiamatuszczak.@gmail.com>
 * @license    PHP CC
 */
include "./resurser/conn.php";
session_start();
// Logga ut genom att döda sessiom variablerna
session_destroy();

// Hoppa till logga in
header("Location: ./login.php");
?>
</main>
</div>
</body>
</html>