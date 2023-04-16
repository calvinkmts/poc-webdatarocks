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
        Schema::create('general_ledgers', function (Blueprint $table) {
            $table->string('entry_no', 20);
            $table->date('date');
            $table->integer('territory_id');
            $table->integer('account_key');
            $table->string('details');
            $table->decimal('debit', 18, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_ledgers');
    }
};
