<?php
class TarefaModel
{
    private $id;
    private $dataDeCriacao;
    private $dataDaTarefa;
    private $descricao;

    public function __construct($id, $dataDaTarefa, $dataDeCriacao, $descricao)
    {
        $this->id = $id;
        $this->dataDeCriacao = $dataDeCriacao;
        $this->dataDaTarefa = $dataDaTarefa;
        $this->descricao = $descricao;
    }

    public function getAll()
    {
        return [$this->id, $this->dataDeCriacao, $this->dataDaTarefa, $this->descricao];
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getDataTarefa()
    {
        return $this->dataDaTarefa;
    }

    public function getDataCriacao()
    {
        return $this->dataDeCriacao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function setDataTarefa($dataTarefa)
    {
        $this->dataDaTarefa = $dataTarefa;
    }

    public function setDataCriacao($dataCriacao)
    {
        $this->dataDeCriacao = $dataCriacao;
    }

}