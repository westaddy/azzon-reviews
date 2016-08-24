<?php

// src/migrations/2016_00_00_000000_create_review_table.php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateReviewTable extends Migration{
   public function up() {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('product_id');
            $table->integer('rating');
            $table->text('comment');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE reviews ADD ip_address VARBINARY(16) UNIQUE");
    }

    public function down()
    {
         DB::statement("ALTER TABLE reviews DROP COLUMN ip_address");
        Schema::drop('reviews');
    }
}
