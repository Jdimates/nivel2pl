<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nette\Schema\Schema as SchemaSchema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Actividades',function(Blueprint $table){
             $table->bigIncrements('id');
             $table->string('Descripcion');
             $table->date('FechaActividad');
             $table->enum('area',['TI','Administrativa','general']);
             $table->bigInteger('idEmpleado')->default(0);
             $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
