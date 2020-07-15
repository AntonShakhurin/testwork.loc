<?php

class View{
    function render($content_view,$data = null){

        if(is_array($data)) {
            extract($data);
        }

        include 'application/views/app.php';
    }
}