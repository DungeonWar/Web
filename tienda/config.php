<?php
//ProPayPal es vital para declarar si es demo o prueba las transacciones

//define('ProPayPal', 0); // El cero simboliza entorno de Prueba
//define('ProPayPal', 1); // El 1 simboliza entorno de producción

define('ProPayPal', 0);
if(ProPayPal){
    define("PayPalClientId", "*********************");
    define("PayPalSecret", "*********************");
    define("PayPalBaseUrl", "https://api.paypal.com/v1/");
    define("PayPalENV", "production");
} else {
    define("PayPalClientId", "AeaR7yDedtngKScjW2k3Z36MY4OaO7GwHvMXiyhUJfrvbPIKfC7R2oqud5IBnbssXcmeL0QT8c8mL13p");
    define("PayPalSecret", "ELNYVbB1p-gTLCrapeC7lPxVSlfIOfDanuYnSDRIsfM334ZKs5qoa7bJyxYFiKqHoM0kZQ8uC3gaRITJ");
    define("PayPalBaseUrl", "http://dungeonwar.online/descargar");
    define("PayPalENV", "sandbox");
}
?>