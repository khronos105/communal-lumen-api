<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
    }

    public function store(Request $request){
    }

    public function show($invoice){
        $invoice = Invoice::with('docs')->findOrFail($invoice);

        return $this->successResponse($invoice);
    }

    public function update(Request $request, $invoice){
        // TODO
    }

    public function destroy($invoice){
    }
}
