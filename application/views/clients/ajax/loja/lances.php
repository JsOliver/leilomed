<div class="panel-body margin-bottom-40">

    <?php

    $this->db->from('lances');
    $this->db->where('id_loja',$_POST['keyword']);
    $get = $this->db->get();
    $count1 = $get->num_rows();
    $max = 15;
    $total = ceil($count1 / $max);
    $pagepost = $_POST['page'];
    if (isset($pagepost)):
        if($pagepost <= 1):
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
    $this->db->where('id_loja',$_POST['keyword']);
    $this->db->limit($max, $atual);
    $this->db->order_by('id', 'desc');
    $get = $this->db->get();
    $count = $get->num_rows();

    if($count > 0):

        $result = $get->result_array();
    ?>
    <ul class="timeline-v2 timeline-me">

            <?php foreach ($result as $dds) {

                $this->db->from('medicamentos');
                $this->db->where('id',$dds['id_produto']);
                $get = $this->db->get();
                $count = $get->num_rows();
                $data = $dds['data_lance'];
        $ano = substr($data,0,4);
        $dia = substr($data,6,2);
        $mes = substr($data,4,2);
                if($count > 0):
                    $result = $get->result_array();
                ?>
        <li>
            <a style="text-decoration: none;cursor: pointer;" data-toggle="modal" data-target="#infolance<?php echo $dds['id'].$_POST['tipo'];?>">
            <time datetime="" class="cbp_tmtime">
                <span><?php echo $result[0]['nome'];?></span>
                <span><?php echo $dia.'/'.$mes.'/'.$ano;?></span>
            </time>
            <i class="cbp_tmicon rounded-x hidden-xs"></i>
            <div class="cbp_tmlabel">
                <h2><?php echo $result[0]['nome'];?></h2>
                <p><?php echo $result[0]['fixa_cal'];?></p>
            </div>
                </a>
        </li>
                    <?php endif;?>


        </ul>

        <!-- Modal -->
        <div class="modal fade" id="infolance<?php echo $dds['id'].$_POST['tipo'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="border-radius: 0px;margin: 2%;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                    </div>
                    <div class="modal-body" style="border-radius: 0px;">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
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
                    <a href="javascript:categoria('<?php echo base_url('');?>','32', '<?php if($atualpg <= 1): echo $atualpg; else: echo $atualpg - 1; endif; ?>','1','lancesfarma','lancesaltab',<?php echo $_POST['keyword']?>,'');"
                       aria-label="Previous">
                      Anterior
                    </a>
                </li>

                <li>
                    <a href="javascript:categoria('<?php echo base_url('');?>','32', '<?php echo $atualpg + 1; ?>','1','lancesfarma','lancesaltab',<?php echo $_POST['keyword']?>,'');"
                       aria-label="Next">
                       Proximo
                    </a>
                </li>
            </ul>
        </nav>
    <?php endif; ?>
</div>
