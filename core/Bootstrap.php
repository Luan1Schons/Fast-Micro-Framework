<?php

/* 
* Initialization Framework
*/

//DotEnv
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1));
$dotenv->load();
