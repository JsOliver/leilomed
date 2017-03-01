<div class="panel panel-profile">
    <div class="panel-heading overflow-h">
        <?php if($_POST['tipo'] == 21):

            $tp = 0;

            echo '<h2 class="panel-title heading-sm pull-left"><i class="fa fa-gavel"></i> Todos os Lances</h2>';
        elseif($_POST['tipo'] == 22):
            echo '<h2 class="panel-title heading-sm pull-left"><i class="fa fa-gavel"></i> Lances em Aberto</h2>';
            $tp = 1;

        elseif($_POST['tipo'] == 23):
            echo '<h2 class="panel-title heading-sm pull-left"><i class="fa fa-gavel"></i> Lances Encerrados</h2>';
            $tp = 2;

        else:


        endif;
        ?>
    </div>
    <div class="panel-body">
        <ul class="timeline-v2 timeline-me">
            <?php

            $this->db->from('lances');
            $this->db->where('id_cliente',$_SESSION['ID']);
            if($tp == 1):
                $this->db->where('status',1);
                $this->db->or_where('status',2);
                $this->db->or_where('status',3);
            endif;
            if($tp == 2):
                $this->db->where('status',4);
            endif;
            $get = $this->db->get();
            $count = $get->num_rows();

            if($count > 0):

                $result = $get->result_array();

                foreach ($result as $dds){

                    $this->db->from('produtos_disponiveis');
                    $this->db->where('id_pdp',$dds['id_produto']);
                    $get = $this->db->get();

                    if($get->num_rows() > 0):

                        $results = $get->result_array();

                        $nome = $results[0]['nome_prod'];


                    ?>

                <li>
                    <time datetime="" class="cbp_tmtime"><a style="cursor:pointer;" data-toggle="modal"
                                                            data-target="#<?php if($_POST['tipo'] == 21): echo 't'; elseif($_POST['tipo'] == 22): echo 'a';  else: echo 'f'; endif; ?>lance<?php echo $dds['id']; ?>"<span><?php echo $nome;?></span>
                        <span>20/02/2017 as 13:56</span></a></time>
                    <i class="cbp_tmicon rounded-x hidden-xs"></i>
                    <div class="dropdown show pull-right">
                        <a class="btn btn-secondary dropdown-toggle" href="#" id="cong" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cog "></i>
                        </a>

                        <div class="dropdown-menu" style="float: left;text-align: left; padding: 30% 0 30% 30%; width: 10px;"
                             aria-labelledby="cong">
                            <a class="dropdown-item" href="#">Cancelar</a><br>
                            <a class="dropdown-item" href="#">Editar</a>
                        </div>
                    </div><br>
                    <img src="<?php echo base_url('imagem?tp=1&&im=1&&image=' . $dds['id_produto'] . '') ?>" style="float: left;width: 80px;">
                    <div class="cbp_tmlabel">
                        <h2>
                            <?php if($_POST['tipo'] == 21):?>
                            <a style="cursor:pointer;" data-toggle="modal"
                               data-target="#<?php if($_POST['tipo'] == 21): echo 't'; elseif($_POST['tipo'] == 22): echo 'a';  else: echo 'f'; endif; ?>lance<?php echo $dds['id']; ?>">Lance Ofertado</a>

                    <?php else:?>
                                <a style="cursor:pointer;" data-toggle="modal"
                                   data-target="#<?php if($_POST['tipo'] == 21): echo 't'; elseif($_POST['tipo'] == 22): echo 'a';  else: echo 'f'; endif; ?>lance<?php echo $dds['id']; ?>">Solicitado Compra</a>
                    <?php endif;?>
                    </h2>

                        <p><a style="cursor:pointer;" data-toggle="modal" data-target="#<?php if($_POST['tipo'] == 21): echo 't'; elseif($_POST['tipo'] == 22): echo 'a';  else: echo 'f'; endif; ?>lance<?php echo $dds['id']; ?>"><?php echo $nome;?>
                                <br>
                            <?php echo '<b>Valor unitario:</b> R$'.$dds['valor'];?>
                                <br>
                                <?php echo '<b>Valor total:</b> R$'.number_format(str_replace('.','.',str_replace(',','.',$dds['valor'])) * $dds['unidades'],2,'.',',');?>
                                <br>
                                <?php echo '<b>Unidades:</b> '.$dds['unidades'];?>

                            </a>
                        </p>
                    </div>
                </li>
                <div style="top: 10%;border-radius: 0; z-index: 200000;" class="modal fade"
                     id="<?php if($_POST['tipo'] == 21): echo 't'; elseif($_POST['tipo'] == 22): echo 'a';  else: echo 'f'; endif; ?>lance<?php echo $dds['id']; ?>" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="border-radius:0px;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel" style="float: left;color: black;">
                                    Detalhes do Pedido - <b class="textarea-info">51454</b></h4>
                            </div>
                            <div class="modal-body">
                                <div class="row" style="padding: 2%">
                                    <div class="col-md-8">
                                        <h4 style="font-weight: bold;color: black; font-size: 12pt;">Lance sobre
                                            o produto<br> <a style="color: #940f14;">Dorflex Safoni 30
                                                Comprimidos</a></h4>
                                        <hr>
                                        <h5 style="color: black;text-align: left;">Indique a quantidade desejada
                                            e o valor de sua proposta</h5>

                                        <div style="text-align: left;">
                                            <form>
                                                <label style="width: 28%;">
                                                    <b style="font-size: 15pt;">R$ <?php echo $dds['valor'];?>|</b>

                                                </label>
                                                <label style="width:28%;">
                                                    <b style="font-size: 12pt;">Qntd.</b>

                                                    <?php echo $dds['unidades'];?> </label>
                                            </form>
                                            <br>
                                            <?php

                                            $this->db->from('lojas');
                                            $this->db->where('id_loja',$dds['id_loja']);
                                            $this->db->where('visible',0);
                                            $get = $this->db->get();
                                            if($get->num_rows()):

                                                $resultlj = $get->result_array();
                                                $telefone = $resultlj[0]['telefone'];
                                                $email = $resultlj[0]['email_contato'];
                                                $descricao = $resultlj[0]['descricao_loja'];

                                            ?>
                                                <?php if(!empty($telefone)):?>
                                            <p>
                                                <b>Telefone de Contato: </b> <?php echo $telefone;?>
                                            </p>

                                                <?php endif;?>

                                                <?php if(!empty($email)):?>

                                                <p>
                                                <b>Email para Contato: </b> <?php echo $email;?>
                                            </p>

                                            <?php endif;?>
                                                <?php if(!empty($descricao)):?>

                                                <p style="margin-top: 5px;"><?php echo substr(strip_tags($descricao),0,200).'...'?>
                                            </p>
                                            <?php endif;?>


                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="border: 1px solid #dfdfdf;">
                                        <a><img style="width: 100%;"
                                                src="<?php echo base_url('imagem?tp=1&&im=1&&image=' . $dds['id_produto'] . '') ?>"></a>
                                        <br>
                                        <hr>

                                        <div>
                                            <b style="margin-top: 5px;">Valor total: R$ <?php echo number_format(str_replace('.','.',str_replace(',','.',$dds['valor'])) * $dds['unidades'],2,'.',','); ?></b><br>
                                            <?php
                                            if($dds['status'] >= 1):

                                                echo '<b>Enviada: <i style="color: #30944c;" class="fa fa-check"
                                                           aria-hidden="true"></i> </b><br>';
                                                else:
                                                    echo '<b>Enviada: <i style="color: #940f14;" class="fa fa-times"
                                                           aria-hidden="true"></i> </b><br>';
                                            endif;
                                            ?>


                                            <?php
                                            if($dds['status'] >= 2):

                                                echo '<b>Recebida: <i style="color: #30944c;" class="fa fa-check"
                                                            aria-hidden="true"></i> </b><br>';
                                            else:
                                                echo '<b>Recebida: <i style="color: #940f14;" class="fa fa-times"
                                                           aria-hidden="true"></i> </b><br>';
                                            endif;
                                            ?>

                                            <?php
                                            if($dds['status'] >= 3):

                                                echo '<b>Lida: <i style="color: #30944c;" class="fa fa-check"
                                                        aria-hidden="true"></i></b><br>';
                                            else:
                                                echo '<b>Lida: <i style="color: #940f14;" class="fa fa-times"
                                                           aria-hidden="true"></i> </b><br>';
                                            endif;
                                            ?>


                                            <?php
                                            if($dds['resposta'] == 0):

                                                echo '<b>Resposta: <span class="text-info">Aguardando...</span></b>';
                                            elseif($dds['resposta'] == 1):
                                                echo '<b>Resposta: <span class="text-danger">Negado...</span></b>';
                                            else:

                                                echo '<b>Resposta: <span class="text-success">Aceito...</span></b>';

                                            endif;
                                            ?>


                                        </div>
                                        <br>
                                    </div>



                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <br>
            <?php
                    endif; } else: echo '<h1 style="text-align: center;">Nenhum Lance Encontrado</h1>'; endif; ?>
        </ul>
    </div>
    <nav aria-label="Page navigation">
        <ul class="pager">
            <li>
                <a href="javascript:categoria('<?php echo base_url('');?>','<?php echo $_POST['tipo']?>', '1','1','meuslances','<?php echo $_POST['resutblock'];?>');" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <li><a href="javascript:categoria('<?php echo base_url('');?>','<?php echo $_POST['tipo']?>', '1','1','meuslances','<?php echo $_POST['resutblock'];?>');">1</a></li>
            <li>
                <a href="javascript:categoria('<?php echo base_url('');?>','<?php echo $_POST['tipo']?>', '1','1','meuslances','<?php echo $_POST['resutblock'];?>');" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
