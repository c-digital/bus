<?php

namespace App\Controllers;

use App\Models\City;
use App\Models\Merchandise;

class MerchandiseController extends Controller
{
	public function __construct()
    {
        $this->middleware('Auth');
    }

    public function create()
    {
        $cities = City::get();

    	return view('merchandise.create', compact('cities'));
    }

    public function store()
    {
        Merchandise::create([
            'id_company' => auth()->id_company,
            'messenger' => json(request('messenger')),
            'origin' => request('origin'),
            'destination' => request('destination'),
            'description' => request('description'),
            'weight' => request('weight'),
            'price' => request('price'),
            'receipt' => json(request('price')),
            'discount' => json(request('discount')),
            'total' => request('total')
        ]);

        return redirect('/merchandise')
            ->with('success', 'Mercadería registrada satisfactoriamente');
    }
}
