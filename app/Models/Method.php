<?php

namespace App\Models;

class Method extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'methods';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
