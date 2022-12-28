<?php
/////////////////// Configuraciones de la aplicación
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
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "elocal");

////PHPMailer

