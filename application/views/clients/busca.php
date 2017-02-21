<?php $this->load->view('clients/fixed_files/header'); ?>

<br>
<script>

    window.onload = function () {

        categoria('0', '1', '1', 'produtoshome', 'produtos','<?php echo $_GET['q'];?>','11');

    }

</script>
<br>
<br>
<br>
<div class="container s-results margin-bottom-50" >
    <div class="row">
        <div class="col-md-2 hidden-xs related-search">
            <div class="row">
                <div class="col-md-12 col-sm-4">
                    <h3>Relacionados</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Web design company</a></li>
                        <li><a href="#">Web design tutorials</a></li>
                        <li><a href="#">Self designing</a></li>
                    </ul>
                    <hr>
                </div>

                <div class="col-md-12 col-sm-4">
                    <h3>Mais Buscados</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Basic Concepts</a></li>
                        <li><a href="#">‎Building your first web page</a></li>
                        <li><a href="#">‎Advanced HTML</a></li>
                    </ul>
                    <hr>
                </div>

                <div class="col-md-12 col-sm-4">
                    <h3>Indicados</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Bootstrap</a></li>
                        <li><a href="#">Wrapbootstrap</a></li>
                        <li><a href="#">Codrops</a></li>
                    </ul>
                    <hr>
                </div>

                <?php if($status == true):?>
                <div class="col-md-12 col-sm-4">
                    <h3>Search history</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Web design articles</a></li>
                        <li><a href="#">Tutorials for web design</a></li>
                    </ul>
                    <a class="see-all" href="#">See all</a>
                    <hr>
                </div>

                <?php endif;?>

                <div class="col-md-12 col-sm-4">
                    <h3>Veja Também</h3>
                    <ul class="list-unstyled blog-photos margin-bottom-30">
                        <?php for($i=0;$i<8;$i++):?>
                        <li ><a href="#" ><img style="border: 1px solid #e2e2e2; padding: 5px;" src="http://www.100dicas.com/wp-content/uploads/2014/05/Saiba-Mais-de-Enxaguante-Bucal.jpg" alt="" class="hover-effect"></a>
                        </li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div><!--/col-md-2-->

        <div class="col-md-10">
            <span class="results-number">384,907 resultados encontrados</span>.

            <div class="filtro" style="width: 100%; overflow: hidden;">
                <div class="inputs-filtro" >
                    <h5 style="float: left;color: #727272;">Filtrar por:&nbsp;&nbsp;&nbsp;</h5>


                    <i style="color: #940f14;" class="glyphicon glyphicon-th-large"></i>
                    <select onchange="categoria(this.value,'1','1','produtoshome','produtos','<?php echo $_GET['q'];?>','11');" class="categoria-filtro">
                        <option style="display: none;" disabled selected>Categorias</option>
                        <?php
                        $this->db->from('categorias');
                        $this->db->where('tipo',1);
                        $this->db->order_by('id','desc');
                        $get = $this->db->get();
                        $count = $get->num_rows();
                        if($count > 0):

                            $result = $get->result_array();
                        foreach ($result as $dds){

                            echo '<option value="'.$dds['id'].'">'.$dds['nome'].'</option>';
                        }

                        else:

                        echo '<option value="0" disabled>Nenhuma Categoria</option>';

                        endif;

                        ?>



                    </select>
                    &nbsp;&nbsp;&nbsp;
                    <i style="color: #940f14;" class="glyphicon glyphicon-th-list"></i>
                    <select onchange="categoria(this.value,'1','1','produtoshome','produtos','<?php echo $_GET['q'];?>','11');" class="farmaceutica-filtro">
                        <option style="display: none;" selected disabled>Farmaceuticas</option>
                        <?php
                        $this->db->from('categorias');
                        $this->db->where('tipo',2);
                        $this->db->order_by('id','desc');
                        $get = $this->db->get();
                        $count = $get->num_rows();
                        if($count > 0):

                            $result = $get->result_array();
                            foreach ($result as $dds){

                                echo '<option value="'.$dds['id'].'">'.$dds['nome'].'</option>';
                            }

                        else:

                            echo '<option value="0" disabled>Nenhuma Categoria</option>';

                        endif;

                        ?>



                    </select>
                </div>


                <div class="container explication">

                    <div id="Loading">

                    </div>

                    <div id="produtos" style="z-index: 10; position: relative;">

                    </div>

                </div>

            </div>
            </div>
            <!-- Begin Inner Results -->
        <br>
        <div class="banner-top" style="position: relative;float: left;">
            <!-- LOMADEE - BEGIN -->
            <script type="text/javascript" language="javascript">
                lmd_source="35752991";
                lmd_si="33857233";
                lmd_pu="22719751";
                lmd_c="BR";
                lmd_wi="728";
                lmd_he="90";
            </script>
            <script src="http://image.lomadee.com/js/ad_lomadee.js" type="text/javascript" language="javascript"></script>
            <!-- LOMADEE - END -->    </div>
            <div class="margin-bottom-30"></div>


        </div><!--/col-md-10-->
    </div>
</div>

<style>

    .explication {
        margin-top: 15px;
    }

</style>





<div class="container carrosecontent" style="margin-top: 50px;z-index: 0;">

    <div class="row"><br>

        <br>
        <div class="col-md-12">


        </div>
    </div>
</div><!--.container-->

<?php $this->load->view('clients/fixed_files/footer'); ?>
