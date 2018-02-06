<?php

use Illuminate\Database\Eloquent\Model;
class  Subject  extends Model{
  protected $guarded = [];

  public function department () {
    return $this->belongTo(Department::class);
  }
}