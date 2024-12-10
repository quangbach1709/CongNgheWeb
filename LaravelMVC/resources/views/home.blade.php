<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    @foreach($posts as $post)
        <p>{{ $post->content }}</p>
    @endforeach
</div>
