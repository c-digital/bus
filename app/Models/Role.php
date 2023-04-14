<?php

namespace App\Models;

class Role extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected string $table = 'roles';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected string $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected array $fillable = ['name', 'description'];
}
