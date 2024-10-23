<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'guard_name',
    ];

    public static function getRolesToSelect()
    {
        $roles = Role::get();

        $rolesToSelect = [];

        foreach ($roles as $role) {
            $rolesToSelect[$role->id] = $role->name;
        }

        return $rolesToSelect;
    }
}