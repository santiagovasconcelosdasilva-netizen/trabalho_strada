<div class="mb-3">
  <label for="name" class="form-label">Nome</label>
  <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}" required>
</div>

<div class="mb-3">
  <label for="email" class="form-label">Email</label>
  <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}" required>
</div>

<div class="mb-3">
  <label for="password" class="form-label">Senha</label>
  <input type="password" id="password" name="password" class="form-control" {{ isset($user) ? '' : 'required' }}>
</div>

<div class="mb-3">
  <label for="password_confirmation" class="form-label">Confirme a senha</label>
  <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" {{ isset($user) ? '' : 'required' }}>
</div>
