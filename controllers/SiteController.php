<?php

namespace app\controllers;

use matintayebi\phpmvc\Controller;
use matintayebi\phpmvc\Request;
use matintayebi\phpmvc\Response;
use app\models\Contact;

class SiteController extends Controller
{

    public function home(): array|string
    {
        $params = [
            "name" => "matin"
        ];
        return $this->render("home", $params);
    }

    public function contact(Request $request, Response $response): string
    {
        $contact = new Contact();
        if ($request->isPost()) {
            $contact->loadData($request->body());
            if ($contact->validate() && $contact->create()) {
                $this->setFlashMessages("success", "thank you for sending you suggestions to us");
                $response->redirect('/');
            }
            return $this->render("content", [
                "model" => $contact,
            ]);
        }
        return $this->render("content", ["model" => $contact,]);

    }

}