<?php
if (!function_exists('format_timestamp')) {
    function format_timestamp($timestamp)
    {
        return date('m/d/Y', strtotime($timestamp));
    }
}