<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AjaxControler extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sessionsverify_model');
        $this->load->model('cadastro_model');
        $this->load->model('functions_model');


    }

    public function produtoshome()
    {

        $this->load->view('clients/ajax/produtos/home');
    }

    public function meuslances()
    {

        $this->load->view('clients/ajax/account/meus-lances');
    }

    public function farmaciassalvas()
    {

        $this->load->view('clients/ajax/account/farmacias-salvas');
    }

    public function historico()
    {

        $this->load->view('clients/ajax/account/historico');
    }

    public function itenssalvos()
    {

        $this->load->view('clients/ajax/account/itens-salvos');
    }

    public function ajaxCadastro()
    {

        if ($this->sessionsverify_model->logver() == false):


            if (isset($_POST['nome']) and isset($_POST['emailcad']) and isset($_POST['passcad']) and isset($_POST['telefone'])):


                if ($this->cadastro_model->cadastro(1, $_POST['emailcad'], $_POST['passcad'], '', $_POST['nome'], $_POST['telefone']) == 11):
                    echo 11;
                else:
                    echo $this->cadastro_model->cadastro(1, $_POST['emailcad'], $_POST['passcad'], '', $_POST['nome'], $_POST['telefone']);

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


    public function uploadimage()
    {
        $allowed = 'jpeg,jpge,jpg,png,gif';
        $upload = $this->functions_model->uploadimage('pp', 'id', 'profile_image', 'users', $_FILES['fileUpload'], $allowed, 3);
        echo $upload;
    }

    public function exibir()
    {

        if ($_GET['tp'] == 1):
            $database = 'medicamentos';

        elseif ($_GET['tp'] == 2):
            $database = 'users';

        else:
            $database = 'medicamentos';

        endif;
        $this->db->from($database);
        $this->db->where('id', addslashes($_GET['image']));
        $query = $this->db->get();
        $fetch = $query->result_array();
        header("content-type: jpg");
        if ($_GET['im'] == 1):
            echo $fetch[0]['image_1'];

        elseif ($_GET['im'] == 2):
            echo $fetch[0]['image_2'];


        elseif ($_GET['im'] == 3):

            echo $fetch[0]['image_3'];

        elseif ($_GET['im'] == 4):


            echo $fetch[0]['image_4'];

        elseif ($_GET['im'] == 22):
            echo $fetch[0]['profile_image'];

        else:
            echo $fetch[0]['image_1'];


        endif;


    }
}