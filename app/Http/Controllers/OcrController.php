<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use thiagoalessio\TesseractOCR\TesseractOCR;

class OcrController extends Controller
{
    public function showForm()
    {
        return view('ocr.upload');
    }

    public function processImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:5120', // max 5MB
        ]);

        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();

        // Save in public/images
        $file->move(public_path('images'), $fileName);

        $imagePath = public_path('images/' . $fileName);

        if (!file_exists($imagePath)) {
            return back()->withErrors(['image' => 'Ne mogu da pronađem uploadovanu sliku!']);
        }

        // numbers filter
        $numbers = $this->extractAndSortNumbersFromImage($imagePath);
        //dd($numbers);
        return view('ocr.upload', [
            'imageUrl' => asset('images/' . $fileName),
            'numbers' => $numbers,
        ]);
    }

    private function extractAndSortNumbersFromImage(string $imagePath): array
    {
        $text = (new TesseractOCR($imagePath))
            ->lang('eng', 'deu', 'srp')
            ->run();

        preg_match_all('/[\d]+[.,][\d]+/', $text, $matches);

        $uniqueNumbers = array_unique($matches[0]);

        usort($uniqueNumbers, function ($a, $b) {
            $aClean = floatval(str_replace(',', '.', str_replace('.', '', $a)));
            $bClean = floatval(str_replace(',', '.', str_replace('.', '', $b)));
            return $bClean <=> $aClean;
        });

        return $uniqueNumbers;
    }
}
