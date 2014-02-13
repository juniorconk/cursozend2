<?php

namespace EscolaAdmin\Form;

use Zend\Form\Form,
    Zend\Form\Element\Select;

class Aluno extends Form {
    
    protected $cursos;

    public function __construct($name = null, array $cursos = null) {
        parent::__construct('aluno');
        $this->cursos  = $cursos;

        $this->setAttribute('method', 'post');
//        $this->setInputFilter(new LivroFilter);

        $this->add(array(
            'name' => 'id',
            'attibutes' => array(
                'type' => 'hidden'
            )
        ));

        $this->add(array(
            'name' => 'nome',
            'options' => array(
                'type' => 'text',
                'label' => 'Nome'
            ),
            'attributes' => array(
                'id' => 'nome',
                'placeholder' => 'Entre com o nome'
            )
        ));
        
        $cursos = new Select();
        $cursos->setLabel("Curso")
                ->setName("curso")
                ->setOptions(array('value_options' => $this->cursos)
        );
        $this->add($cursos);
    
        $this->add(array(
            'name' => 'submit',
            'type' => 'Zend\Form\Element\Submit',
            'attributes' => array(
                'value' => 'Salvar',
                'class' => 'btn-success'
            )
        ));
    }

}