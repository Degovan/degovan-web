<div class="btn-group">
    <div class="dropdown">
        <button class="btn btn-sm btn-primary dropdown-toggle mr-1 mb-1" 
            type="button" id="action-{{ $post->id }}"
                data-toggle="dropdown" 
                aria-haspopup="true"
                aria-expanded="false">
                Aksi
        </button>
        <div class="dropdown-menu" aria-labelledby="action-{{ $post->id }}">
            <a class="dropdown-item" href="{{ route('admin.post.edit', $post->id) }}">
                Sunting
            </a>
            <form action="{{ route('admin.post.destroy', ['post' => $post->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item text-danger">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>