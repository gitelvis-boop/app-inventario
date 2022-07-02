<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::all();
    }

    public function store(Request $request)
    {

        $ruc = $request->ruc;
        $razonSocial = $request->razonSocial;
        $nombreComercial = $request->nombreComercial;

        try {

            if (!empty($ruc) && !empty($razonSocial) && !empty($nombreComercial)) {

                $customer = new Customer();
                $customer->ruc = $ruc;
                $customer->razonSocial = $razonSocial;
                $customer->nombreComercial = $nombreComercial;
                $customer->save();

                return ['success' => true, 'customer' => $customer];
            }

            return ['success' => false, 'message' => 'Los campos son obligatorios.'];
        } catch (\Exception) {

            return ['success' => false];
        }
    }

    public function show($id)
    {
        return Customer::find($id);
    }

    public function update(Request $request)
    {
        $ruc = $request->ruc;
        $razonSocial = $request->razonSocial;
        $nombreComercial = $request->nombreComercial;

        try {

            if (!empty($ruc) && !empty($razonSocial) && !empty($nombreComercial)) {
                $customer = Customer::findOrFail($request->id);
                $customer->ruc = $ruc;
                $customer->razonSocial = $razonSocial;
                $customer->nombreComercial = $nombreComercial;
                $customer->save();

                return ['success' => true, 'customer' => $customer];
            }

            return ['success' => false, 'message' => 'Los campos son obligatorios.'];
        } catch (\Exception) {
            return ['success' => false];
        }
    }

    public function destroy($id){
        return Customer::destroy($id);
    }
    
}
