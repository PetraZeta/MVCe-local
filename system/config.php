<?php
/////////////////// Configuraciones de la aplicación
$dotenv = parse_ini_file('.env');
///////// Path al core
define("CORE", "system/core/");
///////// ROOT de nuestra aplicacion
define("ROOT", $_SERVER['DOCUMENT_ROOT'] . "/MVCe-local/");
///////// Path a los controladores de la aplicación
define("PATH_CONTROLLERS", "app/controllers/");
///////// Path a las vistas de la aplicación
define("PATH_VIEWS", "app/views/");
///////// Path a los modelos de la aplicación
define("PATH_MODELS", "app/models/");
//////// Controlador por defecto
define("DEFAULT_CONTROLLER", "Inicio");

define("BASE_URL", "http://localhost/MVCe-local/");

//////// Acceso a BBDD
define("DB_HOST", $dotenv['DB_HOST']);
define("DB_USER", $dotenv['DB_USER']);
define("DB_PASS", $dotenv['DB_PASS']);
define("DB_NAME", $dotenv['DB_NAME']);
