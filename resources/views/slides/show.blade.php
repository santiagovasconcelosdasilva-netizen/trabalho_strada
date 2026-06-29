<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $slide->title }} - Strada</title>
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
      <i class="bi bi-eye"></i> Detalhes do Slide
    </h1>

    <div class="card">
      <div class="card-body p-4">
        <div class="mb-4">
          <label class="text-muted small">TAG</label>
          <p class="h5"><span class="badge bg-info">{{ $slide->tag }}</span></p>
        </div>

        <div class="mb-4">
          <label class="text-muted small">TÍTULO</label>
          <p class="h5">{{ $slide->title }}</p>
        </div>

        <div class="mb-4">
          <label class="text-muted small">DESCRIÇÃO</label>
          <p>{{ $slide->description }}</p>
        </div>

        <div class="mb-4">
          <label class="text-muted small">ORDEM DE APARICAO</label>
          <p><span class="badge bg-primary">{{ $slide->priority }}º</span></p>
        </div>

        <div class="mb-4">
          <label class="text-muted small">STATUS</label>
          <p>
            @if($slide->is_active)
              <span class="badge bg-success">Ativo no welcome</span>
            @else
              <span class="badge bg-secondary">Inativo</span>
            @endif
          </p>
        </div>

        <div class="mb-4">
          <label class="text-muted small">IMAGEM</label>
          <p>
            @if($slide->image_path)
              <img src="{{ asset('storage/' . $slide->image_path) }}" alt="{{ $slide->title }}" style="max-width: 300px; max-height: 250px;">
            @else
              <span class="text-muted">Nenhuma imagem</span>
            @endif
          </p>
        </div>

        <div class="mb-4">
          <label class="text-muted small">CRIADO EM</label>
          <p class="h6">{{ $slide->created_at->format('d/m/Y H:i') }}</p>
        </div>

        @if($slide->updated_at !== $slide->created_at)
          <div class="mb-4">
            <label class="text-muted small">ATUALIZADO EM</label>
            <p class="h6">{{ $slide->updated_at->format('d/m/Y H:i') }}</p>
          </div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-between mt-5">
          <a href="{{ route('slides.index') }}" class="btn btn-secondary btn-lg">
            <i class="bi bi-arrow-left"></i> Voltar
          </a>
          <div>
            <a href="{{ route('slides.edit', $slide) }}" class="btn btn-warning btn-lg">
              <i class="bi bi-pencil"></i> Editar
            </a>
            <form action="{{ route('slides.destroy', $slide) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este slide?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-lg">
                <i class="bi bi-trash"></i> Excluir
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
