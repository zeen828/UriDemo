<?php

namespace App\Console\Commands\Tests;

use Illuminate\Console\Command;
// Redis
use Illuminate\Support\Facades\Redis;

class TestJob extends Command
{
    /**
     * The name and signature of the console command.
     * php artisan tests:test --option=redis
     * @var string
     */
    protected $signature = 'tests:test {--option= : }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tests Command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // 開始消息
        $this->line('[' . date('Y-m-d H:i:s') . '] START');

        $option = (empty($this->option('option')))? 'test' : $this->option('option');

        switch ($option) {
            case 'redis':
                $key = 'tests:id:12';
                //Redis::set($key, 'Taylor');
                $test = Redis::get($key);
                var_dump($test);
                break;
            default:
                break;
        }

        $this->line('[' . date('Y-m-d H:i:s') . '] END');
        return true;
    }
}
