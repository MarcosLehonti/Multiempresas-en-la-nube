<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//PARA QUE FUNCION CON MYSQL
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
            $table->id(); // Tipo de dato BIGSERIAL en PostgreSQL.
            $table->string('queue')->index(); // Índice en la columna 'queue'.
            $table->text('payload'); // longText se convierte en text en PostgreSQL.
            $table->unsignedTinyInteger('attempts'); // Tipo de dato SMALLINT en PostgreSQL.
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary(); // Clave primaria de tipo string.
            $table->string('name');
            $table->integer('total_jobs'); // INTEGER en PostgreSQL.
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->text('failed_job_ids'); // longText se convierte en text.
            $table->text('options')->nullable(); // mediumText se convierte en text.
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id(); // Tipo de dato BIGSERIAL en PostgreSQL.
            $table->string('uuid')->unique(); // Índice único en la columna 'uuid'.
            $table->text('connection');
            $table->text('queue');
            $table->text('payload'); // longText se convierte en text.
            $table->text('exception'); // longText se convierte en text.
            $table->timestamp('failed_at')->useCurrent(); // TIMESTAMP en PostgreSQL.
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
