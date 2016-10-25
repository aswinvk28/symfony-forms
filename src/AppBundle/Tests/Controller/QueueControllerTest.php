<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Doctrine\DBAL\Statement;

class QueueControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
        
        $host = $_SERVER['HTTP_HOST'];
        $port = $_SERVER['SERVER_PORT'];

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
    
    public function testQueue()
    {
        $client = static::createClient();
        
        $client->request('POST', $host . ':' . $port . '/symfony-forms/web/queue', array(
            'first_name' => 'Anonymous',
            'last_name' => 'Anonymous',
            'organisation' => '',
            'service' => 'Fly-Tipping',
            'salutation' => 'Mr.',
            'type' => 'Citizen',
            'created' => date('now')
        ));
        
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        $stmt = new Statement("SELECT id, first_name, last_name, type, service, organisation, salutation FROM queue WHERE first_name = 'Anonymous' AND last_name = 'Anonymous'", 
                    $this->getDoctrine()->getConnection());
        $stmt->execute();
        $queue = $stmt->fetchAll();
        
        $this->assertEquals($queue['first_name'], 'Anonymous');
        $this->assertEquals($queue['last_name'], 'Anonymous');
        $this->assertEquals($queue['salutation'], 'Mr.');
        $this->assertEquals($queue['type'], 'Citizen');
        $this->assertEquals($queue['service'], 'Fly-Tipping');
    }
}
