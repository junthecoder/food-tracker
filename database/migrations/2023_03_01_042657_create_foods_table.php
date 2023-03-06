<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('default_quantity');
            $table->string('default_unit');
            $table->float('calories');
            $table->float('protein');
            $table->float('fat');
            $table->float('carbs');
            $table->float('salt');
            $table->timestamps();

            DB::statement('ALTER TABLE foods ADD FULLTEXT INDEX ngram_idx (name) WITH PARSER ngram');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
