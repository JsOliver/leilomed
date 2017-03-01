<?php $this->load->view('clients/fixed_files/header'); ?>
<br>
<br>
<br>
<div class="content-md margin-bottom-30" style="">
    <div class="container">
        <form class="shopping-cart" action="#" novalidate="novalidate">
            <div role="application" class="wizard clearfix" id="steps-uid-0">
                <div class="content clearfix">

                    <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current"
                             aria-hidden="false">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Lance</th>
                                    <th>Qnt</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $this->db->from('carrinho');
                                $this->db->join('produtos_disponiveis', 'produtos_disponiveis.id_pdp = carrinho.id_produto', 'inner');
                                $this->db->where('carrinho.id_produto =  produtos_disponiveis.id_pdp');
                                if ($status == true):
                                    $this->db->where('carrinho.id_user', $_SESSION['ID']);

                                elseif($status == false):
                                    if (isset($_COOKIE['card'])):
                                        $this->db->where('carrinho.id_carrinho', $_COOKIE['card']);
                                    endif;
                                endif;

                                $get = $this->db->get();
                                $count = $get->num_rows();

                                if($count > 0 and isset($_COOKIE['card']) and $status == false or $count > 0 and isset($_COOKIE['card']) and $status == true):

                                    $result = $get->result_array();

                                    foreach ($result as $dds){


                                        $this->db->from('produtos_disponiveis');
                                        $this->db->where('id_pdp',$dds['id_produto']);
                                        $get = $this->db->get();
                                        $count = $get->num_rows();

                                        if($count > 0):

                                            $results = $get->result_array();

                                ?>
                                    <tr>
                                        <td class="product-in-table">
                                            <img class="img-responsive" src="<?php echo base_url('imagem?tp=1&&im=1&&image=' . $dds['id_produto'] . '') ?>" alt="">
                                            <div class="product-it-in">
                                                <h3><?php echo $results[0]['nome_prod'];?></h3>

                                            </div>
                                        </td>
                                        <td>R$ <?php echo $dds['lance'];?></td>
                                        <td>
                                            <button type="button" class="quantity-button" name="subtract"
                                                    onclick="javascript: subtractQty1();" value="-">-
                                            </button>
                                            <input type="text" class="quantity-field" name="qty1" value="<?php echo $dds['qunt'];?>" id="qty1">
                                            <button type="button" class="quantity-button" name="add"
                                                    onclick="javascript: document.getElementById(&quot;qty1&quot;).value++;"
                                                    value="+">+
                                            </button>
                                        </td>
                                        <td class="shop-red">R$ <?php echo number_format(str_replace('.','.',str_replace(',','.',$dds['lance'])) * $dds['qunt'],2,'.',',');?></td>
                                        <td>
                                            <button onclick="removeItemCard();" type="button" class="close"><span>×</span><span
                                                    class="sr-only">Fechar</span></button>
                                        </td>
                                    </tr>

                                <?php

                                endif;


                                    }

                              endif;

                                ?>

                                </tbody>
                            </table>
                        </div>
                    </section>


                </div>

            </div>
        </form>
    </div><!--/end container-->
</div><?php $this->load->view('clients/fixed_files/footer'); ?>
