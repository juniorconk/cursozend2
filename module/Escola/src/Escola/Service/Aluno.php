<?php

namespace Escola\Service;

use Doctrine\ORM\EntityManager;
use Escola\Entity\Configurator;

class Aluno extends AbstractService {

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = "Escola\Entity\Aluno";
    }
    
    public function insert(array $data) {
        $entity = new $this->entity($data);
        
        $curso = $this->em->getReference("Escola\Entity\Curso", $data['curso']);
        $entity->setCurso($curso);
        
        $this->em->persist($entity);
        $this->em->flush();
        
        return $entity;
        
    }
    
    public function update(array $data) {
        $entity = $this->em->getReference($this->entity, $data['id']);
        $entity = Configurator::configure($entity,$data);
        
        $curso = $this->em->getReference("Escola\Entity\Curso", $data['curso']);
        $entity->setCurso($curso);
        
        $this->em->persist($entity);
        $this->em->flush();
        
        return $entity;
    }
}