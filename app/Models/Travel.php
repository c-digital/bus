<?php

namespace App\Models;

class Travel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'travels';

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
    protected $fillable = ['time', 'days', 'status', 'stops', 'id_route', 'id_company', 'price'];

    public function route()
    {
        return $this->belongsTo('Route', 'id_route');
    }

    public function company()
    {
        return $this->belongsTo('Company', 'id_company');
    }

    public function getNameAttribute()
    {
        return "{$this->time} - {$this->route->origin} x {$this->route->destination}";
    }
}
