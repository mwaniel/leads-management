<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lead Management App</title>
    <!-- Include CSS frameworks or custom stylesheets here -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Lead Management</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('leads.index') }}">All Leads</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('leads.create') }}">Add Lead</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('salespersons.index') }}">Salespersons</a>
                </li>
                <!-- Add more navigation links as needed -->
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
