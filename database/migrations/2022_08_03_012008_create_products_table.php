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
            $table->text('title');  // product title
            $table->text('description')->nullable();   // description
            $table->text('short_notes');   // short notes
            $table->decimal('price', 10, 2); // price
            $table->text('image')->nullable(); // product image
            $table->text('slug')->nullable(); // product slug
            $table->foreignId('manufacturer_id')->nullable()->constrained('manufacturers');
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
