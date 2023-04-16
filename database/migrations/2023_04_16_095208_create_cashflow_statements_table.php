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
        Schema::create('cashflow_statements', function (Blueprint $table) {
            $table->string('type');
            $table->string('subtype');
            $table->string('account');
            $table->string('sub_account');
            $table->string('value_type');
            $table->integer('account_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cashflow_statements');
    }
};
