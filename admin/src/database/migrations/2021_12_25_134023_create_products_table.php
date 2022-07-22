<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_code')->nullable();
            $table->string('title');
            $table->unsignedBigInteger('category_id');
            $table->string('link_image')->nullable();
            $table->longText('description');
            $table->decimal('price', 9, 2)->default(0);
            $table->decimal('reduced_price', 9, 2)->nullable();
            $table->tinyInteger('favorite')->default(0)->comment('0: Not favorite , 1: Favorite');
            $table->tinyInteger('status')->default(1)->comment('0: Block , 1: Active');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
