<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity
* @ORM\Table(name="queue")
*/
class Queue {
    
    /**
    * @ORM\Column(type="string", length=255)
    */
    protected $type;
    
    /**
    * @ORM\Column(type="string", length=255)
    */
    protected $first_name;
    
    /**
    * @ORM\Column(type="string", length=255)
    */
    protected $last_name;
    
    /**
    * @ORM\Column(type="string", length=50)
    */
    protected $salutation;
    
    /**
    * @ORM\Column(type="string")
    */
    protected $created;
    
    /**
    * @ORM\Column(type="string", length=255)
    */
    protected $organisation;
    
    /**
    * @ORM\Column(type="string", length=255)
    */
    protected $service;
    
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;
    
    public function getType()
    {
        return $this->type;
    }
    
    public function getSalutation() 
    {
        return $this->salutation;
    }
    
    public function getCreated()
    {
        return $this->created;
    }
    
    public function getFirstname()
    {
        return $this->first_name;
    }
    
    public function getLastname()
    {
        return $this->last_name;
    }
    
    public function getOrganisation()
    {
        return $this->organisation;
    }
    
    public function getService()
    {
        return $this->service;
    }
    
    public function setService($service)
    {
        $this->service = $service;
    }
    
    public function setType($type)
    {
        return $this->type = $type;
    }
    
    public function setSalutation($salutation) 
    {
        return $this->salutation = $salutation;
    }
    
    public function setCreated($created)
    {
        return $this->created = $created;
    }
    
    public function setFirstname($first_name)
    {
        return $this->first_name = $first_name;
    }
    
    public function setLastname($last_name)
    {
        return $this->last_name = $last_name;
    }
    
    public function setOrganisation($organisation)
    {
        return $this->organisation = $organisation;
    }
}