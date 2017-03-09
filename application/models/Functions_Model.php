<?php

class Functions_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->db->reconnect();
        @session_start();
    }

    public function uploadimage($nameimage,$where, $colname, $tablename, $file, $allowed, $max_size,$idps)
    {

        if (!empty($file['name'])):
            $filex = $file['tmp_name'];
            $size = $file['size'];
            $type = $file['type'];
            $name = $file['name'];

            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $extension = strtolower($extension);
            if (strstr($allowed, $extension)):


                if ($size > $max_size * 1000000):

                    return 'Tamanho maximo de ' . $max_size . 'MB, excedido.';

                else:

                    if($colname == 'xmlFile'):

                        $date['id_user'] =  $_SESSION['ID'];
                        $date['data_add'] =  date('YmdHis');
                        $date['xmlFile'] = file_get_contents(addslashes($filex));
                        if ($this->db->insert('xmlfiles', $date)) {
                            return $this->db->insert_id();
                        } else {
                            return 'Erro a salvar o XML, tente mais tarde.';
                        }

                    else:
                    $date[$colname] = file_get_contents(addslashes($filex));
                    $this->db->where($where, $idps);
                    if ($this->db->update($tablename, $date)) {
                        return $_SESSION['ID'];
                    } else {
                        return 'Erro a salvar a imagem, tente mais tarde.';
                    }

                endif;
                endif;


            else:

                return 'Somente as extensões ' . $allowed . ' são permitidas.';

            endif;


        else:


            return 'Por favor selecione o arquivo.';


        endif;


    }

}

?>