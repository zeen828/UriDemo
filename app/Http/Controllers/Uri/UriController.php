<?php

namespace App\Http\Controllers\Uri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// 模型
use App\Models\Uri\UriSrt;
use App\Models\Uri\UriLog;
// Redis
use Illuminate\Support\Facades\Redis;
// 輔助工具
use Carbon\Carbon;

class UriController extends Controller
{
    function index(Request $request)
    {
        $view = [];
        return view('uri.index', $view);
    }

    function post(Request $request)
    {
        $srt = time();
        $url = $request->input('url');

        // 7天時效
        $expire = Carbon::now()->setTimezone('Asia/Taipei')->addDays(7)->toDateTimeString();

        $data = [
            'srt' => $srt,
            'url' => $url,
            'access' => 0,
            'status' => 1,
            'expire_at' => $expire,
        ];
        UriSrt::create($data);

        $key = sprintf('uri:srt:%s', $srt);
        Redis::set($key, json_encode($data));

        $view = $data;
        return view('uri.post', $view);
    }

    function go(Request $request, $srt)
    {
        var_dump($srt);
        $key = sprintf('uri:srt:%s', $srt);
        // Redis::set($key, 'https://www.google.com');
        $data = Redis::get($key);
        if(empty($data)) {
            abort(404);
            return false;
        }
        $data = json_decode($data, true);

        // add count
        // UriSrt::where('srt', $srt)->where('status', '1')->whereDate('expire_at', '>=', Carbon::today())->

        // log
        $url = $request->url();
        $uri = $request->path();
        $ip = $request->ip();
        UriLog::create([
            'url' => $url,
            'uri' => $uri,
            'srt' => $srt,
            'ip' => $ip,
        ]);
        // return redirect()->away($data);
    }

    function info(Request $request, $srt)
    {
        $data = UriSrt::where('srt', $srt)->where('status', '1')->whereDate('expire_at', '>=', Carbon::today())->first();
        var_dump($data);
        $view = $data;
        return view('uri.info', $view);
    }
}
