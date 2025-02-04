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
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->string('cpf')->nullable()->after('id'); // Campo CPF
            $table->string('url_photo')->nullable()->after('cpf'); // Campo URL da Foto
            $table->string('telefone')->nullable()->after('url_photo'); // Campo Telefone
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropColumn(['cpf', 'url_photo', 'telefone']);
        });
    }
};
