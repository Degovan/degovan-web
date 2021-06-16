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
    <select name="category_id" id="kategori_id" class="form-select @error('category_id') is-invalid @enderror">
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
    <label for="exampleInput" class="form-label">Deskripsi</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="Deskripsi...">{{ $portofolios->description }}</textarea>
    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="mb-3 row">
    <div class="col-md-6">
        <label for="imageInput" class="form-label">Gambar</label>
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="input-porto" name="image">
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="col-md-6">
        <div class="mt-4 image-preview" id="preview-porto" style="background-image: url('{{Storage::url($portofolios->images_url)}}')"></div>
    </div>
</div>
<button class="btn btn-primary" type="submit">
    {{ $submit ?? 'Perbaharui' }}
</button>

@push('addon-script')
<script>
    function previewUpload(el, prevEl) {
        let input = document.getElementById(el);
        let prev = document.getElementById(prevEl);

        input.addEventListener('change', _=> {
            if(input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = e => {
                    prev.style.backgroundImage = `url("${e.target.result}")`;
                }

                reader.readAsDataURL(input.files[0]);
            }
            const oldImage = `url('{{ Storage::url($portofolios->images_url)}}')`;
            prev.style.backgroundImage = oldImage;
        });
    }

    previewUpload('input-porto', 'preview-porto');
</script>
@endpush