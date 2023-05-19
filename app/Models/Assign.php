<?php

namespace App\Models;

class Assign extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'assign';

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
    protected $fillable = ['date', 'status', 'start', 'end', 'amount', 'id_driver', 'id_vehicle', 'id_travel'];

    public function driver()
    {
        return $this->belongsTo('User', 'id_driver');
    }

    public function vehicle()
    {
        return $this->belongsTo('Vehicle', 'id_vehicle');
    }

    public function travel()
    {
        return $this->belongsTo('Travel', 'id_travel');
    }
}
