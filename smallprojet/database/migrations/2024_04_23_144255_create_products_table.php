<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->unsignedBigInteger('quantity');
            $table->string('image');
            $table->Double('price')->unsigned();
            $table->softDeletes();
            $table->timestamps();
            $table->integer('category_id')->nullable()->constrained()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
