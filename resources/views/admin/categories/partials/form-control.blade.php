<div class="mb-3">
    <label for="exampleInput" class="form-label">Nama Kategori</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInput" value="{{ old('name') ?? $category->name }}" name="name" placeholder="Nama kategori...">
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<button class="btn btn-primary" type="submit">
    {{ $button ?? 'Perbaharui' }}
</button>