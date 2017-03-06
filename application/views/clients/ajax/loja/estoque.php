<div class="tab-v1">
    <ul class="nav nav-justified nav-tabs">
        <li class="active"><a data-toggle="tab" href="#meusprodutos">Estoque Disponível</a></li>
        <li><a data-toggle="tab" href="#esgotado">Estoque Esgotado</a></li>
        <li><a data-toggle="tab" href="#adicionar">Adicionar Produtos</a></li>
    </ul>
    <div class="tab-content">


        <div id="meusprodutos" class="profile-edit tab-pane fade in active">
            <?php
            $this->db->from('produtos_disponiveis');
            $this->db->where('id_loja', $_POST['keyword']);
            $this->db->where('unidades >', 0);
            $get = $this->db->get();
            $count = $get->num_rows();
            if ($count > 0):

                $result = $get->result_array();
                ?>

                <div class="table-search-v2">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Imagem</th>
                                <th class="hidden-sm">Descrição</th>
                                <th>Estoque</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $characteres = array(
                                'Š' => 'S', 'š' => 's', 'Ð' => 'Dj', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A',
                                'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I',
                                'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U',
                                'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
                                'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i',
                                'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u',
                                'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y', 'ƒ' => 'f', ' ' => '_'
                            );
                            $arrayreplace = array("(", ")", "-");

                            foreach ($result as $dds) {

                                $this->db->from('lojas');
                                $this->db->where('id_loja', $dds['id_loja']);
                                $get = $this->db->get();
                                $count = $get->num_rows();

                                if ($count > 0):
                                    $result = $get->result_array();

                                    $lojaname = $result[0]['nome_loja'];

                                    $url = base_url('produto/' . str_replace(' ', '-', strtolower($lojaname) . '/' . str_replace(' ', '-', str_replace($arrayreplace, '', strtolower(urlencode(strtr($dds['nome_prod'], $characteres))))))) . '/' . $dds['id_pdp'];

                                else:
                                    $url = '#';

                                endif;

                                ?>
                                <tr>


                                    <td>
                                        <img class="rounded-x"
                                             src="<?php echo base_url('imagem?tp=1&&im=1&&image=' . $dds['id_produto'] . '') ?>"
                                             alt="">
                                    </td>
                                    <td class="td-width">
                                        <h3>
                                            <a href="<?php echo $url; ?>"><?php echo $dds['nome_prod']; ?></a>
                                        </h3>
                                        <p><?php

                                            $this->db->from('medicamentos');
                                            $this->db->where('id', $dds['id_produto']);
                                            $get = $this->db->get();
                                            $count = $get->num_rows();

                                            if ($count > 0):
                                                $result = $get->result_array();
                                                $texto = $result[0]['fixa_cal'];
                                            else:
                                                $texto = 'Descrição Indisponivel';
                                            endif;
                                            echo $texto;

                                            $data = $dds['data_adicionado'];
                                            $dia = substr($data, 8, 2);
                                            $mes = substr($data, 4, 2);
                                            $ano = substr($data, 0, 4);
                                            ?></p>
                                        <small class="hex">Adicionado em <?php echo $dia; ?>/<?php echo $mes; ?>
                                            /<?php echo $ano; ?></small>
                                    </td>
                                    <td>

                                        <?php

                                        if (empty($dds['unidades'])):

                                            echo 'Unidades Ilimitadas';
                                        else:

                                            echo '<b>' . $dds['unidades'] . '</b> unidades restantes';

                                        endif;

                                        ?>

                                    </td>
                                    <td>
                                        <ul class="list-inline s-icons" style="text-align: center;">
                                            <li title="Editar">
                                                <a data-toggle="modal"
                                                   data-target="#editar<?php echo $dds['id_pdp']; ?>" class="tooltips"
                                                   data-original-title="Facebook" href="#">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </a>
                                            </li>
                                            <li title="Remover">
                                                <a data-toggle="modal" data-target="#deletar<?php echo $dds['id_pdp']; ?>" class="tooltips"
                                                   data-original-title="Twitter" href="#">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </li>

                                        </ul>

                                    </td>
                                </tr>


                                <div class="modal fade bs-example-modal-lg" id="editar<?php echo $dds['id_pdp']; ?>"
                                     tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content" style="margin-top: 10%;border-radius: 0px;">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">
                                                    <b><?php echo $dds['nome_prod']; ?></b> - Editar</h4>
                                            </div>
                                            <div class="modal-body" style="padding: 3%;">
                                                <form class="sky-form">


                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nome do Produto</label>
                                                        <input type="text" class="form-control" id="nomeprodutoAlt<?php echo $dds['id_pdp'];?>"
                                                               placeholder="<?php echo 'Nome do Produto'; ?>"
                                                               value="<?php echo $dds['nome_prod']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Palavras Chaves</label>
                                                        <input type="text" maxlength="150" class="form-control" id="keywordprodutoAlt<?php echo $dds['id_pdp'];?>"
                                                               placeholder="<?php echo 'Palavras Chaves do Produto'; ?>"
                                                               value="<?php echo $dds['keywords']; ?>" onkeyup="mostrarResultado(<?php echo $dds['id_pdp'];?>,this.value,150,'spcontando<?php echo $dds['id_pdp'];?>');contarCaracteres(<?php echo $dds['id_pdp'];?>,this.value,150,'sprestante<?php echo $dds['id_pdp'];?>')">




                                                        <span id="spcontando<?php echo $dds['id_pdp'];?>">O Maximo de Caracteres e 150 Caracteres</span><br />
                                                        <span id="sprestante<?php echo $dds['id_pdp'];?>"></span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Preço do Produto</label>
                                                        <input type="text" class="form-control" id="prizeprodutoAlt<?php echo $dds['id_pdp'];?>"
                                                               placeholder="<?php echo 'Preço do Produto'; ?>"
                                                               value="<?php echo $dds['preco']; ?>">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Desconto do Produto
                                                            <small class="text-danger">(Desconto Opcional em
                                                                Porcercentagem)
                                                            </small>
                                                        </label>
                                                        <input type="number" class="form-control" id="descontoprodutoAlt<?php echo $dds['id_pdp'];?>"
                                                               placeholder="<?php echo 'Desconto Opcional em Porcercentagem'; ?>"
                                                               value="<?php echo $dds['desconto']; ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Quantidade no Estoque</label>
                                                        <input type="number" class="form-control" id="unidadeprodutoAlt<?php echo $dds['id_pdp'];?>"
                                                               placeholder="<?php echo 'Quantidades do Produto'; ?>"
                                                               value="<?php echo $dds['unidades']; ?>">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Código do Produto</label>
                                                        <b style="font-size: 12pt;">#dp0<?php echo $dds['id_loja']; ?></b>

                                                    </div>
                                                    <div class="form-group">


                                                        <label for="image1" style="cursor: pointer;">Imagem
                                                            Personalizada
                                                            <br>
                                                            <img style="width:100px; height:100px; "
                                                                 src="
                                                                 <?php if (empty($dds['image_1'])):

                                                                     echo '' . base_url('') . 'imagem?tp=1&&im=1&&image=' . $dds['id_produto'];

                                                                 else:

                                                                     echo '' . base_url('') . 'imagem?tp=1&&im=2&&image=' . $dds['id_pdp'];

                                                                 endif;
                                                                 ?>


                                                                ">
                                                            <br>
                                                            <input type="file" id="image1" name="image1"
                                                                   style="display:none;"/>

                                                            <small class="text-danger">(Alterar Imagem 1)</small>
                                                        </label>

                                                        <label for="image1" style="cursor: pointer;">
                                                            <br>
                                                            <img style="width:100px; height:100px; "
                                                                 src="   <?php if (empty($dds['image_2'])):

                                                                     echo '' . base_url('') . 'imagem?tp=1&&im=2&&image=' . $dds['id_produto'];

                                                                 else:

                                                                     echo '' . base_url('') . 'imagem?tp=1&&im=2&&image=' . $dds['id_pdp'];

                                                                 endif;
                                                                 ?>">
                                                            <br>
                                                            <input type="file" id="image1" name="image1"
                                                                   style="display:none;"/>

                                                            <small class="text-danger">(Alterar Imagem 2)</small>
                                                        </label>


                                                    </div>

                                                    <label class="toggle toggle-change"><input type="checkbox"
                                                                                               checked=""
                                                                                               name="checkbox-toggle-1"><i
                                                            class="no-rounded"></i> Deixar Item Ativo</label>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Cancelar
                                                </button>
                                                <button type="button" class="btn btn-primary"
                                                        onclick="alterdataitem('<?php echo base_url('');?>','<?php echo $dds['id_pdp']; ?>');">Salvar
                                                    Alterações
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <!-- Modal -->
                                <div class="modal fade" id="deletar<?php echo $dds['id_pdp'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Remover Produto do meu Estoque</h4>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Tem certeza que você deseja remover esse produto do seu estoque?</h5>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                <button onclick="removeItemLoja(<?php echo $dds['id_pdp'];?>)" type="button" class="btn btn-danger">Remover</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php
            else:

                ?>
                <h2 style="text-align: center;">Nenhum Resultado</h2>
                <?php

            endif; ?>
        </div>

        <div id="esgotado" class="profile-edit tab-pane fade">
            <?php
            $this->db->from('produtos_disponiveis');
            $this->db->where('id_loja', $_POST['keyword']);
            $this->db->where('unidades', 0);
            $get = $this->db->get();
            $count = $get->num_rows();
            if ($count > 0):

                $result = $get->result_array();
                ?>

                <div class="table-search-v2">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Imagem</th>
                                <th class="hidden-sm">Descrição</th>
                                <th>Estoque</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $characteres = array(
                                'Š' => 'S', 'š' => 's', 'Ð' => 'Dj', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A',
                                'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I',
                                'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U',
                                'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a',
                                'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i',
                                'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u',
                                'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y', 'ƒ' => 'f', ' ' => '_'
                            );
                            $arrayreplace = array("(", ")", "-");

                            foreach ($result as $dds) {

                                $this->db->from('lojas');
                                $this->db->where('id_loja', $dds['id_loja']);
                                $get = $this->db->get();
                                $count = $get->num_rows();

                                if ($count > 0):
                                    $result = $get->result_array();

                                    $lojaname = $result[0]['nome_loja'];

                                    $url = base_url('produto/' . str_replace(' ', '-', strtolower($lojaname) . '/' . str_replace(' ', '-', str_replace($arrayreplace, '', strtolower(urlencode(strtr($dds['nome_prod'], $characteres))))))) . '/' . $dds['id_pdp'];

                                else:
                                    $url = '#';

                                endif;

                                ?>
                                <tr>


                                    <td>
                                        <img class="rounded-x"
                                             src="<?php echo base_url('imagem?tp=1&&im=1&&image=' . $dds['id_produto'] . '') ?>"
                                             alt="">
                                    </td>
                                    <td class="td-width">
                                        <h3>
                                            <a href="<?php echo $url; ?>"><?php echo $dds['nome_prod']; ?></a>
                                        </h3>
                                        <p><?php

                                            $this->db->from('medicamentos');
                                            $this->db->where('id', $dds['id_produto']);
                                            $get = $this->db->get();
                                            $count = $get->num_rows();
                                            if ($count > 0):
                                                $result = $get->result_array();
                                                $texto = $result[0]['fixa_cal'];

                                            else:

                                                $texto = 'Descrição Indisponivel';
                                            endif;

                                            $data = $dds['data_adicionado'];

                                            $dia = substr($data, 8, 2);

                                            echo strip_tags(character_limiter($texto, 100)); ?></p>
                                        <small class="hex">Adicionado em <?php echo $dia; ?>, 2014</small>
                                    </td>
                                    <td>
                                        <span class="label label-success">Success</span>
                                    </td>
                                    <td>
                                        <ul class="list-inline s-icons">
                                            <li>
                                                <a data-placement="top" data-toggle="tooltip" class="tooltips"
                                                   data-original-title="Facebook" href="#">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-placement="top" data-toggle="tooltip" class="tooltips"
                                                   data-original-title="Twitter" href="#">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-placement="top" data-toggle="tooltip" class="tooltips"
                                                   data-original-title="Dropbox" href="#">
                                                    <i class="fa fa-dropbox"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-placement="top" data-toggle="tooltip" class="tooltips"
                                                   data-original-title="Linkedin" href="#">
                                                    <i class="fa fa-linkedin"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <span><a href="#">info@example.com</a></span>
                                        <span><a href="#">www.htmlstream.com</a></span>
                                    </td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <?php
            else:

                ?>
                <h2 style="text-align: center;">Nenhum Resultado</h2>
                <?php

            endif; ?>
        </div>

        <div id="adicionar" class="profile-edit tab-pane fade">

        </div>
    </div>
</div>