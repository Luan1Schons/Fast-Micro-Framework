<?php

if($_ENV['ENVIRONMENT'] != 'PRODUCTION')
{
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}