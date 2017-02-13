<h4>Produtos em destaque</h4>
<br>
<br>
<div class="row" style="padding: 0 0 0 3%;">
<style>
    .pager a {
        color: #940f14;
    }

</style>
<?php for($i=0;$i<=20;$i++):?>
    <div class="col-sm-5 col-md-4" style="border: none;">
        <div class="thumbnail" style="border:none; border-radius:0;box-shadow:none; border-right: 1px solid #f2f2f2; ">
            <span style="position: absolute;left: 68%; padding: 1% 3% 1% 2% ;color: white;font-weight: 600; background: #972227; float: right;">- 15% OFF</span>
            <img src="http://drogariaspacheco.vteximg.com.br/arquivos/ids/201242-1000-1000/62472.jpg" alt="...">
            <div class="caption">
                <div style="float: left; width: 55%; padding-left: -10px;margin-right: 10px; ">
                <h4 style="margin-bottom: 0;"><b>Novalgina 500 MG</b></h4>
                    <span>Em <a href="" style="color: #940f14;font-weight: 600;">Drogaria Unida</a></span>
                </div>

                <div style="float: right;border-left: 1px solid #d6d6d6; padding-left: 10px;">
           <span style="color: #a9acb1;">de R$20.00</span><br>
           <span style="font-size: 14pt;font-weight: 600; color: #940f14;">R$200.00</span>

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