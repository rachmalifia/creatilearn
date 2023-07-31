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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('subject_id');
            $table->string('code');
            $table->string('no1');
            $table->string('no2');
            $table->string('no3');
            $table->string('no4')->nullable();
            $table->string('no5')->nullable();
            $table->string('no6')->nullable();
            $table->string('no7')->nullable();
            $table->string('no8')->nullable();
            $table->string('no9')->nullable();
            $table->string('no10')->nullable();
            $table->string('no11')->nullable();
            $table->string('no12')->nullable();
            $table->string('no13')->nullable();
            $table->string('no14')->nullable();
            $table->string('no15')->nullable();
            $table->string('no16')->nullable();
            $table->string('no17')->nullable();
            $table->string('no18')->nullable();
            $table->string('no19')->nullable();
            $table->string('no20')->nullable();
            $table->string('no21')->nullable();
            $table->string('no22')->nullable();
            $table->string('no23')->nullable();
            $table->string('no24')->nullable();
            $table->string('no25')->nullable();
            $table->string('no26')->nullable();
            $table->string('no27')->nullable();
            $table->string('no28')->nullable();
            $table->string('no29')->nullable();
            $table->string('no30')->nullable();
            $table->string('no31')->nullable();
            $table->string('no32')->nullable();
            $table->string('no33')->nullable();
            $table->string('no34')->nullable();
            $table->string('no35')->nullable();
            $table->float('score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
