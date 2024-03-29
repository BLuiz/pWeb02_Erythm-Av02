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
        Schema::create('categoria', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 120);
            $table->timestamps();
        });

        Schema::disableForeignKeyConstraints();

        Schema::table('usuario', function (Blueprint $table) {
            $table->foreignId('categoria_id')->constrained('categoria')->after('email')->nullable()->default(null);
        });

        Schema::enableForeignKeyConstraints();
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria');
    }
};
