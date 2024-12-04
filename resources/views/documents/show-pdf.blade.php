<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Document Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .qr-code {
            text-align: center;
            margin-top: 20px;
        }
        .document-info {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Document Details</h1>
    <div class="document-info">
        <p><strong>Title (FR):</strong> {{ $document->title_fr }}</p>
        <p><strong>Title (EN):</strong> {{ $document->title_en }}</p>
        <p><strong>Uploaded By:</strong> {{ $document->user->name }}</p>
        <p><strong>Date Uploaded:</strong> {{ $document->created_at->format('Y-m-d H:i') }}</p>
        <p><strong>File Path:</strong> {{ asset('storage/' . $document->file_path) }}</p>
    </div>
    <div class="qr-code">
    <h3>QR Code:</h3>
        <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code">
    </div>
</body>
</html>
