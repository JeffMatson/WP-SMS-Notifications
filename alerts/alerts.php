<?php

$directory = plugin_dir_path( __FILE__ );
foreach (glob($directory . '*.php') as $filename)
{
    require_once $filename;
}