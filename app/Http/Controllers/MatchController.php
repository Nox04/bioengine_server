<?php

namespace App\Http\Controllers;

use App\Helpers\Biometrics;
use App\Helpers\Io;
use Illuminate\Http\Request;

class MatchController extends BaseController
{
    public function matchAgainstDatabase(Request $request)
    {
        //Validation
        $response = $this->validateRequest($request->all(), [
            'document'  => 'required|numeric|digits_between:6,12',
            'image'     => 'required',
        ]);
        if(isset($response)) return $response;

        //External processing
        $document = $request->input('document');
        Io::saveImageToCache($document, $request->input('image'));
        $process = Biometrics::match($document);
        Io::deleteImageFromCache('cache/$document.bmp');

        if (! $process->isSuccessful())
            return Response::externalBinError($process->getOutput());
        else
            return Response::externalBinSuccess($process->getOutput());
    }
}
