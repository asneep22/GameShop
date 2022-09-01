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
            $table->id();
            $table->string('title');
            $table->string('file_path');
            $table->text('description');
            $table->date('publishing_date');
            $table->foreignId('videocard_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('cpu_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('product_id')->nullable(); //Если товар являяется DLC то указываем ссылку на игру
            $table->string('desc_ram');
            $table->string('desc_memory');
            $table->double('price');
            $table->foreignId('discount_id')->nullable()->constrained('discounts')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('redChoose');
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
