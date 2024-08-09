<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class EyeTrackController extends Controller
{
    //
    // public function index()
    // {

    //     // $pythonPath = env('PYTHON_PATH', 'python');
    //     // $scriptPath = base_path('eyetrack.py');

    //     $command = escapeshellcmd("python eyetrack.py");
    //     $command = 'cd C:\\studies\\amypo technologies\\eyetracking\\ && python eyetrack.py 2>&1';
    //     // $escaped_command = escapeshellcmd($command);
    //     $output = shell_exec($command);
    //     return view('eyetrack');
    //     // echo "<pre>$output</pre>";

    //     // return response()->json([
    //     //     'output' => $output,
    //     // ]);
    //     // // Specify the path to your Python executable and script
    //     // $pythonPath = 'C:\Program Files\Python312\python.exe';
    //     // $scriptPath = 'C:\studies\amypo technologies\eyetracking\eyetrack.py';
        
    //     // // Set the current working directory if needed
    //     // $cwd = 'C:\studies\amypo technologies\eyetracking\public';

    //     // // Create a new process to run the Python script
    //     // $process = new Process([$pythonPath, $scriptPath], $cwd);
        
    //     // // Optionally, set environment variables if needed
    //     // // $process->setEnv(['ENV_VAR' => 'value']);

    //     // // Start the process
    //     // $process->start();

    //     // // Optionally, handle the process output or errors
    //     // $process->wait();
    //     // if (!$process->isSuccessful()) {
    //     //     throw new ProcessFailedException($process);
    //     // }

    //     // return view('eyetrack');
    // }
    public function index()
    {
        $command = 'cd C:\\studies\\amypo technologies\\eyetracking\\ && python eyetrack.py 2>&1';
        $output = shell_exec($command);
        
        // Extract the current time for no faces and no eyes detected from the Python script output
        $noFaceTime = null;
        $noEyeTime = null;
        if (preg_match('/No faces detected at (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $output, $matches)) {
            $noFaceTime = $matches[1];
        }
        if (preg_match('/No eyes detected at (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $output, $matches)) {
            $noEyeTime = $matches[1];
        }
        
        return view('eyetrack', ['output' => $output, 'noFaceTime' => $noFaceTime, 'noEyeTime' => $noEyeTime]);
    }
}
