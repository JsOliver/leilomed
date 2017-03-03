<?php $this->load->view('clients/fixed_files/header');


$this->db->from('produtos_disponiveis');
$this->db->where('id_pdp', $this->uri->segment(4));
$this->db->where('visible', 1);
$get = $this->db->get();
$count = $get->num_rows();
if ($count == 0):
    redirect(base_url('home'), 'refresh');
else:
    $result = $get->result_array();


    $this->db->from('medicamentos');
    $this->db->where('id', $this->uri->segment(4));
    $getmed = $this->db->get();
    $countmd = $getmed->num_rows();
    if ($countmd == 0):

        redirect(base_url('home'), 'refresh');

    else:
        $resultmed = $getmed->result_array();

    endif;

    $this->db->from('lojas');
    $this->db->where('id_loja', $result[0]['id_loja']);
    $getlj = $this->db->get();
    if ($getlj->num_rows() == 0):

        redirect(base_url('home'), 'refresh');

    else:

        $resultlj = $getlj->result_array();
        $arrayreplace = array("(", ")", "-");

    endif;

endif;
?>


<br>
<div class="shop-product">
    <div class="container">
        <ul class="breadcrumb-v5">
            <li><a href="<?php echo base_url(''); ?>"><i class="fa fa-home"></i></a></li>
            <li>
                <a href="<?php echo base_url('loja/' . str_replace(' ', '-', str_replace($arrayreplace, '', strtolower($resultlj[0]['nome_loja']))).'/'.$resultlj[0]['id_loja']); ?>"><?php echo ucwords($resultlj[0]['nome_loja']); ?></a>
            </li>
            <li class="active"
                style="color: #940f14;font-weight: 600;"><?php echo ucwords(str_replace('%20', '', $resultmed[0]['nome'])); ?></li>
        </ul>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 md-margin-bottom-50">
                <div class="ms-showcase2-template">
                    <!-- Master Slider -->
                    <div class="master-slider ms-skin-default" id="masterslider">

                        <div class="ms-slide">
                            <img class="ms-brd"
                                 src="<?php echo base_url('imagem?tp=1&&im=1&&image=' . $this->uri->segment(4) . '') ?>"
                                 alt="lorem ipsum dolor sit">
                            <img class="ms-thumb" style="height: 110px;object-fit: cover; object-position: center;"
                                 src="<?php echo base_url('imagem?tp=1&&im=1&&image=' . $this->uri->segment(4) . '') ?>"
                                 alt="thumb">
                        </div>
                        <div class="ms-slide">
                            <img class="ms-brd"
                                 src="<?php echo base_url('imagem?tp=1&&im=2&&image=' . $this->uri->segment(4) . '') ?>"
                                 alt="lorem ipsum dolor sit">
                            <img class="ms-thumb" style="height: 110px;object-fit: cover; object-position: center;"
                                 src="<?php echo base_url('imagem?tp=1&&im=2&&image=' . $this->uri->segment(4) . '') ?>"
                                 alt="thumb">
                        </div>

                        <div class="ms-slide">
                            <img class="ms-brd"
                                 src="<?php echo base_url('imagem?tp=1&&im=3&&image=' . $this->uri->segment(4) . '') ?>"
                                 alt="lorem ipsum dolor sit">
                            <img class="ms-thumb" style="height: 110px;object-fit: cover; object-position: center;"
                                 src="<?php echo base_url('imagem?tp=1&&im=3&&image=' . $this->uri->segment(4) . '') ?>"
                                 alt="thumb">
                        </div>

                        <div class="ms-slide">
                            <img class="ms-brd"
                                 src="<?php echo base_url('imagem?tp=1&&im=4&&image=' . $this->uri->segment(4) . '') ?>"
                                 alt="lorem ipsum dolor sit">
                            <img class="ms-thumb" style="height: 110px;object-fit: cover; object-position: center;"
                                 src="<?php echo base_url('imagem?tp=1&&im=4&&image=' . $this->uri->segment(4) . '') ?>"
                                 alt="thumb">
                        </div>


                    </div>
                    <!-- End Master Slider -->
                </div>
            </div>

            <div class="col-md-4">
                <div class="shop-product-heading">
                    <h2><?php echo ucwords(str_replace('%20', '', $resultmed[0]['nome'])); ?></h2><br>
                    <ul class="list-inline shop-product-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                    <br>
                    <small style="float: left;">Codigo do Produto: <b>#MD0<?php echo $resultmed[0]['id']; ?></b></small>
                    <br><br><br>
                </div><!--/end shop product social-->

                <h6><b>Informações do Produto:</b></h6>

                <?php echo $resultmed[0]['fixa_cal']; ?>

                <br>

                <ul class="list-inline shop-product-prices margin-bottom-30">

                    <?php if (empty($result[0]['desconto'])):
                        ?>
                        <li class="shop-red">R$<?php echo number_format($result[0]['preco'], 2, ',', '.'); ?></li>

                        <?php
                    else:
                        ?>
                        <li class="shop-red">
                            R$<?php echo number_format($result[0]['preco'] - $result[0]['preco'] / 100 * $result[0]['desconto'], 2, ',', '.'); ?>
                           </li>
                        <li class="line-through">
                            R$<?php echo number_format($result[0]['preco'], 2, ',', '.'); ?>
                           </li>


                    <?php endif; ?>
                    <?php if (!empty($result[0]['data_vencimento'])):

                        echo ' <li> <small class="shop-bg-red time-day-left">1 days left</small>
      
                    </li>';

                    else:


                        echo '<br>';
                    endif;
                    ?>


                    <li>
                        <small style="font-size: 11pt;top:0;margin-top: 0;">Em <a
                                href="<?php echo base_url('loja/' . str_replace(' ', '-', str_replace($arrayreplace, '', strtolower($resultlj[0]['nome_loja']))).'/'.$result[0]['id_loja']); ?>"
                                style="color: #940f14;font-weight: 600;"><?php echo ucwords($resultlj[0]['nome_loja']); ?></a>
                        </small>
                    </li>
                </ul><!--/end shop product prices-->


                <p class="wishlist-category"><strong>Categorias:</strong>
                    <?php

                    $arraycategoria = explode(',', $result[0]['categorias']);
                    $narrays = count($arraycategoria);

                    $this->db->from('categorias');
                    $this->db->where('tipo', 1);

                    for ($i = 10; $i < $narrays; $i++):
                        $this->db->like('id', $arraycategoria[$i]);
                    endfor;

                    $get = $this->db->get();
                    $countc = $get->num_rows();
                    if ($countc > 0):
                        $fetch = $get->result_array();

                        $o = 0;
                        foreach ($fetch as $ddsc) {
                            $o++;
                            if ($o == count($fetch)):
                                $v = '';
                            else:

                                $v = ',';
                            endif;
                            echo '<a href="' . base_url('busca/' . str_replace(' ', '-', str_replace($arrayreplace, '', strtolower($ddsc['nome'])))) . '">' . $ddsc['nome'].'</a>'.$v.'';

                        }
                    else:

                    endif;
                    ?>
</p>


</p>
            </div>


            <div class="col-md-3">
                <div style="padding: 0 0 0 20%; text-align: center;">
                    <h4>Não Achou o preço justo?</h4>
                    <h4><b>Quer pagar Quanto?</b></h4>
                    <a data-toggle="modal" data-target="#lance" class="btn"
                       style="background:#dc0000;width: 100%;color: white;border-radius: 0;padding: 6%;font-weight: 600;"><i
                            class="fa fa-gavel" aria-hidden="true"></i> DAR LANCE</a>
                    <ul class="list-inline add-to-wishlist add-to-wishlist-brd">
                        <br>
                        <li class="wishlist-in">
                            <a  data-toggle="modal" data-target="#addcard"  style="font-size: 9pt;font-weight: 600;">Adicionar a Lista de Interesse</a>
                        </li>

                    </ul>


                    <!-- Modal -->
                    <div style="top: 10%;border-radius: 0; z-index: 200000;" class="modal fade" id="lance" tabindex="-1"
                         role="dialog"
                         aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="border-radius:0px;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel" style="float: left;color: black;">FAÇA SEU
                                        LANCE</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row" style="padding: 2%">
                                        <div class="col-md-8">
                                            <h4 style="font-weight: bold;color: black; font-size: 12pt;">Você quer dar
                                                um lance para adiquirir este produto? <a style="color: #940f14;">Dorflex
                                                    Safoni 30 Comprimidos</a></h4>
                                            <hr>
                                            <h5 style="color: black;text-align: left;">Indique a quantidade desejada e o
                                                valor de sua proposta</h5>

                                            <div style="text-align: left;">
                                                <form>
                                                    <label style="width: 50%;">
                                                        <b style="font-size: 15pt;">R$</b>

                                                        <input
                                                            style="outline: none;border-radius: 5px;padding: 2%; font-size: 12pt; margin-top:-12px;box-shadow: none !important; border: 1px solid #cccccc;"
                                                            size="9" type="text" id="moneys"
                                                            placeholder="<?php if (empty($result[0]['desconto'])):

                                                                echo number_format($result[0]['preco'], 2, ',', '.');

                                                            else:

                                                                echo number_format($result[0]['preco'] - $result[0]['preco'] / 100 * $result[0]['desconto'], 2, ',', '.');

                                                            endif;

                                                            ?>

" value="<?php if (empty($result[0]['desconto'])):

                                                            echo number_format($result[0]['preco'], 2, ',', '.');

                                                        else:

                                                            echo number_format($result[0]['preco'] - $result[0]['preco'] / 100 * $result[0]['desconto'], 2, ',', '.');

                                                        endif;

                                                        ?>">
                                                    </label>
                                                    <label style="width:35%;">
                                                        <b style="font-size: 12pt;">Qntd.</b>

                                                        <input
                                                            style="outline: none;width:70px;border-radius: 5px;padding: 2%; font-size: 12pt; margin-top:-12px;box-shadow: none !important; border: 1px solid #cccccc;"
                                                            size="2" type="number" id="quantidade" placeholder="1" value="1">
                                                    </label>
                                                </form>
                                                <p style="margin-top: 5px;">
                                                    Integer <strong>dapibus ut elit</strong> non volutpat. Integer
                                                    auctor purus a lectus suscipit
                                                    fermentum. Vivamus lobortis nec erat consectetur elementum.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="border: 1px solid #dfdfdf;">
                                            <a><img style="width: 100%;"
                                                    src="http://araujo.vteximg.com.br/arquivos/ids/2777086-1000-1000/07896714201177img-imagem-id-54544.jpg"></a>
                                        </div>
                                        <?php if ($status == false): ?>
                                            <div class="col-md-12">

                                                <h5 style="font-weight: 600; color: black;">Preencha corretamente os
                                                    campos abaixo para que nossos especialistas entrem em contato.</h5>
                                                <div style="text-align: left;">
                                                    <br>
                                                    <label style="width: 48%;">
                                                        <b>Nome:</b>
                                                        <input id="nomenl"
                                                            style="padding: 2%;outline: none;border-radius: 5px;border: 1px solid #cccccc;"
                                                            type="text" placeholder="Seu nome">
                                                    </label>

                                                    <label style="width: 47%;">
                                                        <b>E-mail:</b>
                                                        <input id="emailnl"
                                                            style="padding: 2%;outline: none;border-radius: 5px;border: 1px solid #cccccc;"
                                                            type="text" placeholder="Seu e-mail">
                                                    </label>
                                                    <br>
                                                    <br>
                                                    <label style="width: 100%;">
                                                        <b>Telefone:</b>
                                                        <input id="dddnl"
                                                            style="padding: 1%;outline: none;border-radius: 5px;border: 1px solid #cccccc;"
                                                            type="text" placeholder="DDD" size="2">
                                                        <input id="telefonenl"
                                                            style="padding: 1%;outline: none; border-radius: 5px;border: 1px solid #cccccc;"
                                                            type="text" placeholder="" size="14">
                                                        <span id="btns">   <a href="javascript:lance('<?php echo $result[0]['id_loja'];?>' , '<?php echo '#MD0'.$resultmed[0]['id'].''; ?>' , '<?php echo $this->uri->segment(4);?>');" class="btn"
                                                           style="background:#ae1b21;color: white; width:40%; margin: 0 0 0 2%;border-radius: 5px;padding: 2.1% 1% 2.1% 1%;font-weight: 600;"><i
                                                                class="fa fa-gavel" aria-hidden="true"></i> DAR
                                                            LANCE</a> </span>
                                                        <br>
                                                        <b id="lanceresult"></b>
                                                    </label>


                                                </div>
                                            </div>

                                        <?php else: ?>
                                           <span id="btns"> <a href="javascript:lance('<?php echo $result[0]['id_loja'];?>' , '<?php echo '#MD0'.$resultmed[0]['id'].''; ?>' , '<?php echo $this->uri->segment(4);?>');" class="btn"
                                               style="background:#ae1b21;color: white; width:30%; float: right; margin: 10px 0 0 1%;border-radius: 5px;padding: 2.1% 0.5% 2.1% 0.5%;font-weight: 600;"><i
                                                    class="fa fa-gavel" aria-hidden="true"></i> DAR LANCE</a> </span>
                                            <br>
                                            <b id="lanceresult"></b>
                                        <?php endif; ?>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>


                    <div style="top: 10%;border-radius: 0; z-index: 200000;" class="modal fade" id="addcard" tabindex="-1"
                         role="dialog"
                         aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="border-radius:0px;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel" style="float: left;color: black;">Adicionar ao Carrinho</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row" style="padding: 2%">
                                        <div class="col-md-8">
                                            <h4 style="font-weight: bold;color: black; font-size: 12pt;">Você quer dar
                                                um lance para adiquirir este produto? <a style="color: #940f14;">Dorflex
                                                    Safoni 30 Comprimidos</a></h4>
                                            <hr>
                                            <h5 style="color: black;text-align: left;">Indique a quantidade desejada e o
                                                valor de sua proposta</h5>

                                            <div style="text-align: left;">
                                                <form>
                                                    <label style="width: 50%;">
                                                        <b style="font-size: 15pt;">R$</b>

                                                        <input
                                                            style="outline: none;border-radius: 5px;padding: 2%; font-size: 12pt; margin-top:-12px;box-shadow: none !important; border: 1px solid #cccccc;"
                                                            size="9" type="text" id="moneyscard"
                                                            placeholder="<?php if (empty($result[0]['desconto'])):

                                                                echo number_format($result[0]['preco'], 2, ',', '.');

                                                            else:

                                                                echo number_format($result[0]['preco'] - $result[0]['preco'] / 100 * $result[0]['desconto'], 2, ',', '.');

                                                            endif;

                                                            ?>

" value="<?php if (empty($result[0]['desconto'])):

                                                            echo number_format($result[0]['preco'], 2, ',', '.');

                                                        else:

                                                            echo number_format($result[0]['preco'] - $result[0]['preco'] / 100 * $result[0]['desconto'], 2, ',', '.');

                                                        endif;

                                                        ?>">
                                                    </label>
                                                    <label style="width:35%;">
                                                        <b style="font-size: 12pt;">Qntd.</b>

                                                        <input
                                                            style="outline: none;width:70px;border-radius: 5px;padding: 2%; font-size: 12pt; margin-top:-12px;box-shadow: none !important; border: 1px solid #cccccc;"
                                                            size="2" type="number" id="quantidadecard" placeholder="1" value="1">
                                                    </label>
                                                </form>
                                                <p style="margin-top: 5px;">
                                                    Integer <strong>dapibus ut elit</strong> non volutpat. Integer
                                                    auctor purus a lectus suscipit
                                                    fermentum. Vivamus lobortis nec erat consectetur elementum.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="border: 1px solid #dfdfdf;">
                                            <a><img style="width: 100%;"
                                                    src="http://araujo.vteximg.com.br/arquivos/ids/2777086-1000-1000/07896714201177img-imagem-id-54544.jpg"></a>
                                        </div>

                                           <span id="btnscr"> <a href="javascript:addcard('<?php echo $result[0]['id_loja'];?>' , '<?php echo '#MD0'.$resultmed[0]['id'].''; ?>' , '<?php echo $this->uri->segment(4);?>');" class="btn"
                                               style="background:#ae1b21;color: white; width:30%; float: right; margin: 10px 0 0 1%;border-radius: 5px;padding: 2.1% 0.5% 2.1% 0.5%;font-weight: 600;"><i
                                                    class="fa fa-card" aria-hidden="true"></i> Add ao Carrinho</a> </span>
                                            <br>
                                            <b id="lanceresult"></b>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div><!--/end shop product social-->

            </div>

            <div class="col-md-1" style="padding: 0 0 0 2%;">
                <!-- LOMADEE - BEGIN -->
                <script type="text/javascript" language="javascript">
                    lmd_source = "35752989";
                    lmd_si = "33857233";
                    lmd_pu = "22719751";
                    lmd_c = "BR";
                    lmd_wi = "120";
                    lmd_he = "600";
                </script>
                <script src="http://image.lomadee.com/js/ad_lomadee.js" type="text/javascript"
                        language="javascript"></script>
                <!-- LOMADEE - END -->
            </div>

        </div><!--/end row-->
    </div>
</div>
<!--=== End Shop Product ===-->

<!--=== Illustration v2 ===-->
<div class="container">
    <br>
    <table class="table">
        <tr style="border-top: 10px solid white;">
            <th style="color: #969696;padding-left: 3.5%;">PRODUTO</th>
            <th style="color: #969696;padding-left: 3.5%;">FARMÁCIA</th>
            <th style="color: #969696;padding-left: 3.5%;">FRETE GRÁTIS</th>
            <th style="color: #969696;padding-left: 3.5%;">TELEFONE</th>
            <th style="color: #969696;padding-left: 3.5%;">VALOR</th>
        </tr>
        <tr>
            <td style="font-weight: bold;color: #940f14;text-align: center;"><a style="color: #940f14;">Dorflex Sanofi
                    30 Comprimidos</a></td>
            <td style="font-weight: bold;color: #940f14;text-align: center;"><a style="color: #940f14;">Drogaria São
                    Paulo</a></td>
            <td style="text-align: center;"><i style="color: #30944c;" class="fa fa-check" aria-hidden="true"></i></td>
            <td style="text-align: center;">(33) 3343-1704</td>
            <td style="text-align: center;">
                <span style="color: #727272;text-decoration: line-through;" class="line-through">de R$10.00</span> <span
                    style="font-weight: bold;color: #940f14;" class="shop-red">R$8.90</span> &nbsp;&nbsp;&nbsp; <span
                    style=" padding: 1% 2% 1% 2% ;color: white;font-weight: 600; background: #972227;">- 9% OFF</span>
            </td>
        </tr>

        <tr style="border-top: 10px solid white;">
            <td style="font-weight: bold;color: #940f14;text-align: center;"><a style="color: #940f14;">Dorflex Sanofi
                    30 Comprimidos</a></td>
            <td style="font-weight: bold;color: #940f14;text-align: center;"><a style="color: #940f14;">Drogaria Nova
                    Farma</a></td>
            <td style="text-align: center;"><i style="color: #940f14;" class="fa fa-times" aria-hidden="true"></i></td>
            <td style="text-align: center;">(33) 3343-1704</td>
            <td style="text-align: center;">
                <span style="color: #727272;text-decoration: line-through;" class="line-through">de R$12.00</span> <span
                    style="font-weight: bold;color: #940f14;" class="shop-red">R$9.97</span> &nbsp;&nbsp;&nbsp; <span
                    style=" padding: 1% 2% 1% 2% ;color: white;font-weight: 600; background: #972227;">- 15% OFF</span>
            </td>
        </tr>
    </table>
    <br>


</div>
<!--=== End Illustration v2 ===-->


<?php $this->load->view('clients/fixed_files/footer'); ?>
