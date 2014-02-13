<?php

namespace Escola\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController {

    public function indexAction() {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Escola\Entity\Aluno');
        
        $aluno = $repo->findAll();
        
       /** Zend\Db
        $alunoService = $this->getServiceLocator()->get("Escola\Model\AlunoService");
        $alunos = $alunoService->fetchAll();
        */
        return new ViewModel(array('alunos' => $alunos));
    }

}
