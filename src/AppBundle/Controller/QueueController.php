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

use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Doctrine\DBAL\Statement;

class QueueController extends Controller {
    public function queueAction()
    {
        try {
            /** Doctrine Query queues from the database for retrieval of the queue entry entered **/
            
            $em = $this->getDoctrine()->getManager();
            
            $resultSetMapping = new ResultSetMappingBuilder($em);
            $resultSetMapping->addRootEntityFromClassMetadata('AppBundle\Entity\Queue', 'q');
            
            $query = $em->createNativeQuery("SELECT q.id, q.first_name, q.last_name, q.type, q.service, q.organisation, q.salutation, q.created FROM queue q", $resultSetMapping);
            
            $customerList = $query->getResult();
            
            /** Doctrine Query services from the database for retrieval of the list displayed **/
            
            $resultSetMappingService = new ResultSetMappingBuilder($em);
            $resultSetMappingService->addRootEntityFromClassMetadata('AppBundle\Entity\Service', 's');
            
            $queryService = $em->createNativeQuery("SELECT s.id, s.name FROM service s", $resultSetMappingService);
            
            $serviceList = $queryService->getResult();

        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
        
        try {
            $content = $this->renderView(
            'queue.html.twig',
                array('queues' => $customerList, 'services' => $serviceList)
            );
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
        
        return new Response($content);
    }
    
    public function submitAction()
    {
        $request = Request::createFromGlobals();
        
        $first_name = $request->request->get('first_name');
        $last_name = $request->request->get('last_name');
        $type = $request->request->get('type');
        $service = $request->request->get('service');
        $salutation = $request->request->get('salutation');
        $organisation = $request->request->get('organisation');
        
        $created = date('Y-m-d H:i:s');
        
        $queue = new Queue();
        
        if(!empty($type)) {
            if($type == 1) {
                $type = 'Citizen';
            } else if($type == 2) {
                $first_name = '';
                $last_name = '';
                $salutation = '';
                $type = 'Organisation';
            } else if($type == 3) {
                $type = 'Anonymous';
            }
        }
        
        $insert = new Statement("INSERT INTO queue (first_name, last_name, type, service, organisation, salutation) "
                . "VALUES ('{$first_name}', '{$last_name}', '{$type}', '{$service}', '{$organisation}', '{$salutation}')",
                $this->getDoctrine()->getConnection());
        
        try {
            $insert->execute();
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
        
        $stmt = new Statement("SELECT id, first_name, last_name, type, service, organisation, salutation FROM queue", 
                $this->getDoctrine()->getConnection());
        $stmt->execute();
        $customerList = $stmt->fetchAll();

        $stmt = new Statement("SELECT name FROM service",
                $this->getDoctrine()->getConnection());
        $stmt->execute();
        $serviceList = $stmt->fetchAll();
        
        $content = $this->renderView(
        'queue.html.twig',
            array('queues' => $customerList, 'services' => $serviceList)
        );
        
        return new Response($content);
    }
}