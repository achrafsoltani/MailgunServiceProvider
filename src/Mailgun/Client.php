<?php

/**
 * Client
 *
 * A class wrapping the Mailgun SDK class
 *
 * @package		MailgunServiceProvider
 * @author		Achraf Soltani <achraf.soltani@gmail.com>
 * @date        05/20/2015
 * @file        Client.php
 */
 
 namespace AchrafSoltani\Mailgun;
 
 use Mailgun\Mailgun;
 
 class Client extends Mailgun
 {
     protected $workingDomain;
     
     public function setWorkingDomain($workingDomain)
     {
         $this->workingDomain = $workingDomain;
     }
     
     /**
     * This method wraps the original sendMessage method while avoiding
     * the need to specify the working domain param
     *
     * @param array $postData
     * @param array $postFiles
     * @throws Exceptions\MissingRequiredMIMEParameters
     */
     public function sendMessage($postData, $postFiles = array())
     {
         return parent::sendMessage($this->workingDomain, $postData, $postFiles);
     }
         
 }
