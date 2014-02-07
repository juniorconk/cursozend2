<?php

namespace EscolaAdmin\Form;

use Zend\Form\Form,
    Zend\Form\Element\Select;

class Aluno extends Form {
    
    protected $cursos;

    public function __construct($name = null, array $categorias = null) {
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
        
        $categoria = new Select();
        $categoria->setLabel("Curso")
                ->setName("curso")
                ->setOptions(array('value_options' => $this->categorias)
        );
        $this->add($curso);

        $this->add(array(
            'name' => 'autor',
            'options' => array(
                'type' => 'text',
                'label' => 'Autor'
            ),
            'attributes' => array(
                'id' => 'autor',
                'placeholder' => 'Entre com o autor'
            ),
        ));
        
        $this->add(array(
            'name' => 'isbn',
            'options' => array(
                'type' => 'text',
                'label' => 'ISBN'
            ),
            'attributes' => array(
                'id' => 'isbn',
                'placeholder' => 'Entre com o ISBN'
            ),
        ));
        
        $this->add(array(
            'name' => 'valor',
            'options' => array(
                'type' => 'text',
                'label' => 'Valor'
            ),
            'attributes' => array(
                'id' => 'valor',
                'placeholder' => 'Entre com o Valor'
            ),
        ));
        
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