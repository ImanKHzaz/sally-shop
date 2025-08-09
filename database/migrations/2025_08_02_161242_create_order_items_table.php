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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            // 🔗 ربط الطلب
            $table->foreignId('order_id')->constrained()->onDelete('cascade');

            // 🔗 ربط المنتج
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            // 📦 عدد القطع المطلوبة
            $table->integer('quantity');

            // 💰 سعر القطعة وقت الطلب
            $table->decimal('price', 8, 2);

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
