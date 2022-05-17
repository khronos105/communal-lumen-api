<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Carbon\Carbon;

class DocController extends Controller
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

    public function show($doc){
        $doc = Doc::findOrFail($doc);

        return $this->successResponse($doc);
    }

    public function update(Request $request, $doc){
        // TODO
    }

    public function destroy($doc){
    }
}
