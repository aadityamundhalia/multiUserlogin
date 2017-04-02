<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
  protected $guarded = array('id');
  protected $fillable = ['name', 'display_name', 'description'];

  public function permission()
  {
    return $this->hasMany('App\permission_role');
  }
}
