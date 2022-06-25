<?php

namespace App\Libraries;

class Auctionet
{
    public static function rupiah($nilai)
    {
        return 'IDR '.number_format($nilai, 0);
    }
}

