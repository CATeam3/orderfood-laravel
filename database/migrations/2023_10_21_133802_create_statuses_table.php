<?php

use App\Models\Status;
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
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $statuses = [
            ['name' => 'Potvrđena'],
            ['name' => 'Poništena'],
            ['name' => 'U pripremi'],
            ['name' => 'Spremna'],
            ['name' => 'Dostavlja se'],
            ['name' => 'Isporučena'],
        ];

        foreach ($statuses as $element) {
            $status = new Status();
            $status->name = $element['name'];
            $status->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statuses');
    }
};
