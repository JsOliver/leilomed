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
        if ($this->sessionsverify_model->logver() == true):

            $this->load->view('clients/ajax/account/meus-lances');
        endif;
    }

    public function farmaciassalvas()
    {
        if ($this->sessionsverify_model->logver() == true):

            $this->load->view('clients/ajax/account/farmacias-salvas');

        endif;
    }

    public function lancesfarma()
    {

        if ($this->sessionsverify_model->logver() == true):

            $this->load->view('clients/ajax/loja/lances');

        endif;
    }
    public function estoquefarma()
    {

        if ($this->sessionsverify_model->logver() == true):

            $this->load->view('clients/ajax/loja/estoque');

        endif;
    }

    public function historico()
    {

        if ($this->sessionsverify_model->logver() == true):

            $this->load->view('clients/ajax/account/historico');

        endif;
    }


    public function itenssalvos()
    {

        if ($this->sessionsverify_model->logver() == true):

            $this->load->view('clients/ajax/account/itens-salvos');

        endif;
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
        $upload = $this->functions_model->uploadimage('pp', 'id', 'profile_image', 'users', $_FILES['fileUpload'], $allowed, 3, $_SESSION['ID']);
        echo $upload;
    }

    public function uploadimageLoja()
    {
        $allowed = 'jpeg,jpge,jpg,png,gif';
        $upload = $this->functions_model->uploadimage('pp', 'id_dono', 'image_1', 'lojas', $_FILES['fileUploadLoja'], $allowed, 3, $_SESSION['ID']);
        echo $upload;
    }


    public function card()
    {

        if ($this->sessionsverify_model->logver() == false):

            if (isset($_COOKIE['card']) and !empty($_COOKIE['card'])):

                $dado['id_carrinho'] = $_COOKIE['card'];
                $dado['id_user'] = 0;
                $dado['id_produto'] = $_POST['produto'];
                $dado['qunt'] = $_POST['quantidade'];
                $dado['lance'] = $_POST['valor'];
                $dado['data_add'] = date('YmdHis');
                $this->db->insert('carrinho', $dado);

            else:

                $card = setcookie('card', date('YmdHis') . rand(2), time() + 3600 * 24 * 30 * 12 * 5, "/");
                $dado['id_carrinho'] = $card;
                $dado['id_user'] = 0;
                $dado['id_produto'] = $_POST['produto'];
                $dado['qunt'] = $_POST['quantidade'];
                $dado['lance'] = $_POST['valor'];
                $dado['data_add'] = date('YmdHis');
                $this->db->insert('carrinho', $dado);

            endif;

            echo 11;


        else:

            if (isset($_COOKIE['card']) and !empty($_COOKIE['card'])):

                $dado['id_carrinho'] = $_COOKIE['card'];
                $dado['id_user'] = $_SESSION['ID'];
                $dado['id_produto'] = $_POST['produto'];
                $dado['qunt'] = $_POST['quantidade'];
                $dado['lance'] = $_POST['valor'];
                $dado['data_add'] = date('YmdHis');
                $this->db->insert('carrinho', $dado);

            else:

                $card = setcookie('card', date('YmdHis') . rand(2), time() + 3600 * 24 * 30 * 12 * 5, "/");
                $dado['id_carrinho'] = $card;
                $dado['id_user'] = $_SESSION['ID'];
                $dado['id_produto'] = $_POST['produto'];
                $dado['lance'] = $_POST['valor'];
                $dado['qunt'] = $_POST['quantidade'];
                $dado['data_add'] = date('YmdHis');
                $this->db->insert('carrinho', $dado);

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

        elseif ($_GET['tp'] == 4):
            $database = 'lojas';

        else:
            $database = 'medicamentos';

        endif;
        $this->db->from($database);
        if ($_GET['tp'] == 4):

            $this->db->where('id_dono', addslashes($_GET['image']));

        else:

            $this->db->where('id', addslashes($_GET['image']));


        endif;
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

        elseif ($_GET['im'] == 44):
            echo $fetch[0]['image_1'];

        else:
            echo $fetch[0]['image_1'];


        endif;


    }

    public function cogs()
    {
        if ($this->sessionsverify_model->logver() == true):

            if (!empty($_POST['email']) and !empty($_POST['senha']) and !empty($_POST['nsenha']) and !empty($_POST['rnsenha'])):

                if ($_SESSION['EMAIL'] == $_POST['email']):

                    if (hash('whirlpool', md5(sha1($_POST['senha']))) == $_SESSION['PASS']):

                        if ($_POST['nsenha'] == $_POST['rnsenha']):

                            $dado['pass'] = hash('whirlpool', md5(sha1($_POST['nsenha'])));
                            $_SESSION['PASS'] = hash('whirlpool', md5(sha1($_POST['nsenha'])));
                            $this->db->where('id', $_SESSION['ID']);
                            if ($this->db->update('users', $dado)):

                                echo '<b class="text-success">Dados Alterados com Sucesso.</b>';


                            else:

                                echo '<b class="text-danger">Erro ao Alterar Senhas.</b>';

                            endif;

                        else:

                            echo '<b class="text-info">As Senhas não Coincidem.</b>';

                        endif;


                    else:
                        echo '<b class="text-warning">Email atual Incorreta.</b>';


                    endif;


                else:
                    echo '<b class="text-warning">Email incorreto.</b>';


                endif;

            else:
                echo 'Nenhum Campo Pode Ficar em Branco';
            endif;

        endif;
    }

    public function alts()
    {
        if ($this->sessionsverify_model->logver() == true):

            if (isset($_POST['type']) and isset($_POST['valor'])):

                $valor = $_POST['valor'];

                if ($_POST['type'] == 0):
                    $dado['firstname'] = $valor;
                    $this->db->where('id', $_SESSION['ID']);
                    if ($this->db->update('users', $dado)):
                        echo 1;
                    else:
                        echo 2;

                    endif;


                elseif ($_POST['type'] == 1):

                    $dado['email_contato'] = $valor;
                    $this->db->where('id', $_SESSION['ID']);
                    if ($this->db->update('users', $dado)):
                        echo 1;
                    else:
                        echo 2;

                    endif;

                elseif ($_POST['type'] == 2):

                    $dado['telefone'] = $valor;
                    $this->db->where('id', $_SESSION['ID']);
                    if ($this->db->update('users', $dado)):
                        echo 1;
                    else:
                        echo 2;

                    endif;

                elseif ($_POST['type'] == 3):

                    $dado['endereco'] = $valor;
                    $this->db->where('id', $_SESSION['ID']);
                    if ($this->db->update('users', $dado)):
                        echo 1;
                    else:
                        echo 2;

                    endif;
                else:

                endif;

            endif;

        endif;
    }

    public function maps()
    {


        if ($this->sessionsverify_model->logver() == true):

            if (!empty($_POST['country']) and !empty($_POST['state']) and !empty($_POST['city']) and !empty($_POST['address']) and !empty($_POST['latitude']) and !empty($_POST['longitude'])):

                $dado['pais'] = $_POST['country'];
                $dado['estado'] = $_POST['state'];
                $dado['cidade'] = $_POST['city'];
                $dado['address'] = $_POST['address'];
                $dado['lat'] = $_POST['latitude'];
                $dado['long'] = $_POST['longitude'];
                $this->db->where('id', $_SESSION['ID']);
                $this->db->update('users', $dado);

            endif;

        else:

        endif;
    }

    public function addfarma()
    {


        if ($this->sessionsverify_model->logver() == true):

            if (empty($_POST['pais']) or empty($_POST['estado']) or empty($_POST['cidade']) or empty($_POST['endereco']) or empty($_POST['emailcn']) or empty($_POST['telefone']) or empty($_POST['nome']) or empty($_POST['cep'])):


                echo 'Nenhum Campo Pode Ficar Vazio.';

            else:

                $this->db->from('lojas');
                $this->db->where('nome_loja', $_POST['nome']);
                $this->db->where('estado', $_POST['estado']);
                $this->db->where('cidade', $_POST['cidade']);
                $this->db->where('cep', $_POST['cep']);
                $query = $this->db->get();
                $count = $query->num_rows();
                if ($count > 0):
                    $fetch = $query->result_array();

                    echo 'Já Existe uma Farmacia com o nome <a target="_blank" href="' . base_url('loja/' . str_replace(' ', '-', strtolower($fetch[0]['nome_loja'])) . '/' . $fetch[0]['id_loja']) . '" style="color:#a10f2b; font-weight: bold;">' . $fetch[0]['nome_loja'] . '</a> cadastrada na sua região.';

                else:

                    $dado['pais'] = $_POST['pais'];
                    $dado['estado'] = $_POST['estado'];
                    $dado['cidade'] = $_POST['cidade'];
                    $dado['rua'] = $_POST['endereco'];
                    $dado['id_dono'] = $_SESSION['ID'];
                    $dado['email_contato'] = $_POST['emailcn'];
                    $dado['email'] = $_SESSION['EMAIL'];
                    $dado['telefone'] = $_POST['telefone'];
                    $dado['data_add'] = date('YmdHis');
                    $dado['nome_loja'] = $_POST['nome'];
                    $dado['pais_uf'] = 'BR';
                    $dado['pais'] = $_POST['pais'];
                    $dado['cep'] = $_POST['cep'];
                    if ($this->db->insert('lojas', $dado)):
                        $dados['loja'] = $this->db->insert_id();
                        $this->db->where('id', $_SESSION['ID']);
                        if ($this->db->update('users', $dados)):

                            $data['title'] = 'Você Adicionou a ' . $_POST['nome'] . ' no LeiloMed. ';
                            $data['id_user'] = $_SESSION['ID'];
                            $data['tpnotific'] = '2';
                            $data['id_loja'] = $this->db->insert_id();
                            $data['data'] = date('YmdHis');
                            $data['url_notificacao'] = base_url('minha-loja?pg=notificacao');
                            $this->db->insert('notificacoes', $data);

                            echo 11;

                        else:

                            echo 'Erro Ao Salvar os Dados, Tente Mais Tarde.';

                        endif;

                    else:
                        echo 'Erro Ao Salvar os Dados, Tente Mais Tarde.';

                    endif;


                endif;


            endif;
        endif;

    }
}