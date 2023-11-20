<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Options;
use Dompdf\Dompdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        
        $dompdf = new Dompdf($options);
        
        $html = View('users.pdf.fichaAluno')->render();
        
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
       
        return $dompdf->stream('nome-do-arquivo-pdf.pdf');
    }
}