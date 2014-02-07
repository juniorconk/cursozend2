<?php

namespace Escola\Service;

use Doctrine\ORM\EntityManager;
use Escola\Entity\Configurator;

class User extends AbstractService {

    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = "Escola\Entity\User";
    }

    public function update(array $data) {
        $entity = $this->em->getReference($this->entity, $data['id']);

        if (empty($data['password']))
            unset($data['password']);

        $entity = Configurator::configure($entity, $data);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

}