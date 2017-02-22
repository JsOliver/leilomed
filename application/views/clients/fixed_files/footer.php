<br>
<br>
<br>
<br>
<br>
<link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
<!--footer start from here-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 footerleft ">
                <div class="logofooter"> <img style="width: 250px;" src="<?php echo base_url('assets/'.$version.'/img/site/logo/logo1.png');?>"></div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
             <!--
                <p><i class="fa fa-map-pin"></i> 210, Aggarwal Tower, Rohini sec 9, New Delhi -        110085, INDIA</p>
                <p><i class="fa fa-phone"></i> Phone (India) : +91 9999 878 398</p>
                <p><i class="fa fa-envelope"></i> E-mail : info@webenlance.com</p> -->

            </div>
            <div class="col-md-2 col-sm-6 paddingtop-bottom">
                <h6 class="heading7">Informações</h6>
                <ul class="footer-ul">
                    <li><a href="#"> Career</a></li>
                    <li><a href="#"> Privacy Policy</a></li>
                    <li><a href="#"> Terms & Conditions</a></li>

                </ul>
            </div>
            <div class="col-md-2 col-sm-6 paddingtop-bottom">
                <h6 class="heading7">Categorias</h6>
                <ul class="footer-ul">
                    <li><a href="#"> Career</a></li>
                    <li><a href="#"> Privacy Policy</a></li>
                    <li><a href="#"> Terms & Conditions</a></li>

                </ul>
            </div>

            <div class="col-md-3 col-sm-6 paddingtop-bottom">
                <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                    <div class="fb-xfbml-parse-ignore">
                        <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook">Facebook</a></blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer start from here-->

<div class="copyright">
    <div class="container">
        <div class="col-md-6">
            <p>© 2016 - All Rights with Webenlance</p>
        </div>
        <div class="col-md-6">
            <ul class="bottom_ul">
                <li><a href="#">webenlance.com</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Faq's</a></li>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">Site Map</a></li>
            </ul>
        </div>
    </div>
</div>
<?php
echo $this->head->js(0,$version,$page);
?>
<script>
    var file = 'fileUpload';
    var url = '<?php echo base_url('ajaxcontroler/uploadimage');?>';
    var preview = 'profileimg';
</script>
<script type="text/javascript" id="ajax-upload">

    $(function () {
        var form;
        $('#' + file + '').change(function (event) {
            form = new FormData();
            form.append(file, event.target.files[0]);
            $("#errorData").html('Carregando...');

            $.ajax({
                url: url,
                data: form,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {

                    if (data > 0) {
                        $("#" + preview + "").attr("src", "<?php echo base_url('imagem?tp=2&&im=22&&image='.$_SESSION['ID'].'');?>");
                        $("#errorData").html('');

                    } else {
                        $("#errorData").html(data);
                    }

                }
            });
        });


    });
</script>
<?php if($page == 'logcad'):?>
<script>
    var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

    $('#telofone').mask(SPMaskBehavior, spOptions);
</script>

<?php endif;?>

<?php if($page == 'busca'):

    if(isset($_GET['c'])):
        $categoria = $_GET['c'];

    else:


        $categoria = '0';

    endif;
    ?>
    <script>

        window.onload = function () {

            categoria('<?php echo base_url('');?>',<?php echo $categ;?>, '1', '1', 'produtoshome', 'produtos','<?php echo $key;?>','11');

        }

    </script>
<?php endif;?>
<script>
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll > 200) {
            $('.menufixed').css('position','fixed');
            $('.menufixed').css('top','0');

        } else {
            $('.menufixed').css('position','absolute');
            $('.menufixed').css('margin-top','0');

        }
    });
    </script>
<script>
    jQuery(document).ready(function() {
        App.init();
        App.initScrollBar();
        OwlCarousel.initOwlCarousel();
        StyleSwitcher.initStyleSwitcher();
        MasterSliderShowcase2.initMasterSliderShowcase2();
    });
</script>
</body>
</html>