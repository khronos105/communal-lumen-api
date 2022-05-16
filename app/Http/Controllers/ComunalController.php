<?php

namespace App\Http\Controllers;

use App\Models\Comunal;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Carbon\Carbon;

class ComunalController extends Controller
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
        $comunals = Comunal::all();
        return $this->successResponse($comunals);
    }

    public function store(Request $request){

        $comunal = Comunal::create([
            'image' => $request->image,
            'date'  => Carbon::now()
        ]);
        
        return $this->successResponse($comunal, Response::HTTP_CREATED);
    }

    public function show($comunal){
        $comunal = Comunal::with('invoices')->findOrFail($comunal);

        return $this->successResponse($comunal);
    }

    public function update(Request $request, $comunal){
        // TODO
    }

    public function destroy($comunal){
        $comunal = Comunal::findOrFail($comunal);

        $comunal->delete();

        return $this->successResponse($comunal);
    }
}
