<?php

namespace EscolaAdmin\Form;

use Zend\InputFilter\InputFilter;

class CursoFilter extends InputFilter {

    public function __construct() {
        $this->add(array(
            'name' => 'nome',
            'required' => TRUE,
            'filters' => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim')
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'options' => array(
                        'messages' => array('isEmpty'=>'Nome nao pode estar em branco'),
                        )
                )
            )
        ));
    }

}
