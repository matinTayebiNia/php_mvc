<?php

namespace app\controllers;

use matintayebi\phpmvc\Application;
use matintayebi\phpmvc\Controller;
use matintayebi\phpmvc\middlewares\AuthMiddleware;
use matintayebi\phpmvc\Request;
use matintayebi\phpmvc\Response;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(["profile"]));
    }

    public function login(Request $request, Response $response): array|string
    {
        $this->setLayout("auth");
        $loginForm = new LoginForm();

        if ($request->isPost()) {
            $loginForm->loadData($request->body());
            if ($loginForm->validate() && $loginForm->attemptLogin()) {
                return $response->redirect("/");
            }
            return $this->render("auth/login", [
                "model" => $loginForm
            ]);
        }
        return $this->render("auth/login", [
            "model" => $loginForm
        ]);
    }

    public function register(Request $request): array|string
    {
        $this->setLayout("auth");
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->body());

            if ($user->validate() && $user->save()) {
                $this->setFlashMessages("success", "registered");
                return $this->redirect("/");
            }
            return $this->render("auth/register", [
                "model" => $user
            ]);
        }
        return $this->render("auth/register", [
            "model" => $user
        ]);

    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect("/");
    }

    public function profile(): array|string
    {
//        $this->view()->title = "profile";
        return $this->render("profile/index");
    }

}