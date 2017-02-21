<?php if($_POST['pg1'] == 11 and $_POST['tipo'] == 0):
    echo '<h4>Exibindo resultados de <small>'.ucwords($_POST['keyword']).'</small></h4>';
else:

    $this->db->from('categorias');
    $this->db->where('tipo',$_POST['tipo']);
    $this->db->order_by('id','desc');
    $get = $this->db->get();
    $count = $get->num_rows();
    if($count > 0):

        $result = $get->result_array();

        echo '<h3>'.$result[0]['titulo'].' <small style="font-weight:bold;">'.ucwords($_POST['keyword']).'</small></h3>';

    else:

        echo '<h3>Recomendados para você</h3>';

    endif;




endif;
?>
<br>
<br>
<div class="row" style="padding: 0 0 0 3%; ">
    <style>
        .pager a {
            color: #940f14;
        }

        /*Add to Cart*/
        .illustration-v2 .add-to-cart {

            visibility: hidden;
            background: rgba(255,255,255,0.8);
        }


        .illustration-v2 .add-to-cart:hover {
            color: #fff;
            text-decoration: none;
            background: rgba(24,171,155,0.5);
            transition: background-color 0.2s ease-in-out;
        }

        .illustration-v2 .add-to-cart:hover i {
            color: #fff;
        }

        .illustration-v2 .product-img:hover .add-to-cart {
            visibility: visible;
        }

        <?php if($_POST['tipo'] == 11 or $_POST['pg1'] == 11): ?>


        @media (min-width: 880px) {
            #compra{
                width:40%;
            }
        }
        @media (max-width: 881px) {
            #compra{
                width: 100%;
            }

        }


        <?php  endif;?>
    </style>
    <?php
    $this->db->from('produtos_disponiveis');
    $this->db->join('medicamentos','medicamentos.id = produtos_disponiveis.id_pdp','inner');
    $this->db->where('produtos_disponiveis.visible',1);
    if($_POST['tipo'] <> 0):
        $this->db->like('produtos_disponiveis.categorias',$_POST['tipo']);
    endif;
    if($_POST['pg1'] == 11):
        $this->db->like('medicamentos.nome',$_POST['keyword']);
        $this->db->or_like('produtos_disponiveis.keywords',$_POST['keyword']);
    endif;

    $this->db->order_by('produtos_disponiveis.preco','min');
    $get = $this->db->get();
    $count1 = $get->num_rows();


    $max = 20;
    $pages = ceil($count1 / 20);
    if($_POST['page'] <=1):

        $limit = 1;
    else:

        if($_POST['page'] >= $pages):

            $limit = $pages;
            else:

                $limit = $_POST['page'];

        endif;

    endif;

    $atual = $max * $limit - $max;

    $this->db->from('produtos_disponiveis');
    $this->db->join('medicamentos','medicamentos.id = produtos_disponiveis.id_pdp','inner');
    $this->db->where('produtos_disponiveis.visible',1);
    if($_POST['tipo'] <> 0):
        $this->db->like('produtos_disponiveis.categorias',$_POST['tipo']);
    endif;
    if($_POST['pg1'] == 11):
        $this->db->like('medicamentos.nome',$_POST['keyword']);
        $this->db->or_like('medicamentos.nome',ucwords($_POST['keyword']));
        $this->db->or_like('medicamentos.nome',strtoupper($_POST['keyword']));
        $this->db->or_like('medicamentos.nome',ucfirst($_POST['keyword']));
        $this->db->or_like('produtos_disponiveis.keywords',$_POST['keyword']);
        $this->db->or_like('produtos_disponiveis.keywords',str_replace(' ','-',$_POST['keyword']));
    endif;
    $this->db->limit($max,$atual);
    $this->db->order_by('produtos_disponiveis.preco','min');
    $get = $this->db->get();
    $count = $get->num_rows();

    if($count > 0):

        $result = $get->result_array();
        foreach ($result as $dds) {
            ?>
            <?php
            $this->db->from('lojas');
            $this->db->where('id_loja',$dds['id_loja']);
            $get = $this->db->get();
            $countlg = $get->num_rows();
            $fetchad = $get->result_array();
            $arrayreplace = array("(",")","-");
            ?>
            <div class="col-sm-5 col-md-<?php if ($_POST['tipo'] == 11): echo '3';
            else: echo '4'; endif; ?> illustration-v2" id="compra" style="border: none; float: left;">
                <div class="thumbnail product-img"
                     style="border:none; border-radius:0;box-shadow:none; border-right: 1px solid #f2f2f2; ">
            <?php if(!empty($dds['desconto'])): ?>
                    <span style="position: absolute;left: 68%; padding: 1% 3% 1% 2% ;color: white;font-weight: 600; background: #972227; float: right;">- <?php echo $dds['desconto'];?>% OFF</span>

                <?php endif;?>

                    <a style="position: absolute;top:30%; text-decoration:none;left: 38%; padding: 2% 4% 2% 4% ;color: white;font-weight: 600; background: #972227; float: right;"
                       class="add-to-cart"

                        <?php
                        if($countlg > 0):

                            echo 'href="'.base_url('loja/'.str_replace(' ','-',strtolower($fetchad[0]['nome_loja'])).'/'.str_replace(' ','-',str_replace($arrayreplace,'',strtolower($dds['nome'])))).'/'.$dds['id_pdp'].'"';
                        endif;
                        ?>
                    ><i
                            class="fa fa-shopping-cart"></i> Ver Detalhes</a>
                    <img style="height: 200px;"
                         src="<?php echo base_url('imagem?tp=1&&im=1&&image='.$dds['id'].'')?>"
                         alt="...">


                    <div class="caption">
                        <div style="float: left; width: 70%; padding-left: -10px;margin-right: 10px; ">
                            <h4 style="margin-bottom: 0;"><b><a style="color: black;text-decoration: none;"
                                                                <?php
                                                                if($countlg > 0):

                                                                    echo 'href="'.base_url('loja/'.str_replace(' ','-',strtolower($fetchad[0]['nome_loja'])).'/'.str_replace(' ','-',str_replace($arrayreplace,'',strtolower($dds['nome'])))).'/'.$dds['id_pdp'].'"';
                                                                        endif;
                                                                ?>
                                    >

                                        <?php echo $dds['nome'];?></a></b></h4>
                            <?php

                            if($countlg > 0):
                                echo '<span>Em <a href="'.base_url('loja/'.str_replace(' ','-',strtolower($fetchad[0]['nome_loja']))).'" style="color: #940f14;font-weight: 600;">'.ucwords($fetchad[0]['nome_loja']).'</a></span>';

                            else:

                                echo '<span><a style="color: #940f14;font-weight: 600;">Produto Indisponivel</a></span>';
                            endif;
                            ?>
                        </div>

                        <div style="float: right;border-left: 1px solid #d6d6d6; padding-left: 10px;">
                            <?php if(empty($dds['desconto'])):
                ?>
                    <br>
                                <span style="font-size: 14pt;font-weight: 600; color: #940f14;">R$<?php echo number_format($dds['preco'],2,',','.');?></span>

                                <?php
                else:
                ?>
                            <span style="color: #a9acb1;">de R$<?php echo number_format($dds['preco'],2,',','.');?></span><br>
                            <span style="font-size: 14pt;font-weight: 600; color: #940f14;">R$<?php echo number_format($dds['preco'] - $dds['preco'] / 100 * $dds['desconto'],2,',','.');?></span>

                    <?php endif;?>
                        </div>

                        <br>
                        <br>
                        <br>

                    </div>
                </div>
            </div>
            <?php

        }
    else:


    endif;
    ?>





</div>
<?php if($count1 > 20):?>
<nav aria-label="Page navigation">
    <ul class="pager">
        <li>
            <a href="javascript:categoria(<?php echo $_POST['tipo'];?>,<?php echo $_POST['page'] - 1;?>,'1','produtoshome','produtos','<?php echo $_POST['keyword']?>','<?php echo $_POST['pg1'];?>');" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li><a href="javascript:categoria(<?php echo $_POST['tipo'];?>,<?php echo 1;?>,'1','produtoshome','produtos','<?php echo $_POST['keyword']?>','<?php echo $_POST['pg1'];?>');">1</a></li>
        <li>
            <a href="javascript:categoria(<?php echo $_POST['tipo'];?>,<?php echo $_POST['page'] + 1;?>,'1','produtoshome','produtos','<?php echo $_POST['keyword']?>','<?php echo $_POST['pg1'];?>');" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>

<?php endif;?>