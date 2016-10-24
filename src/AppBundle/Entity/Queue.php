<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;

/**
* @ORM\Entity
* @ORM\Table(name="queue")
*/
class Queue {
    
    /**
    * @ORM\Column(type="type", length=255)
    */
    public $type;
    
    /**
    * @ORM\Column(type="string", length=255)
    */
    public $first_name;
    
    /**
    * @ORM\Column(type="string", length=255)
    */
    public $last_name;
    
    /**
    * @ORM\Column(type="string", length=50)
    */
    public $salutation;
    
    /**
    * @ORM\Column(type="datetime")
    */
    public $created;
    
    /**
    * @ORM\Column(type="string", length=255)
    */
    public $organisation;
    
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    */
    public $id;
    
    public function getType()
    {
        return $type;
    }
    
    public function getSalutation() 
    {
        return $salutation;
    }
    
    public function getCreated()
    {
        return $created;
    }
    
    public function getFirstname()
    {
        return $first_name;
    }
    
    public function getLastname()
    {
        return $last_name;
    }
    
    public function getOrganisation()
    {
        return $organisation;
    }
    
    public function setType($type)
    {
        return $this->type = $type;
    }
    
    public function setSalutation() 
    {
        return $salutation;
    }
    
    public function setCreated()
    {
        return $created;
    }
    
    public function setFirstname()
    {
        return $first_name;
    }
    
    public function setLastname()
    {
        return $last_name;
    }
    
    public function setOrganisation()
    {
        return $organisation;
    }
}