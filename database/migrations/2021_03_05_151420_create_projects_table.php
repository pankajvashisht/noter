<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->index();
            $table->foreignId('company_id')->nullable()->default(null)->constrained()->nullOnDelete();
            $table->tinyInteger('active')->default(1)->index();
            $table->tinyInteger('type')->default(1)->comment('1=>Web, 2=>Mob, 3=> Both')->index();
            $table->tinyInteger('time_period')->default(0)->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
