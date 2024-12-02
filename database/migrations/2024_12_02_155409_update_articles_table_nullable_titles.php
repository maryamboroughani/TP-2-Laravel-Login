<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('title_fr')->nullable()->change();
            $table->string('title_en')->nullable()->change();
            $table->text('content_fr')->nullable()->change();
            $table->text('content_en')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->string('title_fr')->nullable(false)->change();
            $table->string('title_en')->nullable(false)->change();
            $table->text('content_fr')->nullable(false)->change();
            $table->text('content_en')->nullable(false)->change();
        });
    }
    
};
