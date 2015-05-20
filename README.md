# MailgunServiceProvider

A Simple wrapper for the mailgun API for the Silex Framework.

Features
--------
* Easy setup.
* All the Mailgun API features.

Requirements
------------
 * PHP 5.3+
 * mailgun-php
  
Installation
------------ 
```sh
$ composer require achrafsoltani/mailgunserviceprovider
```
Setup
------------
``` {.php}
require_once __DIR__.'/vendor/autoload.php';

use Silex\Application;
use AchrafSoltani\Provider\MailgunServiceProvider;

$app = new Application();

$app->register(new MailgunServiceProvider(), array(
    'mailgun.api_key' => 'key-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
    'mailgun.domain' => 'domain.tld',
));

// Usage

$app->run();
```
Usage
------------
* Example 1 : Sending an email

``` {.php}
$message = array(
    'from'    => 'Excited User <name@domain.tld>',
    'to'      => 'Baz <foo.bar@example.com>',
    'subject' => 'Greetings!',
    'text'    => 'Testing some Mailgun awesomness!'    
);

//$app['mailgun']->sendMessage($message);
```

* Example 2 : Creating a mailing list through the API

``` {.php}
$app['mailgun']->post("lists", array(
    'address'     => 'LIST@domain.tld',
    'description' => 'Mailgun Dev List'
));
```
Full API documentation
------------
Check how to use the full API capabilities at https://documentation.mailgun.com/user_manual.html
