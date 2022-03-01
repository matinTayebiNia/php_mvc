<?php

namespace app\models;

use matintayebi\phpmvc\UserModel;
use JetBrains\PhpStorm\ArrayShape;

class User extends UserModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    private static string $table = "users";
    public string $username = "";
    public string $password = "";
    public int $status = self::STATUS_INACTIVE;
    public string $email = "";
    public string $confirmPassword = "";


    public function save(): bool
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    #[ArrayShape(["username" => "array", "email" => "array", "password" => "array", "confirmPassword" => "array"])] public function rules(): array
    {
        return [
            "username" => [self::RULE_REQUIRED, [
                self::RULE_UNIQUE, "class" => self::class, "attribute" => "username"
            ]],
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, "class" => self::class, "attribute" => "email"
            ]],
            "password" => [self::RULE_REQUIRED, [self::RULE_MIN, "min" => 8]],
            "confirmPassword" => [self::RULE_REQUIRED, [self::RULE_MATCH, "match" => "password"]]
        ];
    }

    public static function tableName(): string
    {
        return self::$table;
    }

    public function attributes(): array
    {
        return ["username", "status", "email", "password"];
    }

    public function labels(): array
    {
        return [
            "username" => "نام کاربری",
            "email" => "ایمیل ",
            "password" => "رمز عبور ",
            "confirmPassword" => "تکرار رمز عبور "
        ];
    }

    public function errorMessages(): array
    {
        return [
            self::RULE_REQUIRED => ' فیلد {field} نیاز است وارد شود ',
            self::RULE_EMAIL => 'ایمیل معتبر نیست',
            self::RULE_MIN => 'فیلد {field} باید بیشتر از {min} کاکتر باشد ',
            self::RULE_MAX => 'فیلد {field} باید کمتر از {min} کاکتر باشد ',
            self::RULE_MATCH => 'مقدار {field} و {match} باهم برابر نیست. ',
            self::RULE_UNIQUE => 'از این {field} قبلا استفاده شده است',
        ];
    }

    public static function primaryKey(): string
    {
        return "id";
    }

    public function getDisplayName(): string
    {
        return $this->username;
    }
}