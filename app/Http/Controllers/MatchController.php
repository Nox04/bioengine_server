<?php

namespace App\Http\Controllers;

use App\Http\Presets\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;

class MatchController extends BaseController
{
    public function matchAgainstDatabase(Request $request)
    {
        $response = $this->validateRequest($request->all(), [
            'document'  => 'required|numeric|digits_between:6,12',
            'image'     => 'required'
        ]);
        if(isset($response)) return $response;

        Storage::disk('local')->put(
            'cache/'.$request->input('document').'.bmp',
            base64_decode($request->input('image'))
        );

        $process = new Process([
            storage_path().'/app/run.sh',
            storage_path().'/app/',
            'match',
            $request->input('document'),
            storage_path().'/app/cache/'.$request->input('document').'.bmp'
        ]);

        $process->run();
        Storage::delete('cache/'.$request->input('document').'.bmp');

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            return response()->json(
                ['error' => $process->getOutput()],
                Status::SERVER_ERROR,
                $this->getHeaders()
            );
        }

        return response()->json(
            ['message' => trim(preg_replace('/\s\s+/', ' ', $process->getOutput()))],
            Status::SUCCESS,
            $this->getHeaders()
        );
    }
}
