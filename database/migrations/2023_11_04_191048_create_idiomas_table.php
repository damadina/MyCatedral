<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('idiomas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('locale');
            $table->integer('orden')->nullable();
            $table->boolean('isPublic')->default(false);
            $table->string('elementsTraduccion')->nullable();
            $table->string('textosTraduccion')->nullable();
            $table->string('fotosTraduccion')->nullable();
            $table->string('idiomasTraduccion')->nullable();
            $table->string('documentsTraduccion')->nullable();
            $table->string('autorsTraduccion')->nullable();
            $table->string('informacionsTraduccion')->nullable();
            $table->json('traducciones_Start')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idiomas');
    }
};
