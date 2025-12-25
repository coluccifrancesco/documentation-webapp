<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    
    // Run the migrations.
    public function up(): void {
        
        Schema::create('arguments', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');
            $table->text('resume');
            $table->text('md_text')->nullable();
            $table->smallInteger('difficulty_id');
            $table->string('documentation_link');
            
            $table->timestamps();
        });
    }

    // Reverse the migrations.
    public function down(): void {
        
        Schema::dropIfExists('arguments');
    }
};
