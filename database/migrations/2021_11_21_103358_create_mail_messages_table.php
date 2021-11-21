<?php

use App\Models\Batch;
use App\Models\Flag;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Batch::class)->constrained();
            $table->string('nik');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->foreignIdFor(Flag::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_messages');
    }
}
