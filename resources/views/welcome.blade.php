<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Management</title>

    <!-- ✅ Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center my-4">📑 Blog Management</h2>

    <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('blog.create') }}" class="btn btn-success btn-lg">
            ➕ Create Blog
        </a>

        <a href="{{ route('blog.all') }}" class="btn btn-outline-primary btn-lg">
            📚 View All Blogs
        </a>
    </div>
</div>

</body>
</html>
