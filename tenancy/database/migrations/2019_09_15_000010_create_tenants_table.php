<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// //PARA QUE FUNCIONE CON MYSQL
// class CreateTenantsTable extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up(): void
//     {
//         Schema::create('tenants', function (Blueprint $table) {
//             $table->string('id')->primary();

//             // your custom columns may go here

//             $table->timestamps();
//             $table->json('data')->nullable();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('tenants');
//     }
// }




//PARA QUE FUCNIONE CON POSTGRES

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->string('id')->primary(); // PostgreSQL maneja correctamente claves primarias de tipo string.

            // Aquí pueden ir tus columnas personalizadas

            $table->timestamps();
            $table->jsonb('data')->nullable(); // Cambiado de 'json' a 'jsonb' para mayor eficiencia en PostgreSQL.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
}
