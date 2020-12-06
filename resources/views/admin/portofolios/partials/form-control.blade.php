<div class="mb-3">
    <label for="title" class="form-label">Judul</label>
    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ?? $portofolios->title }}" id="title"  placeholder="Judul Portofolio...">
    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="kategori" class="form-label">Kategori</label>
    <select name="category_id" id="kategori_id" class="form-select @error('service_id') is-invalid @enderror">
        <option selected disabled>Open this select menu</option>
        @foreach ($categories as $category)
            <option {{ $category->id == $portofolios->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3">
    <label for="layanan" class="form-label">Layanan</label>
    <select name="service_id" id="layanan_id" class="form-select @error('service_id') is-invalid @enderror">
        <option selected disabled>Open this select menu</option>
        @foreach ($services as $service)
            <option {{ $service->id == $portofolios->service_id ? 'selected' : '' }} value="{{ $service->id }}">{{ $service->name }}</option>
        @endforeach
    </select>
    @error('service_id')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
</div>
<div class="mb-3">
    <label for="exampleInput" class="form-label">Deskripsi</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="Deskripsi...">{{ $portofolios->description }}</textarea>
    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<button class="btn btn-primary" type="submit">
    {{ $submit ?? 'Perbaharui' }}
</button>