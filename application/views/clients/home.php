<?php $this->load->view('clients/fixed_files/header'); ?>
    <br>
    <script>

        window.onload = function () {

            categoria('1', '1');

        }

    </script>
    <div class="navbar faixa-darkred">
        <div class="container-fluid">
            <div class="collapse navbar-collapse faixa-darkred-sub" id="bs-example-navbar-collapse-1"></div>
        </div>
    </div>
    <div class="container">

        <div class="cards">

            <ul class="nav nav-pills cards-pill">
                <li class="licards"><a id="cardlink"> <i class="glyphicon glyphicon-search"></i> </a>
                    <h4>&nbsp;&nbsp;&nbsp;Pesquise</h4>
                    <p>Pesquise os medicamentos que<br> deseja comprar.</p>
                </li>

                <li class="licards"><a id="cardlink"> <i class="glyphicon glyphicon-usd"></i> </a>
                    <h4>&nbsp;&nbsp;&nbsp;Compare</h4>
                    <p>Compare os preços e diga<br> o quanto quer pagar.</p>


                </li>


                <li class="licards-last"><a id="cardlink-last"> <i class="glyphicon glyphicon-piggy-bank"></i> </a>
                    <h4>&nbsp;&nbsp;&nbsp;Economize</h4>
                    <p>Economize muito<br> em suas compras.</p>

                </li>


            </ul>
        </div>

    </div>
    <br>
    <br>

    <div class="banner-top" style="position: relative;">
        <a href="#"><img src="http://www.eatingforenergy.ca/images/728X90.jpg"></a>
    </div>
    <style>

        .explication {
            margin-top: 15px;
        }

    </style>


    <div class="filtro">
        <div class="inputs-filtro">
            <h5 style="float: left;color: #727272;">Filtrar por:&nbsp;&nbsp;&nbsp;</h5>


            <i style="color: #940f14;" class="glyphicon glyphicon-th-large"></i>
            <select onchange="categoria(this.value,'1');" class="categoria-filtro">
                <option style="display: none;" disabled selected>Categorias</option>
                <option value="1">teste</option>
                <option value="2">teste</option>
                <option value="3">teste</option>


            </select>
            &nbsp;&nbsp;&nbsp;
            <i style="color: #940f14;" class="glyphicon glyphicon-th-list"></i>
            <select onchange="categoria(this.value,'1');" class="farmaceutica-filtro">
                <option style="display: none;" selected disabled>Farmaceuticas</option>
                <option value="1">teste</option>
                <option value="2">teste</option>
                <option value="3">teste</option>


            </select>
        </div>


        <div class="container explication">

            <div id="Loading">

            </div>

            <div id="produtos" style="z-index: 10; position: relative;">

            </div>

        </div>

    </div>


    <div class="container carrosecontent" style="margin-top: 50px;z-index: 0;">

        <div class="row"><br>

            <br>
            <div class="col-md-12">
                <h3 style="margin-top: 60px;">Farmácias Anunciantes</h3>

                <div id="Carousel" class="carousel slide">



                    <!-- Carousel items -->
                    <div class="carousel-inner" >

                        <?php for($i=0;$i<=4;$i++):?>




                        <div class="item <?php if($i == 0):echo 'active'; endif;?>">
                            <div class="row">
                                <?php for($o=0;$o<4;$o++):?>
                                <div class="col-md-3"><a href="#" class="thumbnail" style="border: none;"><img class="imgCarrossel" src="<?php echo base_url('assets/'.$version.'/img/site/partiner/1.png');?>" alt="Image" style="max-width:100%;"></a></div>
                                <?php endfor; ?>

                            </div><!--.row-->
                        </div><!--.item-->

                        <?php endfor; ?>


                    </div><!--.carousel-inner-->
                    <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
                    <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
                </div><!--.Carousel-->

            </div>
        </div>
    </div><!--.container-->
<?php $this->load->view('clients/fixed_files/footer'); ?>