<?php

namespace Mic\YcBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testClearUselessWorlds()
    {
        $string = "A big white pillow";
		$stringExcepted = "big white pillow";

        $this->assertEquals(Mic\YcBundle\Controller\DefaultController::clearUselessWorlds($string), $stringExcepted);
    }
}
