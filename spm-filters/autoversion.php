<?php
function autoVer($filename){
    $url = get_template_directory_uri() . '/' . $filename;
    $file = get_template_directory() . '/' . $filename;
    if ( file_exists($file)) {
        echo $url . '?v=' .md5(date("FLdHis", filectime($file)) . filesize($file));
    }
    clearstatcache();
}