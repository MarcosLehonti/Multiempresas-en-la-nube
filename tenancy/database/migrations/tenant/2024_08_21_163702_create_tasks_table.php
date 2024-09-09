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
//         Schema::create('tasks', function (Blueprint $table) {
//             $table->id();
//             $table->string('name');
//             $table->text('description')->nullable();
//             $table->string('image_url')->nullable();
//             $table->timestamps();
//         });
        
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('tasks');
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Tipo de dato BIGSERIAL en PostgreSQL.
            $table->string('name');
            $table->text('description')->nullable(); // TEXT en PostgreSQL.
            $table->string('image_url')->nullable();
            $table->timestamps(); // Crea columnas created_at y updated_at de tipo TIMESTAMP.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
