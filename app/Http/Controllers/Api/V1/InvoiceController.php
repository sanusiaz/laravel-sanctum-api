<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Filters\Api\V1\InvoiceFilter;
use App\Http\Requests\Api\V1\StoreInvoiceRequest;
use App\Http\Requests\Api\V1\UpdateInvoiceRequest;
use App\Http\Resources\Api\V1\InvoiceResource;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    public function index(Request $request) {
        
        $invoiceFilters = new InvoiceFilter();
        $filterItems = $invoiceFilters->transform($request);
        
        
        $invoices = Invoice::where($filterItems)->paginate();
        return response()->json([
            $invoices
        ], 200);
    }

    public function show( Invoice $invoice )
    {
        return response()->json([
            'data' => new InvoiceResource($invoice)
        ], 200);
    }

    public function store ( StoreInvoiceRequest $request )
    {

        $request->validated();

        $invoice = Invoice::create([
            'customer_id'  => $request->customer_id,
            'status'        => $request->status,
            'quantity'      => $request->quantity,
            'amount'        => $request->amount,   
            'billed_date'   => $request->billedDate,
            'payed_date'    => $request->payedDate,
            'invoice_ref'   => Str::random(20)
        ]);

        return response()->json([
            'data' => $invoice,
            'message' => 'Invoice Has Been Created Successfully'
        ], 201);
    }

    public function update( UpdateInvoiceRequest $request, Invoice $invoice )
    {
        $request->validated();

        $invoice = $invoice->update($request->all());


        return response()->json([
            'data' => $invoice,
            'message' => 'Invoice Has been updated Successfully',
            'status' => 'success'
        ], 201);
        
    }


    public function destroy( Invoice $invoice )
    {
        $invoice->destroy($invoice);

        return response()->json([
            'message' => 'Invoice Has Been Deleted Successfully'
        ], 200);
    }
}
