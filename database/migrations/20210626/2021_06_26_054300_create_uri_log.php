<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUriLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('uri_log'))
        {
            Schema::create('uri_log', function (Blueprint $table) {
                $table->id();
                $table->text('url')->comment('連線網址');
                $table->string('uri')->comment('連線路徑');
                $table->string('srt', 10)->comment('短字串');
                $table->ipAddress('ip')->nullable()->comment('IP');
                $table->timestamps();
                // 索引
                $table->index(['srt'], 'query');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('uri_log'))
        {
            Schema::dropIfExists('uri_log');
        }
        
    }
}
