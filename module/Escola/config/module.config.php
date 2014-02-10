<?php

namespace Escola;

return array(
    'router' => array(
        'routes' => array(
            'escola-home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/escola',
                    'defaults' => array(
                        'controller' => 'Escola\Controller\Index',
                        'action' => 'index',
                    ),
                ),
            ),
            'escola-admin-interna' => array(
                'type'=> 'Segment',
                'options' => array(
                    'route' => '/admin/[:controller[/:action]][/:id]',
                    'constraints' =>array(
                        'id'=> '[0-9]+'
                    )
                ),
            ),
            'escola-admin' => array(
                'type'=> 'Segment',
                'options' => array(
                    'route' => '/admin/[:controller[/:action][/page/:page]]',
                    'defaults' => array(
                        'action' => 'index',
                        'page' => 1
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Escola\Controller\Index' => 'Escola\Controller\IndexController',
            'cursos' => 'EscolaAdmin\Controller\CursosController',
            'livros' => 'EscolaAdmin\Controller\AlunosController',
            'Users' => 'EscolaAdmin\Controller\UsersController',
            ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'escola/index/index' => __DIR__ . '/../view/escola/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class'=>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache'=>'array',
                    'paths' => array(__DIR__ . '/../src/'.__NAMESPACE__ .'/Entity')
                ),
                'orm_default' => array(
                    'drivers' => array(
                        __NAMESPACE__ .  '\Entity' => __NAMESPACE__ . '_driver'
                    ),
                ),
            ),
        ),
);
