<?php


class m0001_create_users_table
{
    public function up()
    {
        try {
            $db = \matintayebi\phpmvc\Application::$app->db;
            $SQL = "CREATE TABLE `users` ( 
                    `id` BIGINT NOT NULL AUTO_INCREMENT,
                    `username` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `email` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,               
                    `status` BOOLEAN NOT NULL DEFAULT '0',
                    `password` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    UNIQUE KEY `unique_username_field` (`username`) USING BTREE,
                UNIQUE KEY `unique_email_field` (`email`) USING BTREE,
                    PRIMARY KEY (`id`)
                );";
            $db->pdo->exec($SQL);
        } catch (\Exception $exception) {
            throw new \Error($exception->getMessage());
        }

    }

    public function down()
    {
        try {
            $db = \matintayebi\phpmvc\Application::$app->db;
            $SQL = "DROP TABLE users";
            $db->pdo->exec($SQL);
        } catch (\Exception $exception) {
            throw new \Error($exception->getMessage());
        }
    }
}