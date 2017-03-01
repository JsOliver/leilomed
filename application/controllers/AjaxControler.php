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

        @session_start();

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


    public function card()
    {

            if ($this->sessionsverify_model->logver() == false):

                if(isset($_COOKIE['card']) and !empty($_COOKIE['card'])):

                    $dado['id_carrinho'] = $_COOKIE['card'];
                    $dado['id_user'] = 0;
                    $dado['id_produto'] = $_POST['produto'];
                    $dado['qunt'] = $_POST['quantidade'];
                    $dado['lance'] = $_POST['valor'];
                    $dado['data_add'] = date('YmdHis');
                    $this->db->insert('carrinho',$dado);

                    else:

                       $card = setcookie('card', date('YmdHis').rand(2), time()+3600*24*30*12*5, "/");
                        $dado['id_carrinho'] = $card;
                        $dado['id_user'] = 0;
                        $dado['id_produto'] = $_POST['produto'];
                        $dado['qunt'] = $_POST['quantidade'];
                        $dado['lance'] = $_POST['valor'];
                        $dado['data_add'] = date('YmdHis');
                        $this->db->insert('carrinho',$dado);

                        endif;

                echo 11;


            else:

                if(isset($_COOKIE['card']) and !empty($_COOKIE['card'])):

                    $dado['id_carrinho'] = $_COOKIE['card'];
                    $dado['id_user'] = $_SESSION['ID'];
                    $dado['id_produto'] = $_POST['produto'];
                    $dado['qunt'] = $_POST['quantidade'];
                    $dado['lance'] = $_POST['valor'];
                    $dado['data_add'] = date('YmdHis');
                    $this->db->insert('carrinho',$dado);

                else:

                    $card = setcookie('card', date('YmdHis').rand(2), time()+3600*24*30*12*5, "/");
                    $dado['id_carrinho'] = $card;
                    $dado['id_user'] = $_SESSION['ID'];
                    $dado['id_produto'] = $_POST['produto'];
                    $dado['lance'] = $_POST['valor'];
                    $dado['qunt'] = $_POST['quantidade'];
                    $dado['data_add'] = date('YmdHis');
                    $this->db->insert('carrinho',$dado);

                endif;

                echo 11;

            endif;


    }

    public function lance()
    {

        if ($this->sessionsverify_model->logver() == true):

            $this->db->from('produtos_disponiveis');
            $this->db->where('id_pdp', $_POST['produto']);
            $get = $this->db->get();
            $count = $get->num_rows();
            if ($count > 0):
                $result = $get->result_array();
                $unidade = $result[0]['unidades'];
                if ($unidade >= $_POST['quantidade'] or empty($unidade)):
                    $data['id_produto'] = $_POST['produto'];
                    $data['cod_produto'] = $_POST['codigo'];
                    $data['id_cliente'] = $_SESSION['ID'];
                    $data['unidades'] = $_POST['quantidade'];
                    $data['id_loja'] = $_POST['loja'];
                    $data['data_lance'] = date('YmdHis');
                    $data['status'] = '1';
                    $data['valor'] = $_POST['valor'];
                    $this->db->insert('lances', $data);

                    $datans['id_lance'] = $this->db->insert_id();
                    $datans['nome'] = $_SESSION['NAME'];
                    $datans['email'] = $_SESSION['EMAIL'];
                    $datans['telefone'] = $_SESSION['TEL'];
                    $datans['data_lance'] = date('YmdHis');
                    $datans['ip_user'] = $_SERVER["REMOTE_ADDR"];
                    $this->db->insert('lances_users_dados', $datans);

                else:
                    echo 'Quantidade em estoque limite atingida. Escolha entre 1 e ' . $unidade . ' unidades.';
                endif;


            endif;


            echo 11;

        elseif ($this->sessionsverify_model->logver() == false):

            $this->db->from('produtos_disponiveis');
            $this->db->where('id_pdp', $_POST['produto']);
            $get = $this->db->get();
            $count = $get->num_rows();
            if ($count > 0):
                $result = $get->result_array();
                $unidade = $result[0]['unidades'];
                if ($unidade >= $_POST['quantidade'] or empty($unidade)):
                    $data['id_produto'] = $_POST['produto'];
                    $data['cod_produto'] = $_POST['codigo'];
                    $data['id_cliente'] = 0;
                    $data['unidades'] = $_POST['quantidade'];
                    $data['id_loja'] = $_POST['loja'];
                    $data['data_lance'] = date('YmdHis');
                    $data['status'] = '1';
                    $data['valor'] = $_POST['valor'];
                    $this->db->insert('lances', $data);

                    $datans['id_lance'] = $this->db->insert_id();
                    $datans['nome'] = $_POST['nome'];
                    $datans['email'] = $_POST['email'];
                    $datans['telefone'] = $_POST['telefone'];
                    $datans['data_lance'] = date('YmdHis');
                    $datans['ip_user'] = $_SERVER["REMOTE_ADDR"];
                    $this->db->insert('lances_users_dados', $datans);

                else:
                    echo 'Quantidade em estoque limite atingida. Escolha entre 1 e ' . $unidade . ' unidades.';
                endif;


            endif;


            echo 11;


        endif;


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