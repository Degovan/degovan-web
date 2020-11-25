<div class="mb-3">
    <label for="title" class="form-label">Judul</label>
    <input type="text" name="title" class="form-control" id="title"  placeholder="Judul Portofolio...">
</div>
<div class="mb-3">
    <label for="kategori" class="form-label">Kategori</label>
    <select name="category_id" id="kategori_id" class="form-select">
        <option selected disabled>Open this select menu</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="layanan" class="form-label">Layanan</label>
    <select name="service_id" id="layanan_id" class="form-select">
        <option selected disabled>Open this select menu</option>
        @foreach ($services as $service)
            <option value="{{ $service->id }}">{{ $service->name }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="exampleInput" class="form-label">Deskripsi</label>
    <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Deskripsi..."></textarea>
</div>
<button class="btn btn-primary" type="submit">
    Simpan
</button>