<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use  Illuminate\Support\Facades\DB;


class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('tipoidentificaciones', function (Blueprint $table) {
            $table->id();
            $table->text('descripcion');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos')->nullable();
            $table->string('imagen')->nullable();
            $table->string('razonsocial')->nullable();
            $table->string('representantelegal')->nullable();
            $table->string('identificacion')->unique();
            $table->text('direccion')->nullable();
            $table->text('direccion2')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->unique()->nullable();
            $table->date('cumpleanios')->nullable();
            $table->string('contactocelular')->nullable();
            $table->string('contactonombre')->nullable();

            $table->unsignedBigInteger('tipoidentificacione_id')->nullable();

            $table->foreign('tipoidentificacione_id')->references('id')->on('tipoidentificaciones')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('imagen')->nullable();
            $table->boolean('estatus')->default('1');
            $table->string('msgEstatus')->default('Su usuario a sido deshabilitado contacte con el responsable de su empresa');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->nullable();
            $table->bigInteger('creador_id')->nullable();

            $table->unsignedBigInteger('persona_id')->nullable();

            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });


    Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('paginaweb')->nullable();
            $table->integer('diascredito')->nullable();
            $table->string('limitecredito')->nullable();
            $table->text('observaciones')->nullable();
            $table->integer('estadisticas')->nullable();
            $table->boolean('estatus')->default('1');
            $table->string('mesajeEstatus')->default('Este Cliente no se le facturar mas, debe habilitarlo en caso contrario');
            $table->text('clientedescuento')->nullable();
            $table->bigInteger('creador_id')->nullable();

            $table->unsignedBigInteger('persona_id')->nullable();

            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
    });

    
    }


    
    public function down()
    {
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('users');
        Schema::dropIfExists('personas');
        Schema::dropIfExists('tipoidentificaciones');
    }
}


