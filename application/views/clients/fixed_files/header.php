<?php echo $this->head->header(0,$title,$metas,$version); ?>
<body>
<style>a{
        text-decoration: none;
    }

    .navbar-brand {
        transform: translateX(-50%);
        left: 50%;
        position: absolute;
        color: #ffffff;
        font-size: 30pt;
        margin-top: 30px;
    }
    #busca {
        transform: translateX(-50%);
        left: 50%;
        position: absolute;
        color: #ffffff;
        margin-top: 60px;
        width: 40%;
        z-index: 0;
        border: none;


    }
    #busca input{
        width: 95%;
        border-radius: 20px;
        position: absolute;
        z-index: 0;
    }
    #busca #submit{
        float: left;
        margin: 0 0 0 90%;
        z-index: 1;
        position: absolute;
        background:#facf0d ;
        border-radius: 0 20px 20px 0;
        border: none;
        padding: 7px 15px 7px 8px;

    }

    .navfarm{
        background: #b01b1f;
        border: none;
        border-radius: 0px;
        height: 200px;
    }

    #linksheader li{
        padding: 0;
    }

    #linksheader li a {
        color: #ffffff;

    }

    #linksheader .open
    {
        background: none;
    }



    #linksheader li a {
        border-top: 3px solid #b01b1f;
    }
    #linksheader li .active{


        border-top: 3px solid #facf0d;
        color: #facf0d;
    }

    .dropdown-menu{
        background: #b01b1f;
    }
    </style>

    <nav class="navbar navbar-default navfarm">

        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="color: #ffffff;">LEILO<b>FARMA</b></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right" id="linksheader">
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#">Quem Somos</a></li>

                    <li class="dropdown" style="background: none;text-decoration: none;">
                        <a href="#"  style="background: none;text-decoration: none;" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categorias <span class="caret"></span></a>
                        <ul class="dropdown-menu" style=" background: #b01b1f; position: absolute; z-index: 100;">
                            <li><a href="#"  style="background: none;text-decoration: none;">Home</a></li>
                            <li><a href="#"  style="background: none;text-decoration: none;">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"  style="background: none;text-decoration: none;">Separated link</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Fale conosco</a></li>

                </ul>
            </div><!-- /.navbar-collapse -->
            <form style="border: none;" class="navbar-form navbar-left" id="busca">
                    <input style="border: none;" type="text" class="form-control" placeholder="Pesquise pelo nome, farmacêutica, substância">

                <button style="border: none;" type="submit" id="submit"><i class="glyphicon glyphicon-search"></i></button>

            </form>



            <div class="navbar-form navbar-right">



                <li class="dropdown open" style="text-decoration: none;list-style: none; ">
                    <ul class="dropdown-menu" style="text-align:center;background:rgba(0, 0, 0, 0.19);z-index: 0; position:relative;margin: 0px 160px 0 -100px; width: 20%; border: none;">

                        <li> <a href="#" style="text-align:center;font-size:9pt;color: white;background: none;text-decoration: none;"><i style="font-size: 15pt;float: left;margin: 6px 0 0 -2px;" class="glyphicon glyphicon-user"></i> Olá Visitante,<br> já e cadastrado?</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"  style="font-size:9pt;color: white;background: none;text-decoration: none;"><i style="font-size: 15pt;float: left;margin: 6px 0 0 -2px;" class="glyphicon glyphicon-list"></i> Criar minha lista<br> de produtos</a></li>
                    </ul>
                </li>

            </div>

        </div>

    </nav>
<nav class="navbar navbar-default" style="margin: -20px 0;padding: 0; background: #b01b1f; border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 0px;">
    <div class="container-fluid">


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="  transform: translateX(-35%);
        left: 35%;
        position: absolute;
        color: #ffffff;
        width: 90%;
        padding: 0 0 0 10%;


      ">
            <ul class="nav navbar-nav" >
                <li style="border-right: 1px solid rgba(0, 0, 0, 0.10);"><a style="color: white;" href="#">MEDICAMENTOS</a></li>
                <li style="border-right: 1px solid rgba(0, 0, 0, 0.10);"><a style="color: white;" href="#">GENÉRICOS</a></li>
                <li style="border-right: 1px solid rgba(0, 0, 0, 0.10);"><a style="color: white;"  href="#">DERMOCOSMÉTICOS</a></li>
                <li style="border-right: 1px solid rgba(0, 0, 0, 0.10);"><a style="color: white;"  href="#">HIGIENE</a></li>
                <li style="border-right: 1px solid rgba(0, 0, 0, 0.10);"><a style="color: white;"  href="#">PERFUMARIA</a></li>
                <li style="border-right: 1px solid rgba(0, 0, 0, 0.10);"><a style="color: white;"  href="#">HIGIENE</a></li>
                <li style="border-right: 1px solid rgba(0, 0, 0, 0.10);"><a style="color: white;"  href="#">NUTRIÇÃO</a></li>
                <li style="border-right: 1px solid rgba(0, 0, 0, 0.10);"><a style="color: white;"  href="#">INFANTIS</a></li>
                <li style="border-right: 1px solid rgba(0, 0, 0, 0.10);"><a style="color: white;"  href="#">SAÚDE BUCAL</a></li>

            </ul>

        </div>
    </div>
</nav>
