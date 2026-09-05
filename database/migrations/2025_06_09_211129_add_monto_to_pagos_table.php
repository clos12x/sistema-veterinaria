<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('pagos', function (Blueprint $table) {
        $table->decimal('monto', 10, 2)->after('cvv')->nullable();
    });
}

public function down()
{
    Schema::table('pagos', function (Blueprint $table) {
        $table->dropColumn('monto');
    });
}

};
