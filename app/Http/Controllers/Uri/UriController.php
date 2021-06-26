<?php

namespace App\Http\Controllers\Uri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UriController extends Controller
{
    function index()
    {
        echo '首頁';
    }

    function form()
    {
        echo '表單';
    }

    function info()
    {
        echo '資訊';
    }
}
