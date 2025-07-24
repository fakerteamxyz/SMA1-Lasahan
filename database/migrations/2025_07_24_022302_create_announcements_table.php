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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('category'); // 'kegiatan', 'ujian', 'libur', 'ppdb', 'umum'
            $table->string('priority')->default('normal'); // 'low', 'normal', 'high', 'urgent'
            $table->date('announcement_date');
            $table->date('valid_until')->nullable();
            $table->boolean('is_published')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->string('attachment_url')->nullable();
            $table->string('external_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
