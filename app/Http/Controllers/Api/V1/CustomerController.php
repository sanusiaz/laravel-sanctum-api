<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\StoreCustomerRequest;
use App\Http\Requests\Api\V1\UpdateCustomerRequest;
use App\Http\Resources\Api\V1\CustomerCollection;
use App\Http\Resources\Api\V1\CustomerResource;
use App\Models\Customer;

use App\Http\Controllers\Controller;
use App\Http\Filters\Api\V1\CustomerFilter;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $includeInvoices = $request->query('includeInvoices');


        $customerFilter = new CustomerFilter();
        $filteredItems = $customerFilter->transform($request);

        $customer = Customer::where($filteredItems);

        // include invoices to customers data 
        if ( $includeInvoices && $includeInvoices === 'true' ) {
            $customer = $customer->with('invoices');
        }
        return new CustomerCollection( $customer->paginate()->appends($request->query()) ); 
    }

    public function show( Customer $customer, Request $request )
    {

        $includeInvoices = $request->query('includeInvoices');

        if ( $includeInvoices && $includeInvoices === 'true' ) {
            $customer = $customer->loadMissing('invoices');
        }
        return new CustomerResource( $customer );
    }

    public function store( StoreCustomerRequest $request )
    {
        $request->validated();

        $customer = Customer::create([
            'name'          => $request->name, 
            'email'         => $request->email,
            'address'       => $request->address, 
            'city'          => $request->city, 
            'state'         => $request->state, 
            'country'       => $request->country
        ]);

        return response()->json([
            'data' => $customer,
            'message' => 'Customer Has Been Created Successfully',
            'status' => 'success'
        ], 201);
    }

    public function update( UpdateCustomerRequest $request, Customer $customer )
    {
        $request->validated();

        if ( request()->method() === 'PUT' ) {

            $customer->update([
                'email' => $customer->email,
                'name' => $request->name,
                'address' => $request->address,
                'city'  => $request->city,
                'state' => $request->state,
                'country' => $request->country
            ]);
        }
        else {
            $customer->update($request->all());
        }

        return response()->json([
            'data' => $customer,
            'message' => 'Customer Data Updated Successfully',
            'status' => 'success'
        ], 201);
    }

    public function destroy( Customer $customer )
    {
        if ( $customer->delete() ) {
            return response()->json([
                'data' => $customer,
                'message' => 'Customer Has Been Deleted Successfully',
                'status' => 'success'
            ], 200);
        }
    }
}
