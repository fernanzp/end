<?php
function verifyRecaptcha($response) {
    $secret = env('RECAPTCHA_SECRET_KEY');
    $remoteip = $_SERVER['REMOTE_ADDR'];

    // Verifica la respuesta de reCAPTCHA
    $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
    return json_decode($verifyResponse);
}
?>