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
* @ORM\Table(name="service")
*/
class Service {
    
    /**
    * @ORM\Column(type="string", length=255)
    */
    protected $name;
    
    /**
    * @ORM\Column(type="integer")
    * @ORM\Id
    */
    protected $id;
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        return $this->name = $name;
    }
}