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
        Schema::create('print_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('shops')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('show_client_name')->default(false);
            $table->boolean('show_client_phone')->default(false);
            $table->boolean('show_client_address')->default(false);
            $table->boolean('show_shop_logo')->default(false);
            $table->boolean('show_shop_name')->default(false);
            $table->boolean('show_shop_address')->default(false);
            $table->boolean('show_item_name')->default(false);
            $table->boolean('show_unit')->default(false);
            $table->boolean('show_qty')->default(false);
            $table->boolean('show_sale_price')->default(false);
            $table->boolean('show_barcode')->default(false);
            $table->boolean('show_item_total')->default(false);
            $table->boolean('show_index')->default(false);
            $table->boolean('show_invoice_no')->default(false);
            $table->boolean('show_date')->default(false);
            $table->boolean('show_qrcode')->default(false);
            $table->boolean('show_creator')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('print_settings');
        Schema::disableForeignKeyConstraints();
    }
};
