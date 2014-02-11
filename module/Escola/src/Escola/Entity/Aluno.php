<?php

namespace Aluno\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="aluno")
 * @ORM\Entity(repositoryClass="Escola\Entity\AlunoRepository")
 */
class Aluno {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    protected $nome;

    /**
     * @ORM\ManyToOne(targetEntity="Escola\Entity\Curso", inversedBy="Alunos")
     * @ORM\JoinColumn(name="curso_id", referencedColumnName="id")
     */
    protected $curso;

    public function __construct($options = null) {
        Configurator::configure($this, $options);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
    }

    public function toArray() {
        return array(
            'id' => $this->getId(),
            'nome' => $this->getNome(),
            'curso' => $this->getCurso()->getId()
        );
    }

}