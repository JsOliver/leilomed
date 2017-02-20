<?php $this->load->view('clients/fixed_files/header'); ?>
<br>
<br>
<br>
<div class="content-md margin-bottom-30" style="">
    <div class="container">
        <form class="shopping-cart" action="#" novalidate="novalidate">
            <div role="application" class="wizard clearfix" id="steps-uid-0">
                <div class="content clearfix">

                    <section id="steps-uid-0-p-0" role="tabpanel" aria-labelledby="steps-uid-0-h-0" class="body current"
                             aria-hidden="false">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Lance</th>
                                    <th>Qnt</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>


                                <tr>
                                    <td class="product-in-table">
                                        <img class="img-responsive" src="assets/img/thumb/08.jpg" alt="">
                                        <div class="product-it-in">
                                            <h3>Double-Breasted</h3>
                                            <span>Sed aliquam tincidunt tempus</span>
                                        </div>
                                    </td>
                                    <td>$ 160.00</td>
                                    <td>
                                        <button type="button" class="quantity-button" name="subtract"
                                                onclick="javascript: subtractQty1();" value="-">-
                                        </button>
                                        <input type="text" class="quantity-field" name="qty1" value="5" id="qty1">
                                        <button type="button" class="quantity-button" name="add"
                                                onclick="javascript: document.getElementById(&quot;qty1&quot;).value++;"
                                                value="+">+
                                        </button>
                                    </td>
                                    <td class="shop-red">$ 320.00</td>
                                    <td>
                                        <button type="button" class="close"><span>×</span><span
                                                class="sr-only">Close</span></button>
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </section>


                </div>

            </div>
        </form>
    </div><!--/end container-->
</div><?php $this->load->view('clients/fixed_files/footer'); ?>
