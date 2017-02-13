<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Head
{


    private $quebra = "\n";

    public function css($guide,$version)
    {

        if ($guide == 0):

            $return = '
            <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
 
 <link rel="stylesheet" type="text/css" href="'.base_url('assets/'.$version.'').'/css/style.css">
        ';
        endif;


        if ($guide == 1):


        endif;


        if ($guide == 2):


            $return = '
                   
                      ';

        endif;

        return ($return);

    }

    public function js($guide,$version)
    {
        if ($guide == 0):

            $return = '
            <script src="https://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script>'.$this->quebra.'
       <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

            ';

        endif;


        if ($guide == 1):


        endif;


        if ($guide == 2):

            //Plugins
            $return = '
            
                     ';



        endif;

        return ($return);

    }

    public function meta($guide,$array)
    {

        if($guide == 0):

            if(array_key_exists('title',$array) and !empty($array['title'])):

                $title = '<meta name="title" content="'.$array['title'].'" />'.$this->quebra;

                    else:

                        $title = '';


            endif;

            if(array_key_exists('description',$array) and !empty($array['description'])):


                $description = '<meta name="description" content="'.$array['description'].'" />'.$this->quebra;

            else:
                $description = '';

            endif;

            if(array_key_exists('keywords',$array) and !empty($array['keywords'])):

                $keywords = '<meta name="keywords" content="'.$array['keywords'].'" />'.$this->quebra;

            else:
                $keywords = '';


            endif;

        $return = $title.$description.$keywords;

            endif;



        return $return;

    }

    public function header($guide,$title,$array,$version)
    {

        if ($guide == 0):


            $return = '<!DOCTYPE html>' . $this->quebra . '
                <html lang="pt-br">' . $this->quebra . '<head>' . $this->quebra . $this->quebra . '
               <title>'.$title.'</title>' . $this->quebra. $this->meta(0,$array).$this->quebra .
                $this->css(0,$version) . $this->quebra . $this->js(0,$version) . $this->quebra .
                '
              </head> 
               ';




        endif;

        if ($guide == 1):


        endif;


        if ($guide == 2):

            $return = '<!DOCTYPE html>' . $this->quebra . '
                <html lang="pt-br">' . $this->quebra . '<head>' . $this->quebra . $this->meta(2) . $this->quebra . '
               <title> Narrador Cast</title>' .
                $this->css(2,$version) . $this->quebra . $this->js(2,$version) . $this->quebra .
                '
              </head> 
               ';


        endif;

        return $return;
    }


}

?>

