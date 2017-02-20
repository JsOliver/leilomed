<?php $this->load->view('clients/fixed_files/header'); ?>

<script>


    window.onload = function () {

        categoria('21', '1','0','meuslances','todos');

    }

</script>
<div class="col-md-9" xmlns="http://www.w3.org/1999/html">
    <div class="profile-body">

        <div class="profile-body margin-bottom-20">
            <div class="tab-v1">
                <ul class="nav nav-justified nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#todos" aria-expanded="true" onclick="categoria('21', '1','0','meuslances','todos');">Todos os Lances</a></li>
                    <li><a data-toggle="tab" href="#abertos" onclick="categoria('22', '1','0','meuslances','abertos');">Lances em Aberto</a></li>
                    <li><a data-toggle="tab" href="#encerrados" onclick="categoria('23', '1','0','meuslances','encerrados');">Lances Finalizados</a></li>
                </ul>
                <div class="tab-content">
                    <div id="todos" class="profile-edit tab-pane fade active in">



                    </div>


                    <div id="abertos" class="profile-edit tab-pane fade">

                    </div>

                    <div id="encerrados" class="profile-edit tab-pane fade">

                    </div>


                </div>
            </div>
        </div>
        <!--Timeline-->
        <!--End Timeline-->

    </div>
</div>
</div>
</div>
<?php $this->load->view('clients/fixed_files/footer'); ?>
