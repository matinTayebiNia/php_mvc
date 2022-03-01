<?php



class m0002_create_contacts_table
{
    public function up()
    {
        try {
            $db = \matintayebi\phpmvc\Application::$app->db;
            $SQL = "CREATE TABLE `contacts` ( 
                    `id` BIGINT NOT NULL AUTO_INCREMENT,
                    `subject` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `email` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,              
                    `description` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
            $SQL = "DROP TABLE `contacts`";
            $db->pdo->exec($SQL);
        } catch (\Exception $exception) {
            throw new \Error($exception->getMessage());
        }
    }
}