<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function user(){
        return $this->hasMany(User::class);
    }
    
    public function permission(){
        return $this-> belongsToMany(Permission::class,'role_permissions');
    }

    use HasFactory;
}
