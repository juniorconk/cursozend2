<?php

namespace Livraria\service;

use Doctrine\ORM\EntityManager;

class Livro extends AbstractService {

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = "Livraria\Entity\Livro";
    }

    public function insert(array $data) {
        $entity = new $this->entity($data);

        $categoria = $this->em->getReference("Livraria\Entity\Categoria", $data['categoria_id']);
        $entity->setCategoria($categoria);

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

    public function update(array $data) {
        $entity = $this->em->getReference($this->entity, $data['id']);
        $entity = Configurator::configure($entity, $data);

        $categoria = $this->em->getReference("Livraria\Entity\Categoria", $data['categoria_id']);
        $entity->setCategoria($categoria);

        $this->em->persist($entity);
        $this->em->flush();
        return $entity;
    }

}
