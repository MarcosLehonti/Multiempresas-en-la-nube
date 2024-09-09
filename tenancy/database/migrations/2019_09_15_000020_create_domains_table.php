<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// //PARA QUE FUNCIONE CON MYSQL

// class CreateDomainsTable extends Migration
// {
//     /**
//      * Run the migrations.
//      *
//      * @return void
//      */
//     public function up(): void
//     {
//         Schema::create('domains', function (Blueprint $table) {
//             $table->increments('id');
//             $table->string('domain', 255)->unique();
//             $table->string('tenant_id');

//             $table->timestamps();
//             $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
//         });
//     }

//     /**
//      * Reverse the migrations.
//      *
//      * @return void
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('domains');
//     }
// }


//PARA QUE FUNCIONE CON POSTGRES
class CreateDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->bigIncrements('id'); // PostgreSQL usa `bigIncrements` para claves primarias auto-incrementales.
            $table->string('domain', 255)->unique();
            $table->string('tenant_id');

            $table->timestamps();
            $table->foreign('tenant_id')
                  ->references('id')
                  ->on('tenants')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
}
