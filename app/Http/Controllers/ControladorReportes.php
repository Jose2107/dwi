<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\Exportacion1;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Country;
use App\Models\City;

class ControladorReportes extends Controller{

	public function pdf(){
        $paises=Country::all();
		$pdf = PDF::loadView('vistapdf',['paises'=>$paises])->save(storage_path('app/public/') . 'reporte_pdf.pdf');
		return $pdf->download('reporte_pdf.pdf');
        // $registrarExport=new Exportacion1;
        //     return $registrarExport->download('Country.pdf');
	}

	public function excel(){

        return Excel::download(new Exportacion1(), 'reporte_excel.xlsx');
    }

	public function word(Request $req){
        $paises=Country::all();
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
		$text = $section->addText($paises);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('reporte_word.docx');
        return response()->download(public_path('reporte_word.docx'));
    }
}
