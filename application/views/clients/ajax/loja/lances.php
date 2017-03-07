<div class="panel-body margin-bottom-40">

    <?php

    $this->db->from('lances');
    $this->db->where('id_loja', $_POST['keyword']);
    $get = $this->db->get();
    $count1 = $get->num_rows();
    $max = 15;
    $total = ceil($count1 / $max);
    $pagepost = $_POST['page'];
    if (isset($pagepost)):
        if ($pagepost <= 1):
            $atual = 0;
            $atualpg = 1;
        else:
            $atual = $max * $pagepost - $max;
            $atualpg = $pagepost;

        endif;
    else:
        $atual = 0;
        $atualpg = 1;

    endif;
    $this->db->from('lances');
    $this->db->where('id_loja', $_POST['keyword']);
    $this->db->limit($max, $atual);
    $this->db->order_by('id', 'desc');
    $get = $this->db->get();
    $count = $get->num_rows();

    if ($count > 0):

        $result = $get->result_array();
        ?>
        <ul class="timeline-v2 timeline-me">

        <?php foreach ($result as $dds) {


        if ($dds['status'] == 1):

        $dado['status'] = 2;
        $this->db->where('id',$dds['id']);
        $this->db->update('lances',$dado);

        endif;

        $this->db->from('medicamentos');
        $this->db->where('id', $dds['id_produto']);
        $get = $this->db->get();
        $count = $get->num_rows();
        $data = $dds['data_lance'];
        $ano = substr($data, 0, 4);
        $dia = substr($data, 6, 2);
        $mes = substr($data, 4, 2);
        if ($count > 0):
            $result = $get->result_array();
            ?>
            <li>
                <a onclick="FunctionreadFtn('<?php echo base_url('');?>','<?php echo $dds['id'];?>');" style="text-decoration: none;cursor: pointer;" data-toggle="modal"
                   data-target="#infolance<?php echo $dds['id'] . $_POST['tipo']; ?>">
                    <time datetime="" class="cbp_tmtime">
                        <span><?php echo $result[0]['nome']; ?></span>
                        <span><?php echo $dia . '/' . $mes . '/' . $ano; ?></span>
                    </time>
                    <i class="cbp_tmicon rounded-x hidden-xs"></i>
                    <div class="cbp_tmlabel">
                        <h2><?php echo $result[0]['nome']; ?></h2>
                        <p><?php echo $result[0]['fixa_cal']; ?></p>
                    </div>
                </a>
            </li>
        <?php endif; ?>


        </ul>

        <!-- Modal -->
        <div class="modal fade" id="infolance<?php echo $dds['id'] . $_POST['tipo']; ?>" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" style="border-radius: 0px;margin: 2%;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Status do Lance
                            - <?php echo $result[0]['nome']; ?> </h4>
                    </div>
                    <div class="modal-body" style="border-radius: 0px;">
                        <div class="row" style="padding: 2%">
                            <div class="col-md-8">
                                <h4 style="font-weight: bold;color: black; font-size: 12pt;">Lance sobre
                                    o produto<br> <a style="color: #940f14;"> <?php echo $result[0]['nome']; ?></a></h4>
                                <hr>
                                <h5 style="color: black;text-align: left;">Sobre o Produto</h5>
                                <?php echo $result[0]['fixa_cal']; ?>
                                <h3>Dados do Ofertante</h3>
                                <div style="text-align: left;">
                                    <form>
                                        <label style="width: 28%;">
                                            <b style="font-size: 15pt;">R$ <?php echo $dds['valor']; ?>|</b>

                                        </label>
                                        <label style="width:28%;">
                                            <b style="font-size: 12pt;">Qntd.</b>

                                            <?php echo number_format($dds['unidades']); ?> </label>
                                    </form>
                                    <br>
                                    <?php
                                    /*   $this->db->from('');
                                       $this->db->where('','');
                                       $get =  $this->db->get();
                                       $count = $get->num_rows();
                                       if($count > 0):

                                           endif; */


                                    $this->db->from('users');
                                    $this->db->where('id', $dds['id_cliente']);
                                    $get = $this->db->get();
                                    $count = $get->num_rows();
                                    if ($count > 0):

                                        $result = $get->result_array();

                                        ?>
                                        <p>
                                            <b>Telefone de Contato: </b> <?php

                                            if (empty($result[0]['telefone'])):

                                                echo 'Telefone Indisponivel';
                                            else:
                                                echo $result[0]['telefone'];
                                            endif;

                                            ?> </p>


                                        <p>
                                            <b>Email para Contato: </b>

                                            <?php

                                            if (empty($result[0]['email'])):

                                                echo 'E-mail Indisponivel';
                                            else:
                                                echo $result[0]['email'];
                                            endif;

                                            ?>

                                        </p>

                                        <?php

                                    endif; ?>

                                </div>
                            </div>
                            <div class="col-md-4" style="border: 1px solid #dfdfdf;">
                                <a><img style="width: 100%;"
                                        src="http://127.0.0.1:8080/projects/leilomed/imagem?tp=1&amp;&amp;im=1&amp;&amp;image=2"
                                        data-pin-nopin="true"></a>
                                <br>
                                <hr>

                                <div>
                                    <b style="margin-top: 5px;">Valor total:
                                        R$ <?php echo number_format(str_replace(',', '.', $dds['valor']) * $dds['unidades'], 2, '.', ','); ?></b><br>
                                    <b>Enviada: <i style="color: #30944c;" class="fa fa-check" aria-hidden="true"></i>
                                    </b><br>

                                    <b>Recebida: <i style="color: #30944c;" class="fa fa-check" aria-hidden="true"></i>
                                    </b><br>
                                    <b>Lida: <i style="color: #30944c;" class="fa fa-check" aria-hidden="true"></i> </b><br>

                                    <b>Resposta: <span class="text-info">Aguardando...</span></b>

                                </div>
                                <br>
                            </div>


                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                        <button type="button" class="btn btn-danger"
                                onclick="lanceResposta(<?php echo base_url(''); ?>,0)">Recusar
                        </button>
                        <button type="button" class="btn btn-success"
                                onclick="lanceResposta(<?php echo base_url(''); ?>,0)">Aceitar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }


    else:

        ?>

        <br>
        <h2 style="text-align: center;">Nenhum Resultado</h2>

        <?php

    endif; ?>


    <?php
    if ($_POST['tipo'] == 32):


        ?>

        <nav aria-label="Page navigation">
            <ul class="pager">
                <li>
                    <a href="javascript:categoria('<?php echo base_url(''); ?>','32', '<?php if ($atualpg <= 1): echo $atualpg;
                    else: echo $atualpg - 1; endif; ?>','1','lancesfarma','lancesaltab',<?php echo $_POST['keyword'] ?>,'');"
                       aria-label="Previous">
                        Anterior
                    </a>
                </li>

                <li>
                    <a href="javascript:categoria('<?php echo base_url(''); ?>','32', '<?php echo $atualpg + 1; ?>','1','lancesfarma','lancesaltab',<?php echo $_POST['keyword'] ?>,'');"
                       aria-label="Next">
                        Proximo
                    </a>
                </li>
            </ul>
        </nav>
    <?php endif; ?>
</div>
