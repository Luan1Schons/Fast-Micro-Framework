# Fast-Micro-Framework LS
A complete and beatiful framework for small and medium applications

### Technologies

* PHP 8.0
* POO
* PDO
* TWIG
* Make using composer components | Compatible with composer components

# Installing

Clone te project on your root folder
```sh
git clone https://github.com/Luan1Schons/Fast-Micro-Framework.git ./
```

Install composer if you have not and execute:

```sh
composer dump-autoload -o
```

🌟 Yeah! You framework is installed and working!

# Router
Small, simple and uncomplicated. The router is a PHP route components with abstraction for MVC. Prepared with RESTfull verbs (GET, POST, PUT, PATCH and DELETE), works on its own layer in isolation and can be integrated without secrets to your application.

# Highlights
* Router class with all RESTful verbs (Classe router com todos os verbos RESTful)
* Optimized dispatch with total decision control (Despacho otimizado com controle total de decisões)
* Requesting Spoofing for Local Verbalization (Falsificador (Spoofing) de requisição para verbalização local)
* It's very simple to create routes for your application or API (É muito simples criar rotas para sua aplicação ou API)
* Trigger and data carrier for the controller (Gatilho e transportador de dados para o controlador)
* Composer ready and PSR-2 compliant (Pronto para o composer e compatível com PSR-2)

# Included
Models, Views, Controllers
Organize your MVC tiered application, making it easy to team & maintain future.

# Mailer
Probably the world's most popular code for sending email from PHP!
Integrated SMTP support - send without a local mail server
Send emails with multiple To, CC, BCC and Reply-to addresses
Multipart/alternative emails for mail clients that do not read HTML email
Add attachments, including inline
Support for UTF-8 content and 8bit, base64, binary, and quoted-printable encodings
SMTP authentication with LOGIN, PLAIN, CRAM-MD5, and XOAUTH2 mechanisms over SSL and SMTP+STARTTLS transports
Validates email addresses automatically
Protect against header injection attacks
Error messages in over 50 languages!
DKIM and S/MIME signing support
Compatible with PHP 5.5 and later
Namespaced to prevent name clashes
Much more!

Send emails using: the method $this->mailSend(Title', Description, Recipient, Recipient Name);

# Components
Install any component easily with composer.

# Complete Crud Implemented
Enter, Delete, Update and easily query data using the methods:

First create a model on *Fast-Micro-Framework/app/database/models/YourModel.php*

Default Structure:

```php
<?php
/* 
* Web Controller
*/

namespace App\Controllers;

use App\Database\Models\Users;

class Web  extends BaseController
{
    protected $user;
    public function __construct()
    {
        $user = new Users;
        $this->user = $user;
    }

    public function list($response)
    {
        var_dump($this->user->listUsers());
    }
```

Find one or all registers



```php
//In model: 
$this->find(FindAll = true or Find=false?);
```
```php
//On Controller:
$this->{Your Model}->find(FindAll = true or Find=false?);
```


Find by field & value

```php
//In model: 
$this->findBy($field, $value, $fetchAll = true)
```
```php
//On Controller:
$this->{Your Model}->findBy($field, $value, $fetchAll = true)
```

Insert data on table

```php
//In model: 
$this->create(['field1' => 'data1', 'field2' => 'data2']);
```
```php
//On Controller:
$this->{Your Model}->create(['field1' => 'data1', 'field2' => 'data2']);
```
Delete data on table
```php
//In model: 
$this->delete('id', 1);
```
```php
//On Controller:
$this->{Your Model}->delete('id', 1);
```
Update data on table
 
```php
//In model:
$this->delete(['fields' => ['name' => 'Luan'],
                            'where' => ['email' => 'luanschons2000@gmail.com']
                           ]);
```

```php
//On Controller:
$this->{Your Model}->delete(['fields' => ['name' => 'Luan'],
                            'where' => ['email' => 'luanschons2000@gmail.com']
                           ]);
```
# Creating .env file
Firs create a .ev on root paste
```php
BASE_URL="http://framework.test"
DIR_VIEWS="/app/views/"
EXT_VIEWS=".twig"
ENVIRONMENT="DEVELOPMENT"

DB_NAME=""
DB_USER=""
DB_PASSWORD=""
DB_HOST="localhost"
DB_DRIVER="mysql"

MAIL_HOST="smtp.gmail.com"
MAIL_USERNAME="username@email.com"
MAIL_PASSWORD="password"
MAIL_PORT="587"
 ```


# Routers Tutorial
Creating Routers
First open archive core/Routers.php
 ```php
<?php

use CoffeeCode\Router\Router;

$router = new Router($_ENV['BASE_URL']);

/**
 * routes
 * The controller must be in the namespace Test\Controller
 */
 
// Namespace of you controller
$router->namespace("Test")->group("name");

$router->get("/", "Name:home", "name.home");
$router->get("/hello", "Name:hello", "name.hello");
$router->get("/redirect", "Name:redirect", "name.redirect");

/**
 * This method executes the routes
 */
$router->dispatch();

/*
 * Redirect all errors
 */
if ($router->error()) {
    $router->redirect("name.hello");
}
 ```
 
### Named Controller Example
 ```php
 <?php

/* 
* Web Controller
*/

namespace App\Controllers;

// If you use one model call using:
use App\Database\Models\Users;

class Home extends BaseController
{
    public function index($response)
    {
        echo "<h1>Home</h1>";
    }
 }
 ```
# MVC Tutorial
### Controller Structure
  Create Your controller on path: app/controllers/
 ```php
<?php

/* 
* Web Controller
*/

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
         echo 'Home';
    }
 }
 ```
 
 ### Loading Views
  Frist Create your view on path: app/views/ with extension .twig or another configured on .env "EXT_VIEWS"
 ```php
<?php

/* 
* Web Controller
*/

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
         $data = [
            "router" => $response,
            "page" => ['title' => 'Home', 'description' => "Página Home."]
        ];

        // your view archive with no extension
        return $this->setView('home', $data);
    }
 }
 ```
 
 ### Model Structure
  Create Your controller on path: app/models/database/
 ```php
<?php

namespace App\Database\Models;

/*
** Model Users
*/

class Users extends BaseModels
{
    // Name of you table in database
    protected $table = 'user';

    public function listUsers()
    {
        $users = $this->find();
        return $users;
    }

    public function createUser($data)
    {
        $users = $this->create($data);
        return $users;
    }

    public function updateUser()
    {
      $users = $this->update(['fields' => [], 'where' => []]);
      return $users;
    }
    
    public function deleteUser()
    {
      $users = $this->delete('id', 1);
      return $users;
    }
}
 ```





