<?php

if (!function_exists('status')) {
    function status($status)
    {
        return $status ? '<i class="fa fa-check text-success" aria-hidden="true"></i>' : '<i class="fa fa-times text-danger" aria-hidden="true"></i>';
    }
}
