<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Mobile Scaling -->
    <title>{{ $main->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-primary text-center mb-4">{{ $main->title }}</h2>

    @foreach($main->subBlogs as $sub)
        <div class="card mb-4 shadow-sm">
            <div class="row g-0 flex-column flex-md-row">
                <!-- 👇 Image Column -->
                <div class="col-md-4">
                    @if($sub->image)
                        <img src="{{ asset('storage/' . $sub->image) }}" 
                             class="img-fluid rounded-start w-100" 
                             style="max-height: 250px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/300x200" 
                             class="img-fluid rounded-start w-100" 
                             alt="No Image">
                    @endif
                </div>

                <!-- 👇 Text Column -->
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $sub->heading }}</h5>
                        <p class="card-text">{{ $sub->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="text-center">
        <a href="{{ route('blog.create') }}" class="btn btn-secondary">⬅ Back to Add New Blog</a>
    </div>

    <div class="d-flex justify-content-center gap-3 mt-4">
        <a href="{{ route('blog.all') }}" class="btn btn-outline-primary btn-lg">
            📚 View All Blogs
        </a>
    </div>
</div>

</body>
</html>
