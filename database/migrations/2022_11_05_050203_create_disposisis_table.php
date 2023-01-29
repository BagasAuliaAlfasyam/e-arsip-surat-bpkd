<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disposisis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('letter_id');
            $table->foreignId('agency_id');
            $table->string('tgl_surat');
            $table->string('no_agenda');
            $table->date('tgl_diterima')->nullable();
            $table->date('tgl_penyelesaian')->nullable();
            $table->text('hal')->nullable();
            $table->string('diteruskan_kpd')->nullable();
            $table->text('instruksi')->nullable();
            $table->string('letter_file')->nullable();
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
        Schema::dropIfExists('disposisis');
    }
}
