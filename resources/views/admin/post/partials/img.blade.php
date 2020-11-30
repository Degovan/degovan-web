@if ($post->image)
    <img src="{{ asset('/storage/assets/posts/' . $post->image) }}" style="max-height: 40px;"/>;
@endif