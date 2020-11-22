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

Find one or all registers
$this->{Your Model}->find(FindAll = true or Find=false?);

Insert data on table
$this->{Your Model}->create(['field1' => 'data1', 'field2' => 'data2']);

Delete data on table
$this->{Your Model}->delete('id', 1);

Update data on table
$this->{Your Model}->delete(['fields' => ['name' => 'Luan'],
                            'where' => ['email' => 'luanschons2000@gmail.com']
                           ]);

# Controller Structure
  Create Your controller on path: app/controllers/
 ```
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




