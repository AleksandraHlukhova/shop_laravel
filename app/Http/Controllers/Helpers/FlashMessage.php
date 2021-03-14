<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlashMessage extends Controller
{
    /**
     * Put to session success msg
     */
    public static function success($msg)
    {
        session()->flash('success', $msg);
    }

    /**
     * Put to session dangerous msg
     */
    public static function danger($msg)
    {
        session()->flash('danger', $msg);
    }

    /**
     * Put to session warning msg
     */
    public static function warning($msg)
    {
        session()->flash('warning', $msg);
    }
}
