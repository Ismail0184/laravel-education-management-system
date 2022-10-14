<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\District;
use PDF;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Generate PDF
    public function createPDF() {
         // retreive all records from db
         $datas = District::all();
  
         // share data to view
         view()->share('datas',$datas);
         $pdf = PDF::loadView('districts.preview', $datas);
   
         // download PDF file with download method
         return $pdf->download('pdf_file.pdf');
      }
}