<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturasTable extends Migration
{

    public function up()
    {
        Schema::create('tipo_facturaciones', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('formulas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->date('fechavence');
            $table->string('pagocontado');
            $table->string('pagocredito');
            $table->string('consecutivodian');
            $table->integer('relacionempresa');
            $table->integer('factura');
            $table->text('observacion');
            $table->date('fechapagoservicio');
            $table->integer('eliminar');
            $table->bigInteger('creador_id')->nullable();

            $table->unsignedBigInteger('tipo_facturacione_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('tipo_facturacione_id')->references('id')->on('tipo_facturaciones')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('factulineas', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->string('costoventa');
            $table->string('costototal');
            $table->integer('descuento');
            $table->double('porcentaje');
            $table->string('impuesto');

            $table->unsignedBigInteger('formula_id')->nullable();

            $table->foreign('formula_id')->references('id')->on('formulas')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('factulinea_producto', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('factulinea_id')->nullable();
            $table->unsignedBigInteger('producto_id')->nullable();

            $table->foreign('factulinea_id')->references('id')->on('factulineas')->onDelete('cascade');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('factulinea_producto');
        Schema::dropIfExists('factulineas');
        Schema::dropIfExists('formulas');
        Schema::dropIfExists('tipo_facturaciones');
    }
}
