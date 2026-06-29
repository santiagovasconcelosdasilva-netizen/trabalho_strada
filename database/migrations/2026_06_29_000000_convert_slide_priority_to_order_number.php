<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('slides', 'priority')) {
            return;
        }

        Schema::table('slides', function (Blueprint $table) {
            $table->unsignedInteger('display_order')->default(1);
        });

        DB::table('slides')->where('priority', 'alta')->update(['display_order' => 1]);
        DB::table('slides')->where('priority', 'média')->update(['display_order' => 2]);
        DB::table('slides')->where('priority', 'baixa')->update(['display_order' => 3]);
        DB::table('slides')
            ->whereNotIn('priority', ['alta', 'média', 'baixa'])
            ->update(['display_order' => DB::raw('priority')]);

        Schema::table('slides', function (Blueprint $table) {
            $table->dropColumn('priority');
        });

        Schema::table('slides', function (Blueprint $table) {
            $table->renameColumn('display_order', 'priority');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->string('priority_label')->default('média');
        });

        DB::table('slides')->where('priority', 1)->update(['priority_label' => 'alta']);
        DB::table('slides')->where('priority', 2)->update(['priority_label' => 'média']);
        DB::table('slides')->where('priority', '>=', 3)->update(['priority_label' => 'baixa']);

        Schema::table('slides', function (Blueprint $table) {
            $table->dropColumn('priority');
        });

        Schema::table('slides', function (Blueprint $table) {
            $table->renameColumn('priority_label', 'priority');
        });
    }
};
