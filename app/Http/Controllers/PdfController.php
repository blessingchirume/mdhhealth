<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Tcpdf\Fpdi;

class PdfController extends Controller
{
    public function modifyPdf()
    {
        // Create new instance of FPDI with TCPDF
        $pdf = new Fpdi();

        // Add a page to the PDF
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        // Path to the existing PDF file
        $pdfFilePath = public_path('files/claim.pdf');

        // Import existing PDF file
        $pageCount = $pdf->setSourceFile($pdfFilePath);

        // Import each page and overlay text
        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
            $templateId = $pdf->importPage($pageNo);
            $pdf->useTemplate($templateId, null, null, 0, 0, true);
           // $pdf->Text(100, 100, 'Your text here');
        }

        // Output or save the modified PDF
        $pdf->Output('modified_pdf.pdf', 'D');
    }
}
