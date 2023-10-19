<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id('MealID');
            $table->string('MealName');
            $table->text('Description');
            $table->decimal('Price', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
