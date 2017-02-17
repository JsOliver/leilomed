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
        $dados['page'] = 'home';
        $this->load->view('clients/home',$dados);
    }
    public function produto()
    {
        $dados['metas'] = [
            "title" => "Comprar ".ucwords(str_replace('-',' ',$this->uri->segment(2)))." na MedFarma",
            "description" => "Compre ".$this->uri->segment(2)."",
            "keywords" => "Medicamentos,leilão,leilão de medicamentos,".ucwords(str_replace('-',' ',$this->uri->segment(2))).""
        ];
        $dados['title'] = 'Comprar '. ucwords(str_replace('-',' ',$this->uri->segment(2))).'';
        $dados['version'] = '1';
        $dados['page'] = 'produtos';
        $this->load->view('clients/produto',$dados);
    }

    public function logcad(){
        $dados['metas'] = [
            "title" => "Leilomed, Medicamentos com os melhores preços",
            "description" => "Encontre os melhoeres preços no leilo med",
            "keywords" => "Medicamentos,leilão,leilão de medicamentos,google me ache"
        ];
        $dados['title'] = 'LeiloFarma';
        $dados['version'] = '1';
        $dados['page'] = 'logcad';
        $this->load->view('clients/acesso/logcad',$dados);
    }

    public function produtoshome(){

        $this->load->view('clients/ajax/produtos/home');
    }


}
