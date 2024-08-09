<!DOCTYPE html>
<html>
<head>
    <title>Eye Tracking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        pre {
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            white-space: pre-wrap;
        }
        .no-face-detected {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .no-eyes-detected {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        hr {
            border: none;
            border-top: 1px solid #ccc;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <h1>Eye Tracking Output</h1>
    <pre>{{ $output }}</pre>
    @if ($noFaceTime)
        <div class="no-face-detected">
            <p>Last time no face detected: {{ $noFaceTime }}</p>
        </div>
    @endif
    <hr>
    @if ($noEyeTime)
        <div class="no-eyes-detected">
            <p>Last time no eyes detected: {{ $noEyeTime }}</p>
        </div>
        <hr>
    @endif
</body>
</html>
