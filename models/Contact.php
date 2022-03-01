<?php

namespace app\models;

use matintayebi\phpmvc\db\DbModel;

class Contact extends DbModel
{
    public string $subject = "";
    public string $email = "";
    public string $description = "";

    public static function tableName(): string
    {
        return "contacts";
    }

    public function attributes(): array
    {
        return ["email", "subject", "description"];
    }

    public static function primaryKey(): string
    {
        return "id";
    }

    public function create(): bool
    {
        return $this->save();
    }

    public function rules(): array
    {
        return [
            "subject" => [self::RULE_REQUIRED],
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "description" => [self::RULE_REQUIRED],
        ];
    }
}