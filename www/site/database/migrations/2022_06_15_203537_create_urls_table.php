<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urls', function (Blueprint $table) {
            $table->id();
            $table->text('origin_url');
            $table->string('short_link');
            //Отдельно буду генерить, чтобы зная сокращенную ссылку нельзя было перейти в стату
            $table->string('stat_link');
            $table->timestamp('expired_at')
                ->nullable()
                ->default(null);
            $table->timestamps();

            $table->unique(['short_link']);
            $table->unique(['stat_link']);
            //Для более быстрого поиска с выборкой по истекшим
            $table->index(['expired_at', 'short_link']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urls');
    }
};
