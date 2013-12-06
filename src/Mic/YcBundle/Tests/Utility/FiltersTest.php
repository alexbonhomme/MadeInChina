<?php

namespace Mic\YcBundle\Tests\Utility;

class FiltersTest extends \PHPUnit_Framework_TestCase
{
    public function testClearUselessWords()
    {
        $string = "A big white pillow";
		$stringExcepted = "big white pillow";

        $this->assertEquals(Mic\YcBundle\Controller\DefaultController::clearUselessWorlds($string), $stringExcepted);
    }
}

?>