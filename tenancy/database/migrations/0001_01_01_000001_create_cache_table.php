<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//PARA QUE FUNCIONE CON MYSQL

// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('cache', function (Blueprint $table) {
//             $table->string('key')->primary();
//             $table->mediumText('value');
//             $table->integer('expiration');
//         });

//         Schema::create('cache_locks', function (Blueprint $table) {
//             $table->string('key')->primary();
//             $table->string('owner');
//             $table->integer('expiration');
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('cache');
//         Schema::dropIfExists('cache_locks');
//     }
// };




//PARA QUE FUNCIONE CON POSTGRES
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary(); // PostgreSQL soporta directamente strings como claves primarias.
            $table->text('value'); // Cambiado de "mediumText" a "text", ya que PostgreSQL maneja esto automáticamente.
            $table->integer('expiration');
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary(); // Funciona bien en PostgreSQL.
            $table->string('owner');
            $table->integer('expiration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('cache');
    }
};
