<?php

use Illuminate\Database\Eloquent\Model;
class Department extends Model{
  protected $guarded = [];

  public function subjects () {
    return $this->hasMany(Subject::class);
  }
}