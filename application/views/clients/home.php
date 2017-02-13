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

            <div id="produtos">

            </div>

        </div>

    </div>


<?php $this->load->view('clients/fixed_files/footer'); ?>