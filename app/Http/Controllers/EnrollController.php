<?php

namespace App\Http\Controllers;

use App\Http\Presets\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class EnrollController extends BaseController
{
    public function enrollToDatabase(Request $request)
    {
        //Validation
        $response = $this->validateRequest($request->all(), [
            'document'  => 'required|numeric|digits_between:6,12',
            'image'     => 'required',
            'position' => 'required|numeric',
        ]);
        if(isset($response)) {
            return $response;
        }

        //Save image to cache
        Storage::disk('local')->put(
            'cache/'.$request->input('document').'.bmp',
            base64_decode($request->input('image'))
        );

        //Process the request on java
        $process = new Process([
            storage_path().'/app/run.sh',
            storage_path().'/app/',
            'enroll',
            $request->input('document'),
            storage_path().'/app/cache/'.$request->input('document').'.bmp',
            $request->input('position'),
        ]);

        $process->run();

        //Clean cache
        Storage::delete('cache/'.$request->input('document').'.bmp');

        //Return error if process fail
        if (! $process->isSuccessful()) {
            return response()->json(
                ['error' => $process->getOutput()],
                Status::SERVER_ERROR,
                $this->getHeaders()
            );
        }

        //Response the successful request
        return response()->json(
            ['message' => trim(preg_replace(
                '/\s\s+/',
                ' ',
                $process->getOutput())),
            ],
            Status::SUCCESS,
            $this->getHeaders()
        );
    }
}
