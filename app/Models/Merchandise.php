<?php

use App\Models;

class Merchandise extends Model
{
	protected $table = 'merchandise';

	protected $primaryKey = 'id';

	protected $fillable = [
		'messenger',
		'origin',
		'destination',
		'description',
		'weight',
		'price',
		'receipt',
		'discount',
		'total'
	];
}
