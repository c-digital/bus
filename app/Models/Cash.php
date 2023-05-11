<?php

namespace App\Models;

class Cash extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cash';

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
    protected $fillable = [
        'id_company',
        'id_user',
        'date',
        'method',
        'description',
        'amount',
        'type',
        'balance',
        'status'
    ];
}
