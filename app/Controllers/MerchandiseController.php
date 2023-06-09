<?php

namespace App\Controllers;

use App\Models\Assign;
use App\Models\Cash;
use App\Models\City;
use App\Models\Merchandise;
use App\Models\Method;

class MerchandiseController extends Controller
{
	public function __construct()
    {
        $this->middleware('Auth');
    }

    public function index()
    {
        $assigns = Assign::where('date', '>=', now('Y-m-d'))
            ->get();

        $merchandise = Merchandise::get();

        return view('merchandise.index', compact('assigns', 'merchandise'));
    }

    public function show($id)
    {
        $merchandise = Merchandise::find($id);
        return view('merchandise.show', compact('merchandise'));
    }

    public function create()
    {
        $cities = City::get();
        $methods = Method::get();

    	return view('merchandise.create', compact('cities', 'methods'));
    }

    public function store()
    {      
        if (request('billing') == 'Pagado') {
            $last = Cash::where('id_user', auth()->id)
                ->orderByDesc('id')
                ->first();

            $balance = isset($last->balance) ? $last->balance : 0;
            $status = isset($last->status) ? $last->status : 'Cerrada';

            if ($status == 'Cerrada') {
                return redirect('/merchandise/create')
                    ->with('info', 'No puede agregar movimientos porque la caja está cerrada'); 
            }
        }        

        $merchandise = Merchandise::create([
            'id_company' => auth()->id_company,
            'id_user' => auth()->id,
            'messenger' => json(request('messenger')),
            'origin' => request('origin'),
            'destination' => request('destination'),
            'description' => request('description'),
            'weight' => request('weight'),
            'price' => request('price'),
            'receipt' => json(request('receipt')),
            'billing' => request('billing'),
            'discount' => request('discount'),
            'total' => request('total'),
            'status' => 'Abierto'
        ]);

        if (request('billing') == 'Pagado') {
            $description = 'Envío de mercadería #' . $merchandise->id;
            $balance = $balance + request('total');

            Cash::create([
                'id_company' => auth()->id_company,
                'id_user' => auth()->id,
                'date' => now('Y-m-d'),
                'method' => request('method'),
                'description' => $description,
                'amount' => request('total'),
                'type' => 'Entrada',
                'balance' => $balance,
                'status' => 'Abierta'
            ]);
        }

        return redirect('/merchandise')
            ->with('info', 'Mercadería registrada satisfactoriamente');
    }

    public function edit($id)
    {
        if (request('price-per-kg')) {
            return view('merchandise.price-per-kg');
        }
    }

    public function update()
    {
        if (request('assign')) {
            Merchandise::find(request('id'))
                ->update([
                    'id_assign' => request('id_assign'),
                    'status' => 'Asignado',
                ]);

            return redirect('/merchandise')
                ->with('info', 'Mercadería asignada satisfactoriamente a viaje seleccionado');
        }

        if (request('delivered')) {
            Merchandise::find(request('id'))
                ->update([
                    'status' => 'Entregado',
                ]);

            return redirect('/merchandise')
                ->with('info', 'Mercadería marcada como entregada');
        }

        if (request('price-per-kg')) {
            $array = require 'app/config.php';
            $pricePerKgOld = $array['pricePerKg'];

            $pricePerKgCurrent = request('price-per-kg');

            $string = file_get_contents('app/config.php');

            $string = str_replace(
                "'pricePerKg' => '$pricePerKgOld'",
                "'pricePerKg' => '$pricePerKgCurrent'",
                $string
            );

            file_put_contents('app/config.php', $string);

            return redirect('/merchandise/edit/0?price-per-kg=1')
                ->with('info', 'Precio por kilogramo actualizado satisfactoriamente');
        }
    }

    public function delete($id)
    {
        Merchandise::find($id)->delete();

        return redirect('/merchandise')
            ->with('info', 'Mercadería eliminada satisfactoriamente');
    }
}
