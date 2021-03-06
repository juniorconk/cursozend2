<?php

namespace Escola\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="aluno")
 * @ORM\Entity(repositoryClass="Escola\Entity\AlunoRepository")
 */
class Aluno {

    /**
     * @ORM\Id
     * @ORM\Column(name="id_aluno",type="integer")
     * @ORM\GeneratedValue
     * @ORM\SequenceGenerator(sequenceName="aluno_id_seq")
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
     * @ORM\JoinColumn(name="curso", referencedColumnName="id_curso")
     */
    protected $curso;

    public function __construct($options = null) {
        Configurator::configure($this, $options);
        $this->curso = new ArrayCollection();
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
