<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username',30)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        factory(User::class)->create([
            "name" => "Administrador",
            "username" => "admin",
            "password" => bcrypt("admin123"),
            "email" => "admin@alphadev.in"
        ]);

        factory(User::class)->create([
            "name" => "Suporte",
            "username" => "suporte",
            "password" => bcrypt("suporte"),
            "email" => "suporte@alphadev.in"
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
