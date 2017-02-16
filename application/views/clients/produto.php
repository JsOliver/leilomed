<?php $this->load->view('clients/fixed_files/header'); ?>


<br>
<div class="shop-product">
    <div class="container">
        <ul class="breadcrumb-v5">
            <li><a href="<?php echo base_url('');?>"><i class="fa fa-home"></i></a></li>
            <li><a href="<?php echo base_url('busca/'.$this->uri->segment(2));?>"><?php echo ucwords(str_replace('-',' ', $this->uri->segment(2)));?></a></li>
            <li class="active" style="color: #940f14;font-weight: 600;"><?php echo ucwords('Drogaria Unida');?></li>
        </ul>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 md-margin-bottom-50">
                <div class="ms-showcase2-template">
                    <!-- Master Slider -->
                    <div class="master-slider ms-skin-default" id="masterslider">
                        <div class="ms-slide">
                            <img class="ms-brd" src="http://www.opas.org.br/wp-content/uploads/2015/09/imecap_hair.jpg" data-src="http://www.opas.org.br/wp-content/uploads/2015/09/imecap_hair.jpg" alt="lorem ipsum dolor sit">
                            <img class="ms-thumb" src="http://www.opas.org.br/wp-content/uploads/2015/09/imecap_hair.jpg" alt="thumb">
                        </div>

                        <div class="ms-slide">
                            <img src="http://www.opas.org.br/wp-content/uploads/2015/09/imecap_hair.jpg" data-src="http://www.opas.org.br/wp-content/uploads/2015/09/imecap_hair.jpg" alt="lorem ipsum dolor sit">
                            <img class="ms-thumb" src="http://www.opas.org.br/wp-content/uploads/2015/09/imecap_hair.jpg" alt="thumb">
                        </div>
                    </div>
                    <!-- End Master Slider -->
                </div>
            </div>

            <div class="col-md-4">
                <div class="shop-product-heading">
                    <h2>Imecap HEAR 500 MG</h2><br>
                    <ul class="list-inline shop-product-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul><br>
                    <small style="float: left;">Codigo do Produto: <?php echo $this->uri->segment(3);?></small><br><br><br>
                </div><!--/end shop product social-->

                    <h6><b>Melhor Oferta:</b></h6>
                <p>Integer <strong>dapibus ut elit</strong> non volutpat. Integer auctor purus a lectus suscipit fermentum. Vivamus lobortis nec erat consectetur elementum.</p><br>

                <ul class="list-inline shop-product-prices margin-bottom-30">
                    <li class="shop-red">$57.00</li>
                    <li class="line-through">$70.00</li>
                    <li><small class="shop-bg-red time-day-left">4 days left</small></li>
                    <li><small style="font-size: 11pt;top:0;margin-top: 0;">Em <a  href="" style="color: #940f14;font-weight: 600;">Drogarias Pacheco</a></small>
                    </li>
                </ul><!--/end shop product prices-->


                <p class="wishlist-category"><strong>Categories:</strong> <a href="#">Clothing,</a> <a href="#">Shoes</a></p>
            </div>


            <div class="col-md-3">
                <div style="padding: 0 0 0 20%; text-align: center;">
                    <h4>Não Achou o preço justo?</h4>
                    <h4><b>Quer pagar Quanto?</b></h4>
                    <a class="btn" style="background:#dc0000;width: 100%;color: white;border-radius: 0;padding: 6%;font-weight: 600;"><i class="fa fa-gavel" aria-hidden="true"></i> DAR LANCE</a>
                    <ul class="list-inline add-to-wishlist add-to-wishlist-brd">
                       <br>
                        <li class="wishlist-in">
                            <a href="#" style="font-size: 9pt;font-weight: 600;">Adicionar a Lista de Interesse</a>
                        </li>

                    </ul>

                </div><!--/end shop product social-->

            </div>

        </div><!--/end row-->
    </div>
</div>
<!--=== End Shop Product ===-->

<!--=== Illustration v2 ===-->
<div class="container">
    <br>
    <div class="heading heading-v1 margin-bottom-20">
        <h2>Product you may like</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed odio elit, ultrices vel cursus sed, placerat ut leo. Phasellus in magna erat. Etiam gravida convallis augue non tincidunt. Nunc lobortis dapibus neque quis lacinia. Nam dapibus tellus sit amet odio venenatis</p>
    </div>

    <div class="illustration-v2 margin-bottom-60">
        <div class="customNavigation margin-bottom-25">
            <a class="owl-btn prev rounded-x"><i class="fa fa-angle-left"></i></a>
            <a class="owl-btn next rounded-x"><i class="fa fa-angle-right"></i></a>
        </div>

        <ul class="list-inline owl-slider-v4">
            <li class="item">
                <a href="#"><img class="img-responsive" src="assets/img/thumb/09.jpg" alt=""></a>
                <div class="product-description-v2">
                    <div class="margin-bottom-5">
                        <h4 class="title-price"><a href="#">Double-breasted</a></h4>
                        <span class="title-price">$95.00</span>
                    </div>
                    <ul class="list-inline product-ratings">
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                    </ul>
                </div>
            </li>
            <li class="item">
                <a href="#"><img class="img-responsive" src="assets/img/thumb/07.jpg" alt=""></a>
                <div class="product-description-v2">
                    <div class="margin-bottom-5">
                        <h4 class="title-price"><a href="#">Double-breasted</a></h4>
                        <span class="title-price">$60.00</span>
                        <span class="title-price line-through">$95.00</span>
                    </div>
                    <ul class="list-inline product-ratings">
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                    </ul>
                </div>
            </li>
            <li class="item">
                <a href="#"><img class="img-responsive" src="assets/img/thumb/08.jpg" alt=""></a>
                <div class="product-description-v2">
                    <div class="margin-bottom-5">
                        <h4 class="title-price"><a href="#">Double-breasted</a></h4>
                        <span class="title-price">$95.00</span>
                    </div>
                    <ul class="list-inline product-ratings">
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                    </ul>
                </div>
            </li>
            <li class="item">
                <a href="#"><img class="img-responsive" src="assets/img/thumb/06.jpg" alt=""></a>
                <div class="product-description-v2">
                    <div class="margin-bottom-5">
                        <h4 class="title-price"><a href="#">Double-breasted</a></h4>
                        <span class="title-price">$95.00</span>
                    </div>
                    <ul class="list-inline product-ratings">
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                    </ul>
                </div>
            </li>
            <li class="item">
                <a href="#"><img class="img-responsive" src="assets/img/thumb/04.jpg" alt=""></a>
                <div class="product-description-v2">
                    <div class="margin-bottom-5">
                        <h4 class="title-price"><a href="#">Double-breasted</a></h4>
                        <span class="title-price">$95.00</span>
                    </div>
                    <ul class="list-inline product-ratings">
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                    </ul>
                </div>
            </li>
            <li class="item">
                <a href="#"><img class="img-responsive" src="assets/img/thumb/03.jpg" alt=""></a>
                <div class="product-description-v2">
                    <div class="margin-bottom-5">
                        <h4 class="title-price"><a href="#">Double-breasted</a></h4>
                        <span class="title-price">$95.00</span>
                    </div>
                    <ul class="list-inline product-ratings">
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating-selected fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                        <li><i class="rating fa fa-star"></i></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
<!--=== End Illustration v2 ===-->



<?php $this->load->view('clients/fixed_files/footer'); ?>
