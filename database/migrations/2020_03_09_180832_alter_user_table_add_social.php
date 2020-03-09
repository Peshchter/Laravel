<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserTableAddSocial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
            $table->string('social_id', 20)
                ->default('')
                ->comment('ИД в соц сети');
            $table->enum('auth_type', ['site', 'vk', 'fb']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn(['social_id', 'auth_type']);
        });
    }
}
