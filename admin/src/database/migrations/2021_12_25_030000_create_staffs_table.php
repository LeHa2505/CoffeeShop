<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->date('birthday');
            $table->text('address');
            $table->string('phone', 20);
            $table->string('email', 100)->unique();
            $table->tinyInteger('position')->default(3)->comment("1-Quản lý, 2-Pha chế, 3-Phục vụ, 4-Thu ngân, 5-Order, 6-Bảo vệ");
            $table->tinyInteger('status')->default(1)->comment("1-Active, 2-Blocked");
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffs');
    }
}
