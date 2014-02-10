<?php

namespace Escola;

use Zend\Mvc\ModuleRouteListener,
    Zend\Mvc\MvcEvent,
    Zend\ModuleManager\ModuleManager;
use Escola\Model\CursoTable;
use Escola\Service\Curso as CursoService;
use Escola\Service\Aluno as AlunoService;
use Escola\Service\User as UserService;
use EscolaAdmin\Form\Aluno as AlunoFrm;

class Module {

    public function getConfig() {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig() {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ . 'Admin' => __DIR__ . '/src/' . __NAMESPACE__ . "Admin",
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function onBootstrap($e) {
        $e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
                    $controller = $e->getTarget();
                    $controllerClass = get_class($controller);
                    $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
                    $config = $e->getApplication()->getServiceManager()->get('config');
                    if (isset($config['module_layouts'][$moduleNamespace])) {
                        $controller->layout($config['module_layouts'][$moduleNamespace]);
                    }
                }, 98);
    }
    public function getServiceConfig() {

        return array(
            'factories' => array(
                'Escola\Model\CursoService' => function($service) {
                    $dbAdapter = $service->get('Zend\Db\Adapter\Adapter');
                    $cursoTable = new CursoTable($dbAdapter);
                    $cursoService = new Model\CursoService($cursoTable);
                    return $cursoService;
                },
                'Escola\Service\Curso' => function($service) {
                    return new CursoService($service->get('Doctrine\ORM\EntityManager'));
                },
                'Escola\Service\Aluno' => function($service) {
                    return new AlunoService($service->get('Doctrine\ORM\EntityManager'));
                },
                'Escola\Service\User' => function($service) {
                    return new UserService($service->get('Doctrine\ORM\EntityManager'));
                },
                'EscolaAdmin\Form\Aluno' => function($service) {
                    $em = $service->get('Doctrine\ORM\EntityManager');
                    $repository = $em->getRepository('Escola\Entity\Curso');
                    $cursos = $repository->fetchPairs();
                    return new AlunoFrm(null, $cursos);
                },
            ),
        );
    }

    public function getViewHelperConfig() {
        return array(
            'invokables' => array(
                'UserIdentity' => new View\Helper\UserIdentity()
            )
        );
    }

}