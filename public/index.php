<?php
require_once __DIR__ . "./../vendor/autoload.php";

use app\controllers\AuthController;
use app\controllers\SiteController;

use matintayebi\phpmvc\Application;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

 $config = require_once "../config/index.php";;

$app = new Application(dirname(__DIR__), $config);


$app->router->get("/", [SiteController::class, "home"]);

$app->router->get("/contact-us", [SiteController::class, "contact"]);
$app->router->post("/contact-us", [SiteController::class, "contact"]);
$app->router->get("/register", [AuthController::class, "register"]);
$app->router->post("/register", [AuthController::class, "register"]);
$app->router->get("/login", [AuthController::class, "login"]);
$app->router->post("/login", [AuthController::class, "login"]);
$app->router->get("/logout", [AuthController::class, "logout"]);
$app->router->get("/profile", [AuthController::class, "profile"]);

$app->run();


