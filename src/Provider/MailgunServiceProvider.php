<?php

/**
 * MailgunServiceProvider
 *
 * A Simple wrapper for the mailgun API for teh Silex Framework
 *
 * @package		MailgunServiceProvider
 * @author		Achraf Soltani <a.soltani@futurdigital.fr>
 * @date        05/19/2015
 * @file        MailgunServiceProvider.php
 */
 

namespace AchrafSoltani\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Mailgun\Mailgun;

/**
 * Class RoutingServiceProvider
 * @package AchrafSoltani\Provider
 */
class MailgunServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['mailgun.send'] = $app->protect(function ($message) use ($app) {
            $client = new Mailgun($app['mailgun.api_key']);
            $result = $mgClient->sendMessage($app['mailgun.domain'], $message);
            return $result;
        });
    }
    
    public function boot(Application $app)
    {
        
    }
}