<?php

namespace app\models;

use matintayebi\phpmvc\Application;
use matintayebi\phpmvc\db\DbModel;

class LoginForm extends DbModel
{
    public string $email = '';
    public string $password = '';


    public function attributes(): array
    {
        return ["email", "password"];
    }

    public function rules(): array
    {
        return [
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
            "password" => [self::RULE_REQUIRED]
        ];
    }

    public function attemptLogin(): bool
    {
        $user = User::findOne(["email" => $this->email]);
        if (!$user || !password_verify($this->password, $user->password)) {
            $this->addError("email", "ایمیل یا رمز عبور اشتباه است");
            return false;
        }
        Application::$app->login($user);
        return true;
    }

    public function labels(): array
    {
        return [
            "email" => "ایمیل ",
            "password" => "رمز عبور ",
        ];
    }

    public function errorMessages(): array
    {
        return [
            self::RULE_REQUIRED => ' فیلد {field} نیاز است وارد شود ',
            self::RULE_EMAIL => 'ایمیل معتبر نیست',
        ];
    }

    public static function tableName(): string
    {
        return "users";
    }

    public static function primaryKey(): string
    {
        return "id";
    }
}