<a href="{{ route('portofolios.edit', $portofolio->id) }}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
<form action="{{ route('portofolios.destroy',  $portofolio->id) }}" method="POST">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-xs btn-danger">
        Delete
    </button>
</form>