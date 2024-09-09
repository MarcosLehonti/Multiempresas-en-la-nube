<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//PARA QUE FUCNIONE CON MYSQL
// return new class extends Migration
// {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('jobs', function (Blueprint $table) {
//             $table->id();
//             $table->string('queue')->index();
//             $table->longText('payload');
//             $table->unsignedTinyInteger('attempts');
//             $table->unsignedInteger('reserved_at')->nullable();
//             $table->unsignedInteger('available_at');
//             $table->unsignedInteger('created_at');
//         });

//         Schema::create('job_batches', function (Blueprint $table) {
//             $table->string('id')->primary();
//             $table->string('name');
//             $table->integer('total_jobs');
//             $table->integer('pending_jobs');
//             $table->integer('failed_jobs');
//             $table->longText('failed_job_ids');
//             $table->mediumText('options')->nullable();
//             $table->integer('cancelled_at')->nullable();
//             $table->integer('created_at');
//             $table->integer('finished_at')->nullable();
//         });

//         Schema::create('failed_jobs', function (Blueprint $table) {
//             $table->id();
//             $table->string('uuid')->unique();
//             $table->text('connection');
//             $table->text('queue');
//             $table->longText('payload');
//             $table->longText('exception');
//             $table->timestamp('failed_at')->useCurrent();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('jobs');
//         Schema::dropIfExists('job_batches');
//         Schema::dropIfExists('failed_jobs');
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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); // Utiliza "bigint" con "serial" en PostgreSQL.
            $table->string('queue')->index();
            $table->text('payload'); // Cambiado de "longText" a "text", ya que PostgreSQL maneja esto automáticamente.
            $table->unsignedTinyInteger('attempts'); // PostgreSQL maneja "smallint" para este tipo.
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary(); // Clave primaria como string, soportado en PostgreSQL.
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->text('failed_job_ids'); // Cambiado de "longText" a "text".
            $table->text('options')->nullable(); // Cambiado de "mediumText" a "text".
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id(); // Utiliza "bigint" con "serial" en PostgreSQL.
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->text('payload'); // Cambiado de "longText" a "text".
            $table->text('exception'); // Cambiado de "longText" a "text".
            $table->timestamp('failed_at')->useCurrent(); // PostgreSQL soporta directamente esta sintaxis.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};
