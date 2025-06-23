<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center text-success">📚 All Blog Categories</h2>

    <div class="row gy-4">
        @forelse($mainBlogs as $main)
            @php
                $firstSub = $main->subBlogs->first();
            @endphp

            <div class="col-12 col-md-4">
                <div class="card shadow h-100">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title text-primary">{{ $main->title }}</h4>

                        @if($firstSub && $firstSub->image)
                            <img src="{{ asset('storage/' . $firstSub->image) }}"
                                 class="img-fluid mb-2 rounded"
                                 style="height: 200px; object-fit: cover; width: 100%;">
                        @endif

                        @if($firstSub)
                            <h6 class="text-muted">{{ $firstSub->heading }}</h6>
                            <p class="flex-grow-1">{{ Str::limit($firstSub->description, 80) }}</p>
                        @endif

                        <a href="{{ route('blog.show', $main->id) }}"
                           class="btn btn-outline-primary w-100 mt-2">
                            📖 View Full Blogs
                        </a>

                        <div class="d-flex justify-content-between mt-2">
                            <a href="{{ route('blog.edit', $main->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                            <form action="{{ route('blog.delete', $main->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑 Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">No blogs found 😥</p>
        @endforelse
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('blog.create') }}" class="btn btn-success btn-lg">
            ➕ Add New Blog
        </a>
    </div>
</div>
</body>
</html>