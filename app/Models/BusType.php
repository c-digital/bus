<?php

namespace App\Models;

class BusType extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bus_type';

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
    protected $fillable = ['type', 'design', 'total_seats', 'seats_number', 'status'];
}
