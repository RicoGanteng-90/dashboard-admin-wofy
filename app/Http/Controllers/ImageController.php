<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function download($proof_payment)
{
        $filePath = public_path('bukti/'.$proof_payment);
        if (file_exists($filePath)) {
            return response()->download($filePath);
        }
}

}
