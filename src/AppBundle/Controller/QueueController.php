<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\Queue;

class QueueController extends Controller {
    public function queueAction()
    {
        $request = Request::createFromGlobals();
        
        $first_name = $request->request->get('first_name');
        $last_name = $request->request->get('last_name');
        $type = $request->request->get('type');
        $service = $request->request->get('service');
        $salutation = $request->request->get('salutation');
        $organisation = $request->request->get('organisation');
        
        $created = date('Y/m/d H:i:s');
        
        $queue = new Queue();
        
        $queue->setFirstname($first_name);
        $queue->setLastname($last_name);
        $queue->setType($type);
        $queue->setService($service);
        $queue->setSalutation($salutation);
        $queue->setOrganisation($organisation);
        $queue->setCreated($created);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($queue);
        
        $em->flush();
        
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
        'SELECT *
        FROM queue'
        );
        $customerList = $query->getResult();
        
        $content = $this->render(
        'queue.html.twig',
            array('queue' => $customerList)
        );
        
        return new Response($content);
    }
}