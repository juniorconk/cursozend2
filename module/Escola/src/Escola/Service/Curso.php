<?php
namespace Escola\Service;
use Doctrine\ORM\EntityManager;
class Curso extends AbstractService {
    public function __construct(EntityManager $em) {
        parent::__construct($em);
        $this->entity = "Escola\Entity\Curso";
    }
}
