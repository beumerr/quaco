<?php


/**
 * Functions required to load Quaco
 */

// Get all modules and their information
function get_modules_info() {

    $module_folder = scandir(MODULES);
    $module_names = array_splice($module_folder, 2);

    foreach ($module_names as $key => $module) {
        $source = file_get_contents( MODULES.$module.'/'.$module.'.php');
        $tokens = token_get_all( $source );

        foreach( $tokens as $token ) {
            if(isset($token[1])) {
                if (strpos($token[1], 'Module Name:') !== false) {
                    $list = explode(PHP_EOL, $token[1]);
                    $arr[$key] = [
                        'name' => substr($list[1], strpos($list[1], ":") + 1),
                        'version' => substr($list[2], strpos($list[2], ":") + 1),
                        'author' => substr($list[3], strpos($list[3], ":") + 1)
                    ];
                }
            }
        }
    }
    return $arr;
}











