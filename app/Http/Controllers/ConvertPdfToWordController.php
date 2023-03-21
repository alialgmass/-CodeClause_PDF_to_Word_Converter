<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;
use PhpOffice\PhpWord\PhpWord;
use Response;
use Storage;
class ConvertPdfToWordController extends Controller
{
 
    public function create()
    {
        return view ('request');
    }

public function convertPdfToWord($pdfFilePath, $wordFilePath) {
    $path = 'c:/Program Files/Git/mingw64/bin/pdftotext';
    $pdfText= Pdf::getText($pdfFilePath, $path);
    $phpWord = new PhpWord();
    $section = $phpWord->addSection();
    $section->addText($pdfText);
    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
    $objWriter->save($wordFilePath);
   
}
public function store(Request $request)
    {
       
       $path = $request->file('pdf')->store(
        'avatars', 'public'
    );
      
       $this->convertPdfToWord('./storage/'.$path, './storage/'.str_replace('pdf','doc',$path));
       unlink('./storage/'.$path);
     
       return Response::download('./storage/'.str_replace('pdf','doc',$path))->deleteFileAfterSend(true);
    }

}
