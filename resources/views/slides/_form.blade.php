<div class="mb-3">
  <label for="tag" class="form-label">Tag <span class="text-danger">*</span></label>
  <input type="text" class="form-control @error('tag') is-invalid @enderror" id="tag" name="tag" value="{{ old('tag', $slide->tag ?? '') }}" placeholder="Ex: Desenvolvimento Web" required>
  @error('tag')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label for="title" class="form-label">Título <span class="text-danger">*</span></label>
  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $slide->title ?? '') }}" placeholder="Ex: Soluções Inovadoras" required>
  @error('title')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label for="description" class="form-label">Descrição <span class="text-danger">*</span></label>
  <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Descreva o conteúdo do slide..." required>{{ old('description', $slide->description ?? '') }}</textarea>
  @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label for="priority" class="form-label">Prioridade <span class="text-danger">*</span></label>
  <select class="form-select @error('priority') is-invalid @enderror" id="priority" name="priority" required>
    <option value="">Selecione uma prioridade</option>
    <option value="baixa" {{ old('priority', $slide->priority ?? '') == 'baixa' ? 'selected' : '' }}>Baixa</option>
    <option value="média" {{ old('priority', $slide->priority ?? '') == 'média' ? 'selected' : '' }}>Média</option>
    <option value="alta" {{ old('priority', $slide->priority ?? '') == 'alta' ? 'selected' : '' }}>Alta</option>
  </select>
  @error('priority')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
</div>

<div class="mb-3">
  <label for="image_path" class="form-label">Imagem <span class="text-danger">*</span></label>
  @if(isset($slide) && $slide->image_path)
    <div class="mb-2">
      <img src="{{ asset('storage/' . $slide->image_path) }}" alt="{{ $slide->title }}" style="max-width: 200px; max-height: 150px;">
      <p class="small text-muted">Carregue uma nova imagem para substituir</p>
    </div>
  @endif
  <input type="file" class="form-control @error('image_path') is-invalid @enderror" id="image_path" name="image_path" accept="image/*"{{ isset($slide) ? '' : ' required' }}>
  @error('image_path')
    <div class="invalid-feedback">{{ $message }}</div>
  @enderror
  <small class="text-muted">Formatos: JPG, PNG, GIF. Máximo 2MB</small>
</div>



<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <a href="{{ route('slides.index') }}" class="btn btn-secondary btn-lg">Cancelar</a>
  <button type="submit" class="btn btn-primary btn-lg">
    <i class="bi bi-check-circle"></i> {{ isset($slide) ? 'Atualizar' : 'Criar' }} Slide
  </button>
</div>
