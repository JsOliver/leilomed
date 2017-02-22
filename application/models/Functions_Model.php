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

    public function uploadimage($nameimage,$where, $colname, $tablename, $file, $allowed, $max_size)
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

                    $date[$colname] = file_get_contents(addslashes($filex));
                    $this->db->where($where, $_SESSION['ID']);
                    if ($this->db->update($tablename, $date)) {
                        return $_SESSION['ID'];
                    } else {
                        return 'Erro a salvar a imagem, tente mais tarde.';
                    }

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