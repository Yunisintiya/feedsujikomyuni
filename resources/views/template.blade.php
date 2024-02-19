<!DOCTYPE html>
<html>
<head>
    <title>Feed</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    h2 {
        margin-top: 20px;
    }
    .card {
    width: auto; /* Mengatur lebar card sesuai dengan konten di dalamnya */
    max-width: 100%; /* Mengatur lebar maksimum card agar tidak melebihi lebar parent container */
        }

    .card-body {
    padding: 0; /* Menghapus padding di dalam card body */
    }

    .card-body video {
    width: 100%; /* Mengatur lebar video agar sesuai dengan lebar card body */
    height: auto; /* Mengatur tinggi video agar sesuai dengan proporsi aslinya */
}
    </style>
</head>
<body class="p-3 m-0 border-0 bd-example m-0 border-0">
    <nav class="navbar navbar-expand-lg" style="background-color: #cba7c1;" >
        <div class="container">
            <a class="navbar-brand"  href="#">Vidio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto"> 
                    <li class="nav-item">
                        <!-- Tombol logout yang tersembunyi -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            <button type="submit" class="btn btn-outline-light">Logout</button>
                        </form>
                        <!-- Tombol logout yang terlihat -->
                        <button type="button" class="btn btn-outline-light" onclick="document.getElementById('logout-form').submit()">Logout</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script>
    function showLogoutForm() {
        // Menampilkan form logout
        document.getElementById('logout-form').style.display = 'block';
    }
    </script>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


