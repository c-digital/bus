<x-template-dashboard active="tickets" title="Tickets">

    <style>
        .close {
            color:red;
        }

        .seat {
            margin: 5px 0;
            color:#fff;
        }
        .seat-body {
            position: relative;
            width: 35px;
            height: 35px;
            border: 1px solid #979797;
            display: inline-block;
            border-top-left-radius: 2px;
            border-top-right-radius: 2px;
            margin-right: 10px;
            cursor: pointer;
            line-height: 35px;
            text-align: center;
        }
        .seat-handle-left {
            width: 3px;
            height: 20px;
            right: -4px;
            bottom: -1px;
            border-top-right-radius: 2px;
            border-bottom-right-radius: 2px;
            border-left: none !important;
            position: absolute;
            border: 1px solid #979797;
        }
        .seat-handle-right {
            width: 3px;
            bottom: -1px;
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
            border-right: none !important;
            height: 20px;
            left: -4px;
            position: absolute;
            border: 1px solid #979797;
        }
        .seat-bottom {
            width: 35px;
            right: 0px;
            bottom: -4px;
            border-bottom-right-radius: 2px;
            border-bottom-left-radius: 2px;
            border-top: none !important;
            position: absolute;
            border: 1px solid #979797;
            height: 3px;
        }


        .seat-visibility{
            visibility: hidden;
        }

        .seat.occupied .seat-body{
            background-color: #979797;
            border-color:  #979797;
        }
        /*selected*/
        .seat.selected .seat-body{
            background-color: #5b69bc;
            border-color:  #5b69bc;
            color:#fff;
        }
        .seat.selected .seat-body span{
            border-color:  #5b69bc;
        }
        /*ladies*/
        .seat.ladies .seat-body {
            background-color: #2E8B57;
            border-color: #2E8B57;
        }
        .seat.ladies .seat-body span{
            border-color:  #2E8B57;
        }


        .seat:not(.ladies) .seat-body:hover{
            /*background-color: #5F69bc;*/
            border-color:  #5b69bc;
        }
        .seat .seat-body:hover span{
            border-color:  #5b69bc;
        }



        /*seat details*/
        .seat-details{
        }
        .seat-details-content{
            margin: 20px 0;
        }

        .actions > li {
            list-style: none !important;
        }
    </style>

	<div class="card">
		<div class="card-header">Info del viaje</div>

		<div class="card-body">
			<table id="table" class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ lang('users.id') }}</th>
                        <th>{{ 'Fecha' }}</th>
                        <th>{{ 'Conductor' }}</th>
                        <th>{{ 'Vehiculo' }}</th>
                        <th>{{ 'Viaje' }}</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>{{ $assign->id }}</td>
                        <td>{{ $assign->date }}</td>
                        <td>{{ $assign->driver->name }}</td>
                        <td>{{ $assign->vehicle->internal_number . ' - ' . $assign->vehicle->type->type . ' - ' . $assign->vehicle->plate }}</td>
                        <td>{{ $assign->travel->time . ' - ' . $assign->travel->route->destination . ' x ' . $assign->travel->route->origin }}</td>
                    </tr>
                </tbody>
            </table>
		</div>
	</div>

    <hr>

    <div class="row">
    	<div class="col-6">
    		<div class="card">
    			<div class="card-header">Asientos</div>

    			<div class="card-body mx-auto">
                    <div class="seatsList">{!! $html !!}</div>
    			</div>
    		</div>
    	</div>

    	<div class="col-6">
    		<div class="card">
    			<div class="card-header">Venta</div>

    			<div class="card-body"></div>
    		</div>
    	</div>
    </div>
</x-template-dashboard>