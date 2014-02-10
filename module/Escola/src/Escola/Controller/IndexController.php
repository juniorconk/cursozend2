<?php

namespace Escola\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {

    public function indexAction() {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Escola\Entity\Curso');
        
        $cursos = $repo->findAll();
        
       /** Zend\Db
        $cursoService = $this->getServiceLocator()->get("Livraria\Model\CursoService");
        $cursos = $cursoService->fetchAll();
        */
        return new ViewModel(array('cursos' => $cursos));
    }

}
