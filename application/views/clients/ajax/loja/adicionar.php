<div id="payment" class="profile-edit tab-pane active">
    <h2 class="heading-md">Adicione seus Produtos Aqui</h2>
    <p>Você Pode Adicionar Enviando um Arquivo <a>XML</a> com os dados do Produto ou se Já Existir o Produto em nosso Estoque Você Pode Adicionar Pelo <a>Codigo do Produto</a>.</p>
    <p><a>Clique Aqui</a> Para ver Como Funciona o Envio do Arquivo <a>XML</a>.</p>
    <br>
    <form class="sky-form" id="sky-form" action="#" novalidate="novalidate">

        <dt>Enviar Arquivo XML</dt>
        <dd>
            <section>
                <label class="input" for="xmlFile">
                    <i class="icon-append fa fa-file-text-o"></i>
                    <input type="file" id="xmlFile" placeholder="Enviar XML" name="xml">
                    <b class="tooltip tooltip-bottom-right">Arquivo XML</b>
                </label>
            </section>
        </dd>
        </form>
    <hr>
    <form class="sky-form" id="sky-form" action="#" novalidate="novalidate">

        <div class="inline-group">
            <label class="radio"><input onclick="categoria('<?php echo base_url(''); ?>','32', '1','0','additenscampo','addPiTENS','1','');" type="radio" name="radio-inline"><i class="rounded-x"></i>Digitar Informações</label>
            <label class="radio"><input onclick="categoria('<?php echo base_url(''); ?>','33', '1','0','additenscampo','addPiTENS','1','');" type="radio" name="radio-inline"><i class="rounded-x"></i>Codigo do Produto</label>
        </div>
<div id="addPiTENS">

    </div>


    </form>
</div>