<?php
if(isset($_SERVER["PHP_AUTH_USER"]) && $_SERVER["PHP_AUTH_USER"] == 'bob' &&
   isset($_SERVER["PHP_AUTH_PW"]) && $_SERVER["PHP_AUTH_PW"] == 'geheim'){    
    // Anmeldung erfolgreich
}else{
    // Basic-Authentifizierung per HTTP-Header anfordern
    header('WWW-Authenticate: Basic realm="Kundenverwaltung"');
    header("HTTP/1.0 401 Unauthorized");
    echo 'Bitte melden Sie sich an!';
    die;
}
?>

