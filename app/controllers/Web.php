<?php

/* 
* Web Controller
*/

namespace App\Controllers;


class Web  extends BaseController
{

    public function __construct()
    {
        return true;
    }

    public function home($response)
    {
        echo 'Testing';
    }

    public function error($response)
    {

        $data = [
            "router" => $response,
            "page" => ['title' => 'Error', 'description' => "Página de erros."]
        ];

        return $this->setView('error', $data);
    }
}