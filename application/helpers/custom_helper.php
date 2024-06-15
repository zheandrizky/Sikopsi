<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('idrFormat')) {
    function idrFormat($number) {
        if ($number === null) {
            return 'Rp 0';
        }
        return 'Rp ' . number_format($number, 0, ',', '.');
    }
}

if (!function_exists('idrFormatWithoutRp')) {
    function idrFormatWithoutRp($number) {
        if ($number === null) {
            return '0';
        }
        return number_format($number, 0, ',', '.');
    }
}
?>


