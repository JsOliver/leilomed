<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxControler extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sessionsverify_model');
        $this->load->model('cadastro_model');


    }

    public function produtoshome(){

        $this->load->view('clients/ajax/produtos/home');
    }
    public function meuslances(){

        $this->load->view('clients/ajax/account/meus-lances');
    }

    public function farmaciassalvas(){

        $this->load->view('clients/ajax/account/farmacias-salvas');
    }

    public function historico(){

        $this->load->view('clients/ajax/account/historico');
    }
    public function itenssalvos(){

        $this->load->view('clients/ajax/account/itens-salvos');
    }
    public function ajaxCadastro()
    {

        if ($this->sessionsverify_model->logver() == false):


            if (isset($_POST['nome']) and isset($_POST['emailcad']) and isset($_POST['passcad']) and isset($_POST['telefone']) ):


                if ($this->cadastro_model->cadastro(1, $_POST['emailcad'], $_POST['passcad'], '', $_POST['nome'],$_POST['telefone']) == 11):
                    echo 11;
                else:
                    echo $this->cadastro_model->cadastro(1, $_POST['emailcad'], $_POST['passcad'], '', $_POST['nome'],$_POST['telefone']);

                endif;
            endif;
        endif;

    }

    public function ajaxLogin()
    {
        if ($this->sessionsverify_model->logver() == false):

            if (isset($_POST['emaillog']) and isset($_POST['passlog'])):

                echo $this->cadastro_model->login(1, $_POST['emaillog'], $_POST['passlog'], '');

            endif;
        endif;


    }
}