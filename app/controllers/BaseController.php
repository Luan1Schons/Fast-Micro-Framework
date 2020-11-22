<?php


/* 
* Web Controller
*/

namespace App\Controllers;

use App\Traits\Mail;

abstract class BaseController {

    use Mail;

    public function setView($view, $data = []) 
    {
        try {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__, 2).$_ENV['DIR_VIEWS']);
            if($_ENV['ENVIRONMENT'] == "PRODUCTION")
            {
                $twig = new \Twig\Environment($loader, [
                    'cache' => dirname(__DIR__, 2).$_ENV['DIR_VIEWS'].'/cache',
                ]);
            }else{
                $twig = new \Twig\Environment($loader);
            }
            echo $twig->render($view.$_ENV['EXT_VIEWS'], $data);
        }catch(Exception $e)
        {
            var_dump($e->getMessage());
        }
    }

}