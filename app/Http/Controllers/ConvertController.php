<?php

namespace App\Http\Controllers;

use PhpOffice\PhpWord\IOFactory;
use Illuminate\Http\Request;
use mPDF;

class ConvertController extends Controller
{
    //
    public function convertPdfToWord()
{
    // Load the PDF file
    $pdfFile = public_path('Neural Networks Proposal.pdf');
    
    $phpWord = IOFactory::load($pdfFile);
   
    // Save the Word file
    $wordFile = public_path('output.docx');
    $xmlWriter = IOFactory::createWriter($phpWord, 'Word2007');
    $xmlWriter->save($wordFile);
    
    return response()->download($wordFile);
}
public function convertPdfToWord2()
{
   
       // Load the PDF file
    $pdfFile = public_path('input.pdf');
    $mpdf = new Mpdf();
    $mpdf->SetImportUse();
    $pagecount = $mpdf->SetSourceFile($pdfFile);
    $tplId = $mpdf->ImportPage($pagecount);
    
    // Save the DOCX file
    $docxFile = public_path('output.docx');
    $mpdf->Output($docxFile, 'F');
    
    // Load the DOCX file into PHPWord
    $phpWord = IOFactory::load($docxFile);
    
    // Save the Word file
    $wordFile = public_path('output.docx');
    $xmlWriter = IOFactory::createWriter($phpWord, 'Word2007');
    $xmlWriter->save($wordFile);
    
    return response()->download($wordFile);
    
    
}
}
