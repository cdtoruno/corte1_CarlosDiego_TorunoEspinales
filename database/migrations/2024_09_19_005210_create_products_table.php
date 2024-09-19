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
        Schema::create('products', function (Blueprint $table) {
        $table->string('codigo')->primary();
        $table->string('nombre');
        $table->text('descripcion');
        $table->enum('categoria', ['calzado', 'ropa', 'joyería']);
        $table->float('precio');
        $table->integer('stock')->unsigned();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
