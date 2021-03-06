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
        $this->load->library('email');
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

    public function adicionar()
    {

        if ($this->sessionsverify_model->logver() == true):

            $this->db->from('users');
            $this->db->where('id', $_SESSION['ID']);
            $get = $this->db->get();
            $count = $get->num_rows();
            if ($count > 0):
                $result = $get->result_array();
                $loja = $result[0]['loja'];
                if (!empty($loja) and $loja > 0):

                    $this->load->view('clients/ajax/loja/adicionar');

                endif;
            endif;
        endif;
    }

    public function additenscampo()
    {

        if ($this->sessionsverify_model->logver() == true):

            $this->db->from('users');
            $this->db->where('id', $_SESSION['ID']);
            $get = $this->db->get();
            $count = $get->num_rows();
            if ($count > 0):
                $result = $get->result_array();
                $loja = $result[0]['loja'];
                if (!empty($loja) and $loja > 0):

                    $this->load->view('clients/ajax/loja/listaProdutos');

                endif;
            endif;
        endif;
    }

    public function meusprodutos()
    {

        if ($this->sessionsverify_model->logver() == true):

            $this->db->from('users');
            $this->db->where('id', $_SESSION['ID']);
            $get = $this->db->get();
            $count = $get->num_rows();
            if ($count > 0):
                $result = $get->result_array();
                $loja = $result[0]['loja'];
                if (!empty($loja) and $loja > 0):

                    $this->load->view('clients/ajax/loja/prodsestoque');

                endif;
            endif;
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


    public function actionpedido()
    {
        if ($this->sessionsverify_model->logver() == true):

            $this->db->from('users');
            $this->db->where('id', $_SESSION['ID']);
            $get = $this->db->get();
            $count = $get->num_rows();

            if ($count > 0):


                if ($_POST['action'] == 1):
                    $dado['status'] = 4;
                    $dado['resposta'] = 1;
                    $this->db->where('id', $_POST['pedido']);
                    $this->db->where('id_cliente ', $_SESSION['ID']);
                    $this->db->update('lances', $dado);
                    echo 11;

                endif;

                if ($_POST['action'] == 2):

                    $this->db->where('id', $_POST['pedido']);
                    $this->db->where('resposta <', 2);
                    $this->db->where('id_cliente ', $_SESSION['ID']);
                    $this->db->delete('lances');
                    echo 11;

                endif;

            endif;
        endif;
    }

    public function removelistaped()
    {
        if ($this->sessionsverify_model->logver() == true):

            $this->db->from('users');
            $this->db->where('id', $_SESSION['ID']);
            $get = $this->db->get();
            $count = $get->num_rows();

            if ($count > 0):

                $result = $get->result_array();

                $dado['status'] = '5';
                $this->db->where('id_loja', $result[0]['loja']);
                $this->db->where('id', $_POST['pedido']);
                $this->db->update('lances', $dado);


            endif;

        endif;

    }

    public function ajaxupdadopd($tipo, $idxml)
    {
        if (isset($tipo) and isset($idxml) and !empty($tipo) and !empty($idxml)):

            if ($tipo == 1):

                $this->db->from('xmlfiles');
                $this->db->where('id', $idxml);
                $get = $this->db->get();
                $count = $get->num_rows();

                if ($count > 0):

                    $result = $get->result_array();

                    $dado = simplexml_load_string($result[0]['xmlFile']);

                    foreach ($dado as $dds) {

                        if (!empty($dds->nome) or empty($dds->formula) or empty($dds->substancia) or empty($dds->categoria) or empty($dds->laboratorio) or empty($dds->fixacal) or empty($dds->preco)):


                            $nome = $dds->nome;
                            $formula = $dds->formula;
                            $substancia = $dds->substancia;
                            $preco = $dds->preco;
                            $desconto = $dds->desconto;
                            $categoria = $dds->categoria;
                            $laboratorio = $dds->laboratorio;
                            $unidades = $dds->unidades;
                            $fixacal = $dds->fixacal;
                            $imagem1 = $dds->imagem1;
                            $imagem2 = $dds->imagem2;
                            $imagem3 = $dds->imagem3;
                            $imagem4 = $dds->imagem4;
                            $miligramas = $dds->opcional->miligramas;
                            $indicacoes = $dds->opcional->indicacoes;
                            $contra_indicacoes = $dds->opcional->contraIndicacoes;
                            $posologia = $dds->opcional->posologia;
                            $CaracteristicasFarmacologicas = $dds->opcional->CaracteristicasFarmacologicas;
                            $armazenagem = $dds->opcional->armazenagem;

                            $keyword = str_replace(' ', ',', $nome) . ',' . str_replace(' ', ',', $laboratorio) . ',' . str_replace(' ', ',', $formula) . ',' . str_replace(' ', ',', $substancia) . ',' . $nome . ',' . $formula . ',' . $substancia . ',' . $laboratorio;


                            if (!empty($imagem1)):
                                $dada['image_1'] = @file_get_contents(addslashes($imagem1));
                            endif;

                            if (!empty($imagem2)):
                                $dada['image_2'] = @file_get_contents(addslashes($imagem2));
                            endif;

                            if (!empty($imagem3)):
                                $dada['image_3'] = @file_get_contents(addslashes($imagem3));
                            endif;

                            if (!empty($imagem4)):
                                $dada['image_4'] = @file_get_contents(addslashes($imagem4));
                            endif;
                            $dada['keywords'] = $keyword;
                            $dada['marca'] = $laboratorio;
                            $dada['nome'] = $nome;
                            $dada['substancia'] = $substancia;
                            $dada['tipo'] = 1;
                            $dada['add_by'] = $_SESSION['ID'];
                            $dada['miligramas'] = $miligramas;
                            $dada['fixa_cal'] = $fixacal;
                            $dada['indicacoes'] = $indicacoes;
                            $dada['contra_indicacoes'] = $contra_indicacoes;
                            $dada['posologia'] = $posologia;
                            $dada['caracteristicas_farmacologicas'] = $CaracteristicasFarmacologicas;
                            $dada['armazenagem'] = $armazenagem;
                            $dada['data_add'] = date('YmdHis');

                            $this->db->from('categorias');
                            $this->db->like('nome', $categoria);
                            $get = $this->db->get();
                            $count = $get->num_rows();
                            if ($count > 0):
                                $result = $get->result_array();
                                $categorias = $result[0]['id'];
                                $dada['categorias'] = $categorias;

                            endif;
                            if ($this->db->insert('medicamentos', $dada)):
                                $medid = $this->db->insert_id();
                                $this->db->from('users');
                                $this->db->where('id', $_SESSION['ID']);
                                $get = $this->db->get();
                                $count = $get->num_rows();
                                if ($count > 0):

                                    $result = $get->result_array();
                                    if (!empty($imagem1)):
                                        $dados['image_1'] = @file_get_contents(addslashes($imagem1));
                                    endif;

                                    if (!empty($imagem2)):
                                        $dados['image_2'] = @file_get_contents(addslashes($imagem2));
                                    endif;

                                    $dados['keywords'] = $keyword;
                                    $dados['id_produto'] = $medid;
                                    $dados['nome_prod'] = $nome;
                                    $dados['cod_produto'] = '#MD0' . $this->db->insert_id();
                                    $dados['preco'] = $preco;
                                    $dados['desconto'] = $desconto;

                                    $this->db->from('users');
                                    $this->db->where('id', $_SESSION['ID']);
                                    $get = $this->db->get();
                                    if ($get->num_rows() > 0):
                                        $resultlj = $get->result_array();
                                        $dados['id_loja'] = $resultlj[0]['loja'];
                                    endif;


                                    $dados['unidades'] = $unidades;
                                    $dados['pesquisas_farma'] = 0;
                                    $dados['visible'] = 1;
                                    $dados['data_adicionado'] = date('YmdHis');


                                    $this->db->from('categorias');
                                    $this->db->like('nome', $categoria);
                                    $get = $this->db->get();
                                    $count = $get->num_rows();
                                    if ($count > 0):
                                        $result = $get->result_array();
                                        $categorias = $result[0]['id'];
                                        $dados['categorias'] = $categorias;
                                        if ($this->db->insert('produtos_disponiveis', $dados)):

                                            echo 11;
                                        else:
                                            echo 0;
                                        endif;


                                    endif;
                                else:
                                    echo 0;
                                endif;

                            else:
                                echo 0;

                            endif;
                        else:
                            echo 0;
                        endif;


                    }

                else:

                    echo '0';

                endif;
            else:

                echo '0';
            endif;
        else:

            echo '0';
        endif;

    }

    public function uploadXML()
    {
        $allowed = 'xml';
        $upload = $this->functions_model->uploadimage('xml', $_SESSION['ID'], 'xmlFile', 'xmlfiles', $_FILES['xmlFileUpload'], $allowed, 200, $_SESSION['ID']);
        if ($upload > 0):
            echo $this->ajaxupdadopd(1, $upload);
        else:
            echo 'Erro ao Enviar Dados';
        endif;
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
                if ($unidade >= $_POST['quantidade'] or $unidade == '--' or empty($unidade)):

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

    public function ajaxdeletestore()
    {
        if ($this->sessionsverify_model->logver() == true):

            $this->db->from('users');
            $this->db->where('id', $_SESSION['ID']);
            $get = $this->db->get();
            $count = $get->num_rows();
            if ($count > 0):
            $result = $get->result_array();

            $this->db->where('id_loja',$result[0]['loja']);
            $this->db->delete('lojas');


            $this->db->where('id_loja',$result[0]['loja']);
            $this->db->delete('produtos_disponiveis');

                $this->db->where('id_loja',$result[0]['loja']);
            $this->db->delete('produtos_disponiveis');

                $this->db->where('id_loja',$result[0]['loja']);
            $this->db->delete('lances');
                $ddsa['loja'] = '0';
                $this->db->where('id',$_SESSION['ID']);
                $this->db->update('users',$ddsa);

            echo 11;
                endif;
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

        elseif ($_GET['tp'] == 5):
            $database = 'produtos_disponiveis';

        else:
            $database = 'medicamentos';

        endif;
        $this->db->from($database);
        if ($_GET['tp'] == 4):

            $this->db->where('id_dono', addslashes($_GET['image']));

        elseif ($_GET['tp'] == 5):

            $this->db->where('id_pdp', addslashes($_GET['image']));

        else:

            $this->db->where('id', addslashes($_GET['image']));


        endif;
        $query = $this->db->get();
        $fetch = $query->result_array();
        header("content-type: jpg");

        if ($_GET['im'] == 1):
            $imagefim = $fetch[0]['image_1'];

        elseif ($_GET['im'] == 2):
            $imagefim = $fetch[0]['image_2'];


        elseif ($_GET['im'] == 3):

            $imagefim = $fetch[0]['image_3'];

        elseif ($_GET['im'] == 4):


            $imagefim = $fetch[0]['image_4'];

        elseif ($_GET['im'] == 22):
            $imagefim = $fetch[0]['profile_image'];

        elseif ($_GET['im'] == 44):
            $imagefim = $fetch[0]['image_1'];

        else:
            $imagefim = $fetch[0]['image_1'];


        endif;
        echo $imagefim;


    }

    public function readitem()
    {
        if ($this->sessionsverify_model->logver() == true):


            if (isset($_POST['identidade'])):

                $this->db->from('users');
                $this->db->where('id', $_SESSION['ID']);
                $get = $this->db->get();
                $count = $get->num_rows();
                if ($count > 0):

                    $result = $get->result_array();

                    $this->db->from('lances');
                    $this->db->where('id', $_POST['identidade']);
                    $this->db->where('id_loja', $result[0]['loja']);
                    $get = $this->db->get();
                    if ($get->num_rows()):

                        $dado['status'] = 3;
                        $this->db->where('id', $_POST['identidade']);
                        if ($this->db->update('lances', $dado)):
                            echo 1;
                        else:
                            echo 0;
                        endif;

                    endif;
                else:
                    echo 0;

                endif;
            else:
                echo $_POST['identidade'];
            endif;

        endif;
    }


    public function respostaitem()
    {
        if ($this->sessionsverify_model->logver() == true):


            if (isset($_POST['resposta']) and isset($_POST['produto'])):

                $this->db->from('users');
                $this->db->where('id', $_SESSION['ID']);
                $get = $this->db->get();
                $count = $get->num_rows();
                if ($count > 0):

                    $result = $get->result_array();

                    $this->db->from('lances');
                    $this->db->where('id', $_POST['produto']);
                    $this->db->where('id_loja', $result[0]['loja']);
                    $get = $this->db->get();
                    if ($get->num_rows()):

                        $result1 = $get->result_array();

                        $dado['status'] = '4';
                        $dado['loja_read'] = '4';
                        if (isset($_POST['resposta'])):
                            $dado['resposta'] = $_POST['resposta'] + 1;
                        endif;
                        $this->db->from('produtos_disponiveis');
                        $this->db->where('id_produto', $_POST['produto']);
                        $this->db->where('id_loja', $result[0]['loja']);
                        $get = $this->db->get();
                        $count2 = $get->num_rows();
                        if ($count2 > 0):
                            $result2 = $get->result_array();
                            $unidades = $result1[0]['unidades'];
                            $unidadesAtuais = $result2[0]['unidades'];
                            if ($unidades - $unidadesAtuais <= 0):
                                $novounidades = 0;
                            else:

                                $novounidades = $unidades - $unidadesAtuais;

                            endif;

                        else:
                            $novounidades = 0;
                        endif;

                        $this->db->where('id', $_POST['produto']);
                        $this->db->where('resposta', 0);
                        $this->db->update('lances', $dado);
                        $dadol['unidades'] = $novounidades;
                        $this->db->where('id_produto', $_POST['produto']);
                        $this->db->where('id_loja', $result[0]['loja']);
                        $this->db->update('produtos_disponiveis', $dadol);

                        if ($_POST['resposta'] == 0):

                            $title = 'Lance Recusado Pelo Vendedor.';
                        else:

                            $title = 'Lance Aceito Pelo Vendedor.';

                        endif;
                        $dodon['title'] = $title;
                        $dodon['id_user'] = $result1[0]['id_cliente'];
                        $dodon['tpnotific'] = '3';
                        $dodon['id_loja'] = $result1[0]['id_loja'];
                        $dodon['data'] = date('YmdHis');
                        $dodon['url_notificacao'] = base_url('meus-lances?pg=notificacao');
                        $this->db->insert('notificacoes', $dodon);
                        /*
                                                //Inicia o processo de configuração para o envio do email
                                                $config['protocol'] = 'mail'; // define o protocolo utilizado
                                                $config['wordwrap'] = TRUE; // define se haverá quebra de palavra no texto
                                                $config['validate'] = TRUE; // define se haverá validação dos endereços de email
                        */

                        echo 11;


                    endif;
                else:
                    echo 0;

                endif;
            else:
                echo 0;
            endif;
        else:
            echo 0;

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


                            $datact['nome'] = $_POST['nome'];
                            $datact['titulo'] = 'Catálogo ' . $_POST['nome'];
                            $datact['tipo'] = 2;
                            $datact['data_add'] = date('YmdHis');
                            $datact['data_add'] = date('YmdHis');
                            $datact['add_by'] = $_SESSION['ID'];
                            $this->db->insert('categorias', $datact);

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

    public function adicionaritemlj()
    {
        if ($this->sessionsverify_model->logver() == true):

            $this->db->from('users');
            $this->db->where('id', $_SESSION['ID']);
            $get = $this->db->get();
            $count = $get->num_rows();
            if ($count > 0):
                $result = $get->result_array();
                $loja = $result[0]['loja'];
                if (!empty($loja) and $loja > 0):


                endif;
            endif;
        endif;
    }

    public function alteritem()
    {

        if ($this->sessionsverify_model->logver() == true):

            $this->db->from('users');
            $this->db->where('id', $_SESSION['ID']);
            $get = $this->db->get();
            $count = $get->num_rows();
            if ($count > 0):
                $result = $get->result_array();
                $loja = $result[0]['loja'];
                if (!empty($loja) and $loja > 0):


                    if (isset($_POST['nome']) and isset($_POST['keywords']) and isset($_POST['preco']) and isset($_POST['desconto']) and isset($_POST['unidade']) and isset($_POST['produtoid'])):

                        if (!empty($_POST['nome']) and !empty($_POST['keywords']) and !empty($_POST['preco']) and !empty($_POST['produtoid'])):


                            $dados['nome_prod'] = $_POST['nome'];
                            $dados['keywords'] = $_POST['keywords'];
                            $dados['preco'] = str_replace(',', '.', $_POST['preco']);
                            $dados['desconto'] = $_POST['desconto'];
                            $dados['unidades'] = $_POST['unidade'];
                            $dados['categorias'] = $_POST['categoria'];
                            $this->db->where('id_pdp', $_POST['produtoid']);
                            $this->db->where('id_loja', $loja);
                            if ($this->db->update('produtos_disponiveis', $dados)):

                                echo 11;

                            else:

                                echo 'Você não tem Permissão para Alterar os Dados Dessa Loja.';

                            endif;


                        else:

                            echo 'Nenhum Campo Pode Ficar Vazio.';

                        endif;

                    else:
                        echo 'Erro ao Receber Dados.';

                    endif;


                endif;
            endif;
        endif;

    }

    public function removeitem()
    {


        if ($this->sessionsverify_model->logver() == true):

            $this->db->from('users');
            $this->db->where('id', $_SESSION['ID']);
            $get = $this->db->get();
            $count = $get->num_rows();
            if ($count > 0):
                $result = $get->result_array();
                $loja = $result[0]['loja'];
                if (!empty($loja) and $loja > 0):

                    if (isset($_POST['item']) and !empty($_POST['item'])):


                        $this->db->where('id_pdp', $_POST['item']);
                        if ($this->db->delete('produtos_disponiveis')):

                            echo 11;

                        else:

                            echo 0;

                        endif;


                    endif;


                endif;
            endif;
        endif;

    }
}