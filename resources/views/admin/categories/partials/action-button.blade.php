<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
<form action="{{ route('categories.destroy',  $category->id) }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-xs btn-danger">
        Delete
    </button>
</form>
{{-- <a href="{{ route('categories.show', $category->id) }}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Delete</a> --}}