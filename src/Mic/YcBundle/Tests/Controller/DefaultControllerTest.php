<?php

namespace Mic\YcBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testResults()
    {
        $client = static::createClient();

        $crawler = $client->request('POST', '/results', array('search' => "I'm looking for a big white pillow to sleep", 'results' => array()));

        $this->assertTrue($crawler->filter('html:contains("I\'m looking for a big white pillow to sleep")')->count() > 0);
    }
}
