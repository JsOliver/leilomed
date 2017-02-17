<?php $this->load->view('clients/fixed_files/header'); ?>




        <!-- Profile Content -->
        <div class="col-md-9">
            <div class="profile-body">
                <div class="row margin-bottom-20">
                    <!--Profile Post-->
                    <div class="col-sm-6">
                        <div class="panel panel-profile no-bg">
                            <div class="panel-heading overflow-h">
                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i>Visitados</h2>
                                <a href="#"><i class="fa fa-plus pull-right"></i></a>
                            </div>
                            <div id="scrollbar" class="panel-body no-padding mCustomScrollbar _mCS_2 mCS-autoHide"
                                 data-mcs-theme="minimal-dark" style="position: relative; overflow: visible;">
                                <div id="mCSB_2" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside"
                                     tabindex="0">
                                    <div id="mCSB_2_container" class="mCSB_container"
                                         style="position:relative; top:0; left:0;" dir="ltr">
                                        <?php for($i=0;$i<5;$i++):?>

                                        <div class="profile-post color-one">
                                            <span class="profile-post-numb">01</span>
                                            <div class="profile-post-in">
                                                <h3 class="heading-xs"><a href="#">Creative Blog</a></h3>
                                                <p>How to market yourself as a freelance designer</p>
                                            </div>
                                        </div>
                                      <?php endfor;?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Profile Post-->

                    <!--Profile Event-->
                    <div class="col-sm-6 md-margin-bottom-20">
                        <div class="panel panel-profile no-bg">
                            <div class="panel-heading overflow-h">
                                <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i>Melhores Ofertas
                                </h2>
                                <a href="#"><i class="fa fa-plus pull-right"></i></a>
                            </div>
                            <div id="scrollbar2" class="panel-body no-padding mCustomScrollbar _mCS_3 mCS-autoHide"
                                 data-mcs-theme="minimal-dark" style="position: relative; overflow: visible;">
                                <div id="mCSB_3" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical mCSB_outside"
                                     tabindex="0">
                                    <div id="mCSB_3_container" class="mCSB_container"
                                         style="position:relative; top:0; left:0;" dir="ltr">


                                        <?php for($i=0;$i<4;$i++):?>
                                        <div class="profile-event">
                                            <div class="date-formats">
                                                <span>07</span>
                                                <small>08, 2014</small>
                                            </div>
                                            <div class="overflow-h">
                                                <h3 class="heading-xs"><a href="#">Apple Conference</a></h3>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry printing.</p>
                                            </div>
                                        </div>
                                        <?php endfor;?>


                                    </div>
                                </div>
                                <div id="mCSB_3_scrollbar_vertical"
                                     class="mCSB_scrollTools mCSB_3_scrollbar mCS-minimal-dark mCSB_scrollTools_vertical"
                                     style="display: block;">
                                    <div class="mCSB_draggerContainer">
                                        <div id="mCSB_3_dragger_vertical" class="mCSB_dragger"
                                             style="position: absolute; min-height: 50px; display: block; height: 213px; max-height: 286px;"
                                             oncontextmenu="return false;">
                                            <div class="mCSB_dragger_bar" style="line-height: 50px;"></div>
                                        </div>
                                        <div class="mCSB_draggerRail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Profile Event-->
                </div><!--/end row-->

                <hr>
                <br>

                <!--Profile Blog-->
                <div class="panel panel-profile">
                    <div class="panel-heading overflow-h">
                        <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>Farmacias Salvas</h2>
                        <a href="page_profile_users.html"
                           class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">Ver Tudo</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <?php for($i=0;$i<2;$i++):?>
                            <div class="col-sm-6">
                                <div class="profile-blog blog-border">
                                    <img class="rounded-x" src="assets/img/testimonials/img1.jpg" alt="">
                                    <div class="name-location">
                                        <strong>Mikel Andrews</strong>
                                        <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a
                                                href="#">US</a></span>
                                    </div>
                                    <div class="clearfix margin-bottom-20"></div>
                                    <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus.
                                        Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                    <hr>
                                    <ul class="list-inline share-list">
                                        <li><i class="fa fa-bell"></i><a href="#">12 Notifications</a></li>
                                        <li><i class="fa fa-group"></i><a href="#">54 Followers</a></li>
                                        <li><i class="fa fa-twitter"></i><a href="#">Retweet</a></li>
                                    </ul>
                                </div>
                            </div>
                            <?php endfor;?>
                        </div>
                    </div>
                </div>
                <!--End Profile Blog-->

                <hr>


                <div class="table-search-v1 margin-bottom-20">

                    <h2>Meus Lances</h2>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped">

                            <thead>

                            <tr>
                                <th>Name</th>
                                <th class="hidden-sm">Description</th>
                                <th>Headquarters</th>
                                <th>Progress</th>
                                <th style="width: 100px;">Status</th>
                                <th>Contacts</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php for($i=0;$i<7;$i++):?>
                            <tr>
                                <td>
                                    <a href="#">HP Enterprise Service</a>
                                </td>
                                <td class="td-width">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec
                                    porttitor arcu.
                                </td>
                                <td>
                                    <div class="m-marker">
                                        <a href="#"><i class="color-green fa fa-map-marker"></i></a>
                                        <a href="#" class="display-b">USA</a>
                                        <a href="#">Palo Alto</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="progress progress-u progress-xxs">
                                        <div class="progress-bar progress-bar-u" role="progressbar" aria-valuenow="88"
                                             aria-valuemin="0" aria-valuemax="100" style="width: 88%">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-u btn-u-red btn-block btn-u-xs"><i
                                            class="fa fa-sort-amount-desc margin-right-5"></i> Deep
                                    </button>
                                </td>
                                <td>
                                    <span>1(123) 456</span>
                                    <span><a href="#">info@example.com</a></span>
                                </td>
                            </tr>
                            <?php endfor;?>

                            </tbody>

                        </table>
                    </div>
                    <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Ver Mais</button>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $this->load->view('clients/fixed_files/footer'); ?>
