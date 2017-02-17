<?php echo $this->head->header(0,$title,$metas,$version,$page); ?>
<body>

 <nav style=" background: #b01b1f; border: none;border-radius: 0;" class="navbar navbar-default navfarm">

        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('');?>">
                    <img style="margin: -25px 0 0 0;" src="<?php echo base_url('assets/'.$version.'/img/site/logo/logo1.png');?>">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right" id="linksheader">
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#">Quem Somos</a></li>
                    <li><a href="#">Fale conosco</a></li>

                </ul>
            </div><!-- /.navbar-collapse -->

            <form style="border: none;" class="navbar-form navbar-left" id="busca">
                    <input style="border: none; margin-top: 10px;" type="text" class="form-control" placeholder="Pesquise pelo nome, farmacêutica, substância">

                <button style="border: none;margin-top: 10px;" type="submit" id="submit"><i class="glyphicon glyphicon-search"></i></button>

            </form>



            <div class="navbar-form navbar-right">



                <li class="dropdown open" style="text-decoration: none;list-style: none; ">
                    <ul class="dropdown-menu dropdown-menu-top" style="text-align:center;background:rgba(0, 0, 0, 0.19);z-index: 0; position:relative;margin: 0px 160px 0 -100px; width: 20%; border: none;">

                        <li> <a href="<?php echo base_url('entrar');?>" style="text-align:center;font-size:9pt;color: white;background: none;text-decoration: none;"><i style="font-size: 15pt;float: left;margin: 6px 0 0 -2px;" class="glyphicon glyphicon-user"></i> Olá Visitante,<br> já e cadastrado?</a></li>
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
        <div class="collapse navbar-collapse menufixed" id="bs-example-navbar-collapse-1" style="  transform: translateX(-35%);
        left: 35%;
        position: absolute;
        color: #ffffff;
        z-index: 10000;
         background: #b01b1f;
        width: 100%;
        padding: 0 0 0 10%;
        float: left;


      ">
            <ul class="nav navbar-nav" style="float: left;" >
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
<?php
if($page == 'profile'):
?>

 <div class="container content profile">
     <div class="row">
         <!--Left Sidebar-->
         <div class="col-md-3 md-margin-bottom-40">
             <img class="img-responsive profile-img margin-bottom-20" src="https://htmlstream.com/preview/unify-v1.9.8/assets/img/team/img32-md.jpg" alt="">

             <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                 <li class="list-group-item active">
                     <a href="page_profile.html"><i class="fa fa-bar-chart-o"></i> Resumo</a>
                 </li>
                 <li class="list-group-item">
                     <a href="page_profile_me.html"><i class="fa fa-gavel"></i> Meus Lances</a>
                 </li>
                 <li class="list-group-item">
                     <a href="page_profile_users.html"><i class="fa fa-bookmark"></i> Itens Salvos</a>
                 </li>
                 <li class="list-group-item">
                     <a href="page_profile_projects.html"><i class="fa fa-medkit"></i> Farmacias Salvas</a>
                 </li>

                 <li class="list-group-item">
                     <a href="page_profile_history.html"><i class="fa fa-history"></i> Historico</a>
                 </li>
                 <li class="list-group-item">
                     <a href="page_profile_settings.html"><i class="fa fa-cog"></i> Configurações</a>
                 </li>
             </ul>



             <!--Notification-->
             <div class="panel-heading-v2 overflow-h">
                 <h2 class="heading-xs pull-left"><i class="fa fa-bell-o"></i> Notificações</h2>
             </div>
             <ul class="list-unstyled mCustomScrollbar margin-bottom-20 _mCS_1 mCS-autoHide"
                 data-mcs-theme="minimal-dark" style="position: relative; overflow: visible;">
                 <div id="mCSB_1" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside" tabindex="0">
                     <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;"
                          dir="ltr">

                         <?php for($i=0;$i<4;$i++):?>
                         <li class="notification">
                             <i class="icon-custom icon-sm rounded-x icon-bg-yellow icon-line fa fa-bolt"></i>
                             <div class="overflow-h">
                                 <span><strong>Natasha Kolnikova</strong> accepted your invitation.</span>
                                 <small>Yesterday 1:07 pm</small>
                             </div>
                         </li>
                         <?php endfor;?>
                     </div>
                 </div>
                 <div id="mCSB_1_scrollbar_vertical"
                      class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical"
                      style="display: block;">
                     <div class="mCSB_draggerContainer">
                         <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                              style="position: absolute; min-height: 50px; display: block; height: 240px; max-height: 286px;"
                              oncontextmenu="return false;">
                             <div class="mCSB_dragger_bar" style="line-height: 50px;"></div>
                         </div>
                         <div class="mCSB_draggerRail"></div>
                     </div>
                 </div>
             </ul>
             <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
             <!--End Notification-->

             <div class="margin-bottom-50"></div>

         </div>
         <!--End Left Sidebar-->
 <?php

endif;
?>
