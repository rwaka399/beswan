<?php

namespace App\Helpers;

class FormatHelper
{
    public static function rupiah($angka)
    {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}