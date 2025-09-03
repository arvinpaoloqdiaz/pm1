<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('dd')) {
    function dd($data, $exit = true)
    {
        echo '<div style="
            background:#1e1e1e;
            color:#f8f8f2;
            padding:20px;
            border-radius:8px;
            font-family: Consolas, Monaco, monospace;
            font-size:14px;
            line-height:1.5;
            max-width:90%;
            margin:20px auto;
            overflow:auto;
            box-shadow:0 4px 10px rgba(0,0,0,0.3);
        ">';
        echo '<pre style="margin:0;white-space:pre-wrap;">';
        print_r($data);
        echo '</pre>';
        echo '</div>';

        if ($exit) {
            exit;
        }
    }
}
