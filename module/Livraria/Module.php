<?php

namespace Livraria;

use Zend\ModuleRouteListener,
    Zend\Mvc\MvcEvent;
use Livraria\Model\CategoriaTable;
use Livraria\Service\Categoria as CategoriaService;
use Livraria\Service\Livro as LivroService;
use Livraria\Service\User as UserService;
use LivrariaAdmin\Form\Livro as LivroFrm;

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

    public function getServiceConfig() {

        return array(
            'factories' => array(
                'Livraria\Model\CategoriaService' => function($service) {
            $dbAdapter = $service->get('Zend\Db\Adapter\Adapter');
            $categoriaTable = new CategoriaTable($dbAdapter);
            $categoriaService = new Model\CategoriaService($categoriaTable);
            return $categoriaService;
        },
                'Livraria\Service\Categoria' => function($service) {
            return new CategoriaService($service->get('Doctrine\ORM\EntityManager'));
        },
                'Livraria\Service\Livro' => function($service) {
            return new LivroService($service->get('Doctrine\ORM\EntityManager'));
        },
                'Livraria\Service\User' => function($service) {
            return new UserService($service->get('Doctrine\ORM\EntityManager'));
        },
                'LivrariaAdmin\Form\Livro' => function ($service) {
            $em = $service->get('Doctrine\ORM\EntityManager');
            $repository = $em->getRepository('Livraria\Entity\Categoria');
            $categorias = $repository->fetchPairs();
            return new LivroFrm(null, $categorias);
        },
            ),
        );
    }

}
