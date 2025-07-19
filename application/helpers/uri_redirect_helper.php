<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('redirect_unless_uri_segment')) {
    function redirect_unless_uri_segment($expected)
    {
        $CI =& get_instance();
        $first_segment = $CI->uri->segment(1);

        if ($first_segment !== $expected) {
            redirect($expected);
        }
    }
}
