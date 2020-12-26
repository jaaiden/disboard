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
            $table->uuid('uuid');                           // Unique identifier
            $table->string('name');                         // Project name
            $table->text('description');                    // Project description
            $table->string('project_url');                  // Url to project
            $table->json('categories');                     // List of categories this project belongs to, stored as json array
            $table->json('developers');                     // List of project developers/owners, stored as json array
            $table->string('cover_image');                  // Cover image, should be at least 960x540/16:9 (server banner background)
            $table->string('icon');                         // App icon, should be square and at least 512x512
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
