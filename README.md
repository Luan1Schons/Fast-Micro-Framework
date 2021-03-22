# LSFramework
A complete framework for small and medium applications
I am currently testing the framework, do not recommend for use in production.

### Technologies

* PHP 7.2
* TWIG

# Router
Small, simple and uncomplicated. The router is a PHP route components with abstraction for MVC. Prepared with RESTfull verbs (GET, POST, PUT, PATCH and DELETE), works on its own layer in isolation and can be integrated without secrets to your application.

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

First create a model on *Fast-Micro-Framework/app/database/models/*

Default Structure:

```php
<?php

namespace App\Database\Models;

/*
** Model Users
*/
class Users extends BaseModels
{
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
}

```

Find one or all registers

```php
$this->{Your Model}->find(FindAll = true or Find=false?);
```

Insert data on table
```php
$this->{Your Model}->create(['field1' => 'data1', 'field2' => 'data2']);
```
Delete data on table
```php
$this->{Your Model}->delete('id', 1);
```
Update data on table
```php
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

use App\Database\Models\Users;

class Home  extends BaseController
{

    public function index($response)
    {
         echo "<h1>Home</h1>";
        echo "<p>", $response->route("name.home"), "</p>";
        echo "<p>", $response->route("name.hello"), "</p>";
        echo "<p>", $response->route("name.redirect"), "</p>";
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

use App\Database\Models\Users;

class Home  extends BaseController
{

    public function index()
    {
         echo 'Home';
    }
 }
 ```
 
 ### Loading Views
  Frist Create your view on path: app/views/ with extension .twig or another configured on .env EXT_VIEWS
 ```php
<?php

/* 
* Web Controller
*/

namespace App\Controllers;

use App\Database\Models\Users;

class Home  extends BaseController
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
      $users = $this->update(['fields) => [], 'where' => []]);
      return $users;
    }
    
    public function deleteUser()
    {
      $users = $this->delete('id', 1);
      return $users;
    }
}
 ```





