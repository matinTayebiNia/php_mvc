<?php

return [
    "userClass" => app\models\User::class,
    "session_lifeTime" => $_ENV["SESSION_LIFETIME"],
    "application_main_layout" => "main",
    "app_name" => $_ENV["APP_NAME"],
    "db" => [
        "dsn" => $_ENV["DB_DNS"],
        "user" => $_ENV["DB_USERNAME"],
        "password" => $_ENV["DB_PASSWORD"],
    ]
];