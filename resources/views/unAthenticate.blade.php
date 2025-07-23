<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Required</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 1rem;
        }
    </style>
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow p-4">
            <div class="text-center">
                <h2 class="text-danger">Access Restricted</h2>
                <p class="mb-4">You must be logged in to continue.</p>
                <a href="{{ route('admin.login') }}" class="btn btn-primary">Login Now</a>
            </div>
        </div>
    </div>
</body>
</html>
