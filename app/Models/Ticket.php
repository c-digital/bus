<?php

namespace App\Models;

class Ticket extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tickets';

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
        'id_customer',
        'id_assign',
        'id_sale',
        'id_company',
        'id_sale',
        'id_user',
        'seat',
        'status',
        'amount'
    ];

    public function assign()
    {
        return $this->belongsTo('Assign', 'id_assign');
    }

    public function customer()
    {
        return $this->belongsTo('Customer', 'id_customer');
    }

    public function company()
    {
        return $this->belongsTo('Company', 'id_company');
    }

    public function user()
    {
        return $this->belongsTo('User', 'id_user');
    }
}
