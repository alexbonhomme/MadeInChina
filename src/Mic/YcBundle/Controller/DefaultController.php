<?php

namespace Mic\YcBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Mic\YcBundle\Entity\Product;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
	
    /**
     * @Route("/results")
     * @Template()
     */
    public function resultsAction()
    {
        $em = $this->getDoctrine()->getManager();        
        $productRepo = $em->getRepository('MicYcBundle:Product');
		
		$search = "";
		$results = array();
		
		$results[] = $productRepo->find(1);
				
		$request = $this->getRequest();
		if($request->getMethod() == 'POST') {
			$search = trim($request->request->get('search'));
			$matches = array();
			
			preg_match("/I\'m looking for (.*) to (.*)/", $search, $matches);
			
			if(is_array($matches) && count($matches) > 0) {
				echo "for = {$matches[1]} | to = {$matches[2]}";
				
				$filtresFor = array_filter(explode(" ", $matches[1]), "Mic\YcBundle\Controller\DefaultController::clearUselessWords");
				$for = array_pop($filtresFor);
				
				var_dump($filtresFor);					
				var_dump($for);					
			}

			print_r($matches);

		}

        return array("search" => $search, "results" => $results);
    }
	
	private static function clearUselessWords($var) {
		$words = array("a", "an", "the", "one");
		return !in_array($var, $words);
	}

}
