<?php

namespace App\Models;

class Vehicle extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vehicles';

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
        'id_type',
        'internal_number',
        'plate',
        'year',
        'model',
        'chasis_number',
        'owner',
        'owner_phone',
        'status'
    ];

    public function type()
    {
        return $this->belongsTo('BusType', 'id_type');
    }
}
