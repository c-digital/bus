<?php

namespace App\Models;

class Merchandise extends Model
{
	protected $table = 'merchandise';

	protected $primaryKey = 'id';

	protected $fillable = [
		'id_company',
		'id_user',
		'id_assign',
		'messenger',
		'origin',
		'destination',
		'description',
		'weight',
		'price',
		'receipt',
		'billing',
		'discount',
		'total',
		'status'
	];

	public function company()
    {
        return $this->belongsTo('Company', 'id_company');
    }

    public function user()
    {
        return $this->belongsTo('User', 'id_user');
    }

    public function getKgAttribute()
    {
    	return $this->price / $this->weight;
    }
}
