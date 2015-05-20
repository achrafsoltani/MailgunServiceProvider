<?php

/**
 * MailgunServiceProvider
 *
 * A Simple wrapper for the mailgun API for teh Silex Framework
 *
 * @package		MailgunServiceProvider
 * @author		Achraf Soltani <achraf.soltani@gmail.com>
 * @date        05/19/2015
 * @file        MailgunServiceProvider.php
 */
 

namespace AchrafSoltani\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use AchrafSoltani\Mailgun\Client;

/**
 * Class RoutingServiceProvider
 * @package AchrafSoltani\Provider
 */
class MailgunServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        
        $app['mailgun'] = function () use ($app) 
        {
            $client = new Client($app['mailgun.api_key']); 
            $client->setWorkingDomain($app['mailgun.domain']);
            return $client;
        };
    }
    
    public function boot(Application $app)
    {
        
    }
}