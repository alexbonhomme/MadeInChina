<?php

namespace Mic\YcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Mic\YcBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="id_fb", type="integer", nullable=true)
     */
    protected $id_fb;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="id_twitter", type="integer", nullable=true)
     */
    protected $id_twitter;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="id_google", type="integer", nullable=true)
     */
    protected $id_google;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
	   
	 /**
     * Get id_fb
     *
     * @return integer 
     */
    public function getId_fb()
    {
        return $this->id_fb;
    }
		   
	 /**
     * Set id_fb
     *
     * @return integer 
     */
    public function setId_fb($id_fb)
    {
        $this->id_fb = $id_fb;
    }
	   
	 /**
     * Get id_twitter
     *
     * @return integer 
     */
    public function getId_twitter()
    {
        return $this->id_twitter;
    }
		   
	 /**
     * Set id_twitter
     *
     * @return integer 
     */
    public function setId_twitter($id_twitter)
    {
        $this->id_twitter = $id_twitter;
    }
	   
	 /**
     * Get id_google
     *
     * @return integer 
     */
    public function getId_google()
    {
        return $this->id_google;
    }
		   
	 /**
     * Set id_google
     *
     * @return integer 
     */
    public function setId_google($id_google)
    {
        $this->id_google = $id_google;
    }
}
