<a href="{{ route('admin.contact.show', $contact->id) }}" class="btn btn-sm btn-info" title="detail">
	<i class="fas fa-exclamation-circle"></i>
</a>
<button class="btn btn-sm btn-danger btn-delete" data-url="{{ route('admin.contact.destroy', $contact->id) }}">
	<i class="fas fa-trash-alt"></i>
</button>
