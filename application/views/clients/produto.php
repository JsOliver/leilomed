<?php $this->load->view('clients/fixed_files/header'); ?>


<br>
<div class="shop-product">
    <div class="container">
        <ul class="breadcrumb-v5">
            <li><a href="<?php echo base_url(''); ?>"><i class="fa fa-home"></i></a></li>
            <li>
                <a href="<?php echo base_url('loja/' . $this->uri->segment(2)); ?>/"><?php echo ucwords('Drogaria Unida'); ?></a>
            </li>
            <li class="active" style="color: #940f14;font-weight: 600;"><?php echo ucwords(str_replace('-', ' ', str_replace('%20','',$this->uri->segment(4)))); ?></li>
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
                                 src="http://araujo.vteximg.com.br/arquivos/ids/2777086-1000-1000/07896714201177img-imagem-id-54544.jpg"
                                 data-src="http://araujo.vteximg.com.br/arquivos/ids/2777086-1000-1000/07896714201177img-imagem-id-54544.jpg"
                                 alt="lorem ipsum dolor sit">
                            <img class="ms-thumb" style="height: 110px;object-fit: cover; object-position: center;"
                                 src="http://araujo.vteximg.com.br/arquivos/ids/2777086-1000-1000/07896714201177img-imagem-id-54544.jpg"
                                 alt="thumb">
                        </div>

                        <div class="ms-slide">
                            <img class="ms-brd"
                                 src="http://ultrafarma.r.worldssl.net/media/imagens_produtos/800px/00/700/90/1/00791349.jpg"
                                 data-src="http://ultrafarma.r.worldssl.net/media/imagens_produtos/800px/00/700/90/1/00791349.jpg""
                            alt="lorem ipsum dolor sit"> <img class="ms-thumb"
                                                              style="height: 110px;object-fit: cover; object-position: center;"
                                                              src="http://ultrafarma.r.worldssl.net/media/imagens_produtos/800px/00/700/90/1/00791349.jpg"
                                                              alt="thumb">
                        </div>
                    </div>
                    <!-- End Master Slider -->
                </div>
            </div>

            <div class="col-md-4">
                <div class="shop-product-heading">
                    <h2>Dipirona Monohidratada - Generico</h2><br>
                    <ul class="list-inline shop-product-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                    <br>
                    <small style="float: left;">Codigo do Produto: <?php echo $this->uri->segment(3); ?></small>
                    <br><br><br>
                </div><!--/end shop product social-->

                <h6><b>Melhor Oferta:</b></h6>
                <p>Integer <strong>dapibus ut elit</strong> non volutpat. Integer auctor purus a lectus suscipit
                    fermentum. Vivamus lobortis nec erat consectetur elementum.</p><br>

                <ul class="list-inline shop-product-prices margin-bottom-30">
                    <li class="shop-red">R$8.90</li>
                    <li class="line-through">R$10.00</li>
                    <li>
                        <small class="shop-bg-red time-day-left">1 days left</small>
                    </li>
                    <li>
                        <small style="font-size: 11pt;top:0;margin-top: 0;">Em <a href=""
                                                                                  style="color: #940f14;font-weight: 600;">Drogarias
                                Pacheco</a></small>
                    </li>
                </ul><!--/end shop product prices-->


                <p class="wishlist-category"><strong>Categories:</strong> <a href="#">Clothing,</a> <a
                        href="#">Shoes</a></p>
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
                            <a href="#" style="font-size: 9pt;font-weight: 600;">Adicionar a Lista de Interesse</a>
                        </li>

                    </ul>


                    <!-- Modal -->
                    <div style="top: 10%;border-radius: 0; z-index: 200000;" class="modal fade" id="lance" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="border-radius:0px;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel" style="float: left;color: black;">FAÇA SEU LANCE</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row" style="padding: 2%">
                                        <div class="col-md-8">
                                    <h4 style="font-weight: bold;color: black; font-size: 12pt;">Você quer dar um lance para adiquirir este produto? <a style="color: #940f14;">Dorflex Safoni 30 Comprimidos</a></h4>
                                            <hr>
                                            <h5 style="color: black;text-align: left;">Indique a quantidade desejada e o valor de sua proposta</h5>

                                            <div style="text-align: left;">
                                                <form>
                                                    <label style="width: 50%;">
                                                        <b style="font-size: 15pt;">R$</b>

                                                        <input style="outline: none;border-radius: 5px;padding: 2%; font-size: 12pt; margin-top:-12px;box-shadow: none !important; border: 1px solid #cccccc;" size="9" type="text" id="valor" placeholder="8,25">
                                                        </label>
                                                    <label style="width:35%;">
                                                        <b style="font-size: 12pt;">Qntd.</b>

                                                        <input style="outline: none;width:70px;border-radius: 5px;padding: 2%; font-size: 12pt; margin-top:-12px;box-shadow: none !important; border: 1px solid #cccccc;" size="2" type="number" id="valor" placeholder="1" value="1">
                                                        </label>
                                                    </form>
                                                <p style="margin-top: 5px;">
                                                    Integer <strong>dapibus ut elit</strong> non volutpat. Integer auctor purus a lectus suscipit
                                                    fermentum. Vivamus lobortis nec erat consectetur elementum.
                                                </p>
                                                </div>
                                </div>
                                        <div class="col-md-4" style="border: 1px solid #dfdfdf;">
                                            <a><img style="width: 100%;" src="http://araujo.vteximg.com.br/arquivos/ids/2777086-1000-1000/07896714201177img-imagem-id-54544.jpg"></a>
                                        </div>
                                        <div class="col-md-12">

                                            <h5 style="font-weight: 600; color: black;">Preencha corretamente os campos abaixo para que nossos especialistas entrem em contato.</h5>
                                            <div style="text-align: left;">
<br>
                                                <label style="width: 48%;">
                                                    <b>Nome:</b>
                                                    <input style="padding: 2%;outline: none;border-radius: 5px;border: 1px solid #cccccc;" type="text" placeholder="Seu nome">
                                                    </label>

                                                <label style="width: 47%;">
                                                    <b>E-mail:</b>
                                                    <input style="padding: 2%;outline: none;border-radius: 5px;border: 1px solid #cccccc;" type="text" placeholder="Seu e-mail">
                                                    </label>
                                                <br>
                                                <br>
                                                <label style="width: 100%;">
                                                    <b>Telefone:</b>
                                                    <input style="padding: 1%;outline: none;border-radius: 5px;border: 1px solid #cccccc;" type="text" placeholder="DDD" size="2">
                                                    <input style="padding: 1%;outline: none; border-radius: 5px;border: 1px solid #cccccc;" type="text" placeholder="" size="14">
                                                    <a  class="btn" style="background:#ae1b21;color: white; width:40%; margin: 0 0 0 2%;border-radius: 5px;padding: 2.1% 1% 2.1% 1%;font-weight: 600;"><i class="fa fa-gavel" aria-hidden="true"></i> DAR LANCE</a>
                                                    </label>


                                                </div>
                                        </div>
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
