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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('web_id');
            $table->foreign('web_id')->references('id')->on('webs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('product_title')->nullable();
            $table->string('gallery_title')->nullable();
            $table->string('link_title')->nullable();
            $table->string('top_title')->nullable();
            $table->string('top_no_tlp')->nullable();
            $table->string('product_no_tlp')->nullable();
            $table->string('head_title')->nullable();
            $table->text('head_desc')->nullable();
            $table->string('foot_title')->nullable();
            $table->text('foot_desc')->nullable();
            $table->enum('tag_position', ['top', 'bottom'])->default('bottom');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
