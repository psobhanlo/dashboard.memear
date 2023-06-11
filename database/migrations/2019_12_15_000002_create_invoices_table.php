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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->tinyText('description')->nullable();
            $table->enum('status', [ 'PROGRESS','COMPLETE' ,'PAYMENT' ,'WITHDRAWAL'])->default('PROGRESS');
            $table->string('price');
            $table->string('discount')->nullable();

            $table->string('print_count')->nullable( );
            $table->string('print_price')->nullable( );

            $table->unsignedBigInteger('designer_id');
            $table->foreign('designer_id')->references('id')->on('users');

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
