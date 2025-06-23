<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap & jQuery -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">✏️ Edit Blog - {{ $main->title }}</h2>

    <form action="{{ route('blog.update', $main->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Main Blog Title -->
        <div class="mb-4">
            <label class="form-label">Main Blog Title</label>
            <input type="text" name="title" class="form-control" value="{{ $main->title }}" required>
        </div>

        <!-- Loop through existing Sub Blogs -->
        @foreach($main->subBlogs as $index => $sub)
            <div class="border p-3 mb-4 sub-blog">
                <h5>🧩 Sub Blog #{{ $index + 1 }}</h5>

                <input type="hidden" name="sub_ids[]" value="{{ $sub->id }}">

                <div class="mb-2">
                    <label>Heading</label>
                    <input type="text" name="heading[]" class="form-control" value="{{ $sub->heading }}" required>
                </div>

                <div class="mb-2">
                    <label>Image (leave blank to keep existing)</label>
                    <input type="file" name="image[]" class="form-control">
                    @if($sub->image)
                        <img src="{{ asset('storage/' . $sub->image) }}" class="img-thumbnail mt-2" width="120">
                    @endif
                </div>

                <div class="mb-2">
                    <label>Description</label>
                    <textarea name="description[]" rows="3" class="form-control">{{ $sub->description }}</textarea>
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary w-100">💾 Update Blog</button>
    </form>

    <div class="text-center mt-4">
        <a href="{{ route('blog.all') }}" class="btn btn-outline-dark">📚 Back to All Blogs</a>
    </div>
</div>

</body>
</html>
