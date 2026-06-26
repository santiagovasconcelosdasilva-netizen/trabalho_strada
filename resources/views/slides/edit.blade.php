<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Slide - Strada</title>
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">Strada</a>
    </div>
  </nav>

  <main class="container py-4" style="max-width: 700px;">
    <h1 class="h2 mb-4">
      <i class="bi bi-pencil-square"></i> Editar Slide
    </h1>

    <div class="card">
      <div class="card-body p-4">
        <form action="{{ route('slides.update', $slide) }}" method="POST" enctype="multipart/form-data">
          @method('PUT')
          @include('slides._form', ['slide' => $slide])
        </form>
      </div>
    </div>
  </main>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
