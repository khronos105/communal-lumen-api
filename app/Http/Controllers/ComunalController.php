<?php

namespace App\Http\Controllers;

use App\Models\Comunal;
use App\Models\Doc;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

use function PHPSTORM_META\map;

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
        $comunals = Comunal::with('invoices')->latest()->get();
        return $this->successResponse($comunals);
    }

    public function store(Request $request){

        $comunal = Comunal::create([
            //'image' => $request->image,
            'image' => 'https://static01.nyt.com/images/2021/09/14/science/07CAT-STRIPES/07CAT-STRIPES-mediumSquareAt3X-v2.jpg',
            'date'  => Carbon::now()
        ]);

        $this->uploadImage($comunal, $request);
        
        $comunal = Comunal::with('invoices')->findOrFail($comunal->id);

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

    private function uploadImage($comunal, Request $request)
    {
        $data = json_decode($request->invoices, true);

        foreach($data as $item){

            $parts = explode(',', $item['file']);  
            $dataURL = $parts[1];  
            $file = base64_decode($dataURL);
            

            $invoiceTitle = strtolower($item['title']);
            $invoiceTitle = explode(' ', $invoiceTitle);
            $invoiceTitle = implode('-', $invoiceTitle);

            $destination_path = __DIR__ . '/../../../storage/app/invoices_uploads/';
            $doc_url = "INVOICE-{$invoiceTitle}-". Carbon::now()->format('d-m-Y') . ".pdf";

            if(file_put_contents($destination_path . $doc_url, $file)){
                $doc = Doc::create([
                    'title' => $item['title'],
                    'url'   => '/invoices_uploads/' . $doc_url
                ]);

                $invoice = Invoice::create([
                    'title'     => $item['title'],
                    'quantity'  => $item['quantity']
                ]);

                $invoice->docs()->save($doc);

                $comunal->invoices()->attach([
                    $invoice->id
                ]);
            } else {
                return 'Cannot upload file';
            }
        }

        return $this->successResponse($comunal);
    }
}
