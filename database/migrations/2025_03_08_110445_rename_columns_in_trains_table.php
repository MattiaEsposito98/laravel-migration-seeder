<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('trains', function (Blueprint $table) {
            $table->renameColumn('è_in_orario?', 'è_in_orario');
            $table->renameColumn('è_cancellato?', 'è_cancellato');
        });
    }

    public function down(): void
    {
        Schema::table('trains', function (Blueprint $table) {
            $table->renameColumn('è_in_orario', 'è_in_orario?');
            $table->renameColumn('è_cancellato', 'è_cancellato?');
        });
    }
};
