<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUriSrt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('uri_srt'))
        {
            Schema::create('uri_srt', function (Blueprint $table) {
                $table->id();
                $table->string('srt', 10)->unique()->comment('短字串');
                $table->text('url')->comment('對應網址');
                $table->integer('access')->default(0)->comment('訪問數');
                $table->tinyInteger('status')->default(0)->comment('狀態(0:停用,1:啟用)');
                $table->timestamp('expire_at')->nullable()->comment('期限時間');
                $table->timestamps();
                // 索引
                $table->index(['srt', 'status', 'expire_at'], 'query');
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
        if(Schema::hasTable('uri_srt'))
        {
            Schema::dropIfExists('uri_srt');
        }
    }
}
