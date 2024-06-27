<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();
            $table->string('display_name')->unique();
            $table->string('description')->unique();
            $table->timestamps();
        });
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();

            $table->string('name')->unique();
            $table->string('display_name')->unique();
            $table->string('description')->unique();
        });

        Schema::create('group_permission', function (Blueprint $table) {
            $table->bigInteger('group_id')->unsigned();
            $table->bigInteger('permission_id')->unsigned();

            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('permission_id')->references('id')->on('permissions');

            $table->primary(['group_id', 'permission_id']);
            $table->timestamps();
        });
        Schema::create('group_user', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('group_id')->unsigned();
            
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('group_id')->references('id')->on('groups')->cascadeOnDelete();

            $table->primary(['user_id', 'group_id']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('group_user');
        Schema::dropIfExists('group_permission');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('groups');
    }
};
