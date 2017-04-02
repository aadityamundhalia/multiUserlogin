<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
  protected $guarded = array('id');
  protected $fillable = ['name', 'display_name', 'description'];

  public function role()
  {
    return $this->hasMany('App\Role_user');
  }
  public function permission()
  {
    return $this->hasMany('App\Permission_user');
  }
}
