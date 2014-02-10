<?php

namespace EscolaAdmin\Controller;


class CursosController extends CrudController {
    public function __construct() {
        $this->entity = "Escola\Entity\Curso";
        $this->form = "EscolaAdmin\Form\Curso";
        $this->service = "Escola\Service\Curso";
        $this->controller = "cursos";
        $this->route = "escola-admin";
    }
    
}