<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gerenciar Slides - Strada</title>
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">Strada</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">Usuários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('slides.index') }}">Slides</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container py-4">
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    @if($errors->any())
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Erro!</strong>
        <ul class="mb-0">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h1 class="h2">Gerenciar Slides</h1>
        <p class="text-muted">Crie, visualize, edite e exclua slides do hero section.</p>
      </div>
      <a href="{{ route('slides.create') }}" class="btn btn-primary btn-lg">
        <i class="bi bi-plus-circle"></i> Novo Slide
      </a>
    </div>

    <div class="card">
      <div class="card-body">
        @if($slides->count())
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead class="table-light">
                <tr>
                  <th style="width: 5%;">ID</th>
                  <th style="width: 5%;">Imagem</th>
                  <th>Tag</th>
                  <th>Título</th>
                  <th>Descrição</th>
                  <th>Prioridade</th>
                  <th style="width: 18%;">Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach($slides as $slide)
                  <tr>
                    <td><strong>{{ $slide->id }}</strong></td>
                    <td>
                      @if($slide->image_path)
                        <img src="{{ asset('storage/' . $slide->image_path) }}" alt="{{ $slide->title }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                      @else
                        <span class="badge bg-secondary">Sem imagem</span>
                      @endif
                    </td>
                    <td><span class="badge bg-info">{{ $slide->tag }}</span></td>
                    <td>{{ Str::limit($slide->title, 30) }}</td>
                    <td>{{ Str::limit($slide->description, 40) }}</td>
                    <td>
                      @if($slide->priority === 'alta')
                        <span class="badge bg-danger">Alta</span>
                      @elseif($slide->priority === 'média')
                        <span class="badge bg-warning">Média</span>
                      @else
                        <span class="badge bg-success">Baixa</span>
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('slides.show', $slide) }}" class="btn btn-sm btn-outline-info" title="Ver">
                        <i class="bi bi-eye"></i>
                      </a>
                      <a href="{{ route('slides.edit', $slide) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                        <i class="bi bi-pencil"></i>
                      </a>
                      <form action="{{ route('slides.destroy', $slide) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este slide?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Excluir">
                          <i class="bi bi-trash"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="d-flex justify-content-center mt-4">
            {{ $slides->links() }}
          </div>
        @else
          <div class="text-center py-5">
            <i class="bi bi-images" style="font-size: 3rem; color: #ccc;"></i>
            <p class="text-muted mt-3">Nenhum slide encontrado. <a href="{{ route('slides.create') }}">Criar um novo?</a></p>
          </div>
        @endif
      </div>
    </div>

    <div class="mt-4">
      <a href="{{ url('/') }}" class="btn btn-secondary btn-lg">
        <i class="bi bi-arrow-left"></i> Voltar ao Site
      </a>
    </div>
  </main>

  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
