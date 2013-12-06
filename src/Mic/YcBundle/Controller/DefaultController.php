<?php

namespace Mic\YcBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
		$search = "";
				
		$request = $this->getRequest();
		if( $request->getMethod() == 'POST' )
		{
			$search = $request->request->get('search');
			
		}

        return array("search" => $search);
    }

}
