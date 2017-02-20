<div class="panel panel-profile">
    <div class="panel-heading overflow-h">
        <?php if($_POST['tipo'] == 21):

            echo '<h2 class="panel-title heading-sm pull-left"><i class="fa fa-gavel"></i> Todos os Lances</h2>';
        elseif($_POST['tipo'] == 22):
            echo '<h2 class="panel-title heading-sm pull-left"><i class="fa fa-gavel"></i> Lances em Aberto</h2>';

        elseif($_POST['tipo'] == 23):
            echo '<h2 class="panel-title heading-sm pull-left"><i class="fa fa-gavel"></i> Lances Encerrados</h2>';
        else:


        endif;
        ?>
    </div>
    <div class="panel-body">
        <ul class="timeline-v2 timeline-me">
            <?php for ($i = 0; $i < 10; $i++): ?>

                <li>
                    <time datetime="" class="cbp_tmtime"><a style="cursor:pointer;" data-toggle="modal"
                                                            data-target="#lance<?php echo $i; ?>"<span>Dipirona 100 MG</span>
                        <span>20/02/2017 as 13:56</span></a></time>
                    <i class="cbp_tmicon rounded-x hidden-xs"></i>
                    <div class="dropdown show pull-right">
                        <a class="btn btn-secondary dropdown-toggle" href="#" id="cong" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-cog "></i>
                        </a>

                        <div class="dropdown-menu" style="float: left;text-align: left; padding: 30% 0 30% 30%; width: 10px;"
                             aria-labelledby="cong">
                            <a class="dropdown-item" href="#">Cancelar</a><br>
                            <a class="dropdown-item" href="#">Editar</a>
                        </div>
                    </div><br>
                    <img src="http://araujo.vteximg.com.br/arquivos/ids/2777086-1000-1000/07896714201177img-imagem-id-54544.jpg" style="float: left;width: 80px;">
                    <div class="cbp_tmlabel">
                        <h2>
                            <?php if($_POST['tipo'] == 21):?>
                            <a style="cursor:pointer;" data-toggle="modal"
                               data-target="#lance<?php echo $i; ?>">Lance Ofertado</a>

                    <?php else:?>
                                <a style="cursor:pointer;" data-toggle="modal"
                                   data-target="#lance<?php echo $i; ?>">Solicitado Compra</a>
                    <?php endif;?>
                    </h2>

                        <p><a style="cursor:pointer;" data-toggle="modal" data-target="#lance<?php echo $i; ?>">Winter
                                purslane courgette pumpkin quandong komatsuna fennel green bean cucumber
                                watercress. Peasprouts wattle seed rutabaga okra yarrow cress avocado grape.</a>
                        </p>
                    </div>
                </li>
                <div style="top: 10%;border-radius: 0; z-index: 200000;" class="modal fade"
                     id="lance<?php echo $i; ?>" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content" style="border-radius:0px;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel" style="float: left;color: black;">
                                    Detalhes do Pedido - <b class="textarea-info">51454</b></h4>
                            </div>
                            <div class="modal-body">
                                <div class="row" style="padding: 2%">
                                    <div class="col-md-8">
                                        <h4 style="font-weight: bold;color: black; font-size: 12pt;">Lance sobre
                                            o produto<br> <a style="color: #940f14;">Dorflex Safoni 30
                                                Comprimidos</a></h4>
                                        <hr>
                                        <h5 style="color: black;text-align: left;">Indique a quantidade desejada
                                            e o valor de sua proposta</h5>

                                        <div style="text-align: left;">
                                            <form>
                                                <label style="width: 28%;">
                                                    <b style="font-size: 15pt;">R$ 8.15 |</b>

                                                </label>
                                                <label style="width:28%;">
                                                    <b style="font-size: 12pt;">Qntd.</b>

                                                    5 </label>
                                            </form>
                                            <br>
                                            <p>
                                                <b>Telefone de Contato: </b> (33) 99921-3492
                                            </p>
                                            <p>
                                                <b>Email para Contato: </b> farmaciasbr@gmail.com
                                            </p>
                                            <p style="margin-top: 5px;">
                                                Integer <strong>dapibus ut elit</strong> non volutpat. Integer auctor purus a lectus suscipit
                                                fermentum. Vivamus lobortis nec erat consectetur elementum.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="border: 1px solid #dfdfdf;">
                                        <a><img style="width: 100%;"
                                                src="http://araujo.vteximg.com.br/arquivos/ids/2777086-1000-1000/07896714201177img-imagem-id-54544.jpg"></a>
                                        <br>
                                        <hr>

                                        <div>
                                            <b style="margin-top: 5px;">Valor total: R$ <?php echo 8.15 * 5; ?></b><br>
                                            <b>Enviada: <i style="color: #30944c;" class="fa fa-check"
                                                           aria-hidden="true"></i> </b><br>
                                            <b>Recebida: <i style="color: #30944c;" class="fa fa-check"
                                                            aria-hidden="true"></i> </b><br>
                                            <b>Lida: <i style="color: #940f14;" class="fa fa-times"
                                                        aria-hidden="true"></i></b><br>
                                            <b>Resposta: <span class="text-info">Aguardando...</span></b>
                                        </div>
                                        <br>
                                    </div>



                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <br>
            <?php endfor; ?>
        </ul>
    </div>
    <nav aria-label="Page navigation">
        <ul class="pager">
            <li>
                <a href="javascript:categoria('<?php echo $_POST['tipo']?>', '1','1','meuslances','<?php echo $_POST['resutblock'];?>');" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <li><a href="javascript:categoria('<?php echo $_POST['tipo']?>', '1','1','meuslances','<?php echo $_POST['resutblock'];?>');">1</a></li>
            <li>
                <a href="javascript:categoria('<?php echo $_POST['tipo']?>', '1','1','meuslances','<?php echo $_POST['resutblock'];?>');" aria-label="Next">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
