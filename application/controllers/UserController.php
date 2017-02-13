<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->library('head');


}

    public function index()
    {
        $dados['metas'] = [
            "title" => "Leilomed, Medicamentos com os melhores preços",
            "description" => "Encontre os melhoeres preços no leilo med",
            "keywords" => "Medicamentos,leilão,leilão de medicamentos,google me ache"
        ];
        $dados['title'] = 'LeiloFarma';
        $dados['version'] = '1';
        $dados['page'] = 'estatisticas';
        $this->load->view('clients/home',$dados);
    }
    public function teste()
    {
        $dados['metas'] = [
            "title" => "Leilomed, Medicamentos com os melhores preços",
            "description" => "Encontre os melhoeres preços no leilo med",
            "keywords" => "Medicamentos,leilão,leilão de medicamentos"
        ];
        $dados['title'] = 'Leilo Med';
        $dados['version'] = '1';
        $dados['page'] = 'estatisticas';
        $this->load->view('clients/home',$dados);
    }

    public function produtoshome(){

        $this->load->view('clients/ajax/produtos/home');
    }
}
