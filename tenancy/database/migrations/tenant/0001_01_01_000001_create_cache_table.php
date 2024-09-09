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



//PARA QUE FUNCIONE CON POSTFRES

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary(); // PostgreSQL maneja claves primarias de tipo string sin problemas.
            $table->text('value'); // mediumText se convierte en text en PostgreSQL.
            $table->integer('expiration');
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary(); // Clave primaria de tipo string.
            $table->string('owner');
            $table->integer('expiration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
    }
};
