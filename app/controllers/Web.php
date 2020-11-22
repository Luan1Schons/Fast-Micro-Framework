<?php

/* 
* Web Controller
*/

namespace App\Controllers;

use App\Database\Models\Users;

class Web  extends BaseController
{

    private $users;

    public function __construct()
    {
        $this->users = new Users();
    }

    public function home($response)
    {

        $this->mailSend('Teste', 'Testando', 'luanschons2000@gmail.com', 'Luan Schons Griebler');
        
        $data = [
            "router" => $response,
            "page" => ['title' => 'Home', 'description' => "Página Home."]
        ];

        return $this->setView('home', $data);
    }

    public function contact($response)
    {
        $data = [
            "router" => $response,
            "page" => ['title' => 'Error', 'description' => "Página contato"]
        ];

        return $this->setView('contact', $data);
    }

    public function about($response)
    {

        $data = [
            "router" => $response,
            "page" => ['title' => 'About', 'description' => "Página de sobre."]
        ];

        return $this->setView('about', $data);

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