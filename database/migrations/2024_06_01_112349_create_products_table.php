<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->double('price')->nullable();
            $table->mediumText('details')->nullable();
            $table->string('publish')->nullable();
        });

        // Insert default data
        DB::table('products')->insert(
            array(
                [
                    'name' => 'C',
                    'price' => '56.89',
                    'details' => 'Detail of product c',
                    'publish' => 'Yes'
                ],
                [
                    'name' => 'B',
                    'price' => '23.33',
                    'details' => 'B detail',
                    'publish' => 'Yes'
                ],
                [
                    'name' => 'A',
                    'price' => '60.56',
                    'details' => 'A detail....',
                    'publish' => 'No'
                ]
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
