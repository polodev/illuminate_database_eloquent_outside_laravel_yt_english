<?php  

require 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager;

Manager::schema()->dropIfExists('departments');
Manager::schema()->create('departments', function ($table) {
  $table->increments('id');
  $table->string('name');
  $table->timestamps();
});


Manager::schema()->dropIfExists('subjects');
Manager::schema()->create('subjects', function ($table) {
  $table->increments('id');
  $table->string('name');
  $table->integer('department_id')->unsigned();
  $table->timestamps();
});