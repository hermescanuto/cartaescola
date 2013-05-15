<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 *
 * Gerador de thumbs, ele cria o thumb, uma vez criado não cria mais. teste
 *
 */

class Thumbs extends Controller {

    public function __construct() {
        parent::Controller();
        $this -> load -> library('image_lib');
    }

    public function products($width, $height, $img) {

        $folder = "./upload";
        // Checa se a imagem existe; se não existir, usa uma imagem padrão
        $img = is_file('assets/main/images/products/' . $img) ? $img : 'default.jpg';

        // Se a miniatura já existir, ela é que será usada
        // (não há necessidade de usar a GD library de novo)
        if (!is_file($folde . '/thumbs/' . $width . 'x' . $height . '_' . $img)) {
            $config['source_image'] = $folder . $img;
            $config['new_image'] = $folder . '/thumbs/' . $width . 'x' . $height . '_' . $img;
            $config['width'] = $width;
            $config['height'] = $height;

            $this -> image_lib -> initialize($config);
            $this -> image_lib -> resize_crop();
        }

        header('Content-Type: image/jpg');
        readfile($folder . '/thumbs/' . $width . 'x' . $height . '_' . $img);
    }

}


