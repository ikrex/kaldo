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
        // Frissítsük a contact_messages táblát, hogy tartalmazzon jegyzeteket és státuszt
        Schema::table('contact_messages', function (Blueprint $table) {
            if (!Schema::hasColumn('contact_messages', 'notes')) {
                $table->text('notes')->nullable();
            }
            if (!Schema::hasColumn('contact_messages', 'status')) {
                $table->string('status')->default('new');
            }
        });

        // Hozzuk létre a tasks táblát
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->foreignId('contact_message_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');

        Schema::table('contact_messages', function (Blueprint $table) {
            $table->dropColumn(['notes', 'status']);
        });
    }
};
