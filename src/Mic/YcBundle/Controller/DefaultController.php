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
		
				
		$request = $this->getRequest();
		if($request->getMethod() == 'POST') {
			$search = trim($request->request->get('search'));
			$matches = array();
			
			preg_match("/I\'m looking for (.*) to (.*)/", $search, $matches);
			
			if(is_array($matches) && count($matches) > 0) {
				$filtresFor = array_filter(explode(" ", $matches[1]), "Mic\YcBundle\Controller\DefaultController::clearUselessWords");
				$for = array_pop($filtresFor);
				
				$forFiltres = array();
				
				foreach($filtresFor as $filtre) {
					if(in_array($filtre, array("black", "blue", "orange", "red", "green", "yellow")))
						$forFiltres[] = array('name' => 'color', 'value' => $filtre);
				}
				
				//var_dump($forFiltres);
				
				$results = $productRepo->findWithFilters($for, "", $forFiltres);		
			}
		}

        return array("search" => $search, "results" => $results);
    }
	
	private static function clearUselessWords($var) {
		$words = array("a", "an", "the", "one");
		return !in_array($var, $words);
	}

}
