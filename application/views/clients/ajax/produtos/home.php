<h3>Produtos em destaque</h3>
<br>
<br>
<div class="row" style="padding: 0 0 0 3%;">
<style>
    .pager a {
        color: #940f14;
    }

    /*Add to Cart*/
    .illustration-v2 .add-to-cart {

        visibility: hidden;
        background: rgba(255,255,255,0.8);
    }


    .illustration-v2 .add-to-cart:hover {
        color: #fff;
        text-decoration: none;
        background: rgba(24,171,155,0.5);
        transition: background-color 0.2s ease-in-out;
    }

    .illustration-v2 .add-to-cart:hover i {
        color: #fff;
    }

    .illustration-v2 .product-img:hover .add-to-cart {
        visibility: visible;
    }

</style>
<?php for($i=0;$i<=20;$i++):?>
    <div class="col-sm-5 col-md-4 illustration-v2" id="compra" style="border: none;">
        <div class="thumbnail product-img" style="border:none; border-radius:0;box-shadow:none; border-right: 1px solid #f2f2f2; ">
            <span style="position: absolute;left: 68%; padding: 1% 3% 1% 2% ;color: white;font-weight: 600; background: #972227; float: right;">- 5% OFF</span>

            <a style="position: absolute;top:30%; text-decoration:none;left: 38%; padding: 2% 4% 2% 4% ;color: white;font-weight: 600; background: #972227; float: right;"  class="add-to-cart" href="<?php echo base_url('loja/drogaria-unida/produto/dipirona-monohidratada-generico/1514');?>"><i class="fa fa-shopping-cart"></i> Ver Detalhes</a>
            <img  style="height: 200px;" src="https://i0.wp.com/biosom.com.br/blog/wp-content/uploads/2016/05/o-que-e-dipirona-capa.png?fit=1000%2C600&ssl=1" alt="...">

            <div class="caption">
                <div style="float: left; width: 60%; padding-left: -10px;margin-right: 10px; ">
                <h4 style="margin-bottom: 0;"><b><a style="color: black;text-decoration: none;" href="<?php echo base_url('loja/drogaria-unida/produto/dipirona-monohidratada-generico/1514');?>">Imecap HEAR 500 MG</a></b></h4>
                    <span>Em <a href="" style="color: #940f14;font-weight: 600;">Drogaria Unida</a></span>
                </div>

                <div style="float: right;border-left: 1px solid #d6d6d6; padding-left: 10px;">
           <span style="color: #a9acb1;">de R$10.00</span><br>
           <span style="font-size: 14pt;font-weight: 600; color: #940f14;">R$8.90</span>

                </div>

                <br>
                <br>
                <br>

            </div>
        </div>
    </div>
<?php endfor;?>

    <nav aria-label="Page navigation">
        <ul class="pager">
            <li>
                <a href="javascript:categoria(<?php echo $_POST['tipo'];?>,<?php echo $_POST['page'] - 1;?>);" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li><a href="javascript:categoria(<?php echo $_POST['tipo'];?>,<?php echo 1;?>);">1</a></li>
            <li>
                <a href="javascript:categoria(<?php echo $_POST['tipo'];?>,<?php echo $_POST['page'] + 1;?>);" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<br>
<div class="banner-top" style="position: relative;">
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
    <!-- LOMADEE - END --></div>