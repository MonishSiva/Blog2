<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- ✅ Mobile scaling -->
    <title>Create Blog</title>

    <!-- Bootstrap & jQuery CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<div class="container mt-5 mb-5">
    <h2 class="text-center text-primary mb-4">📝 Create Blog</h2>

    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="form-label fw-bold">Main Blog Title</label>
            <input type="text" class="form-control" name="title" placeholder="Enter main blog title" required>
        </div>

        <!-- Sub Blog Inputs -->
        <div id="subBlogWrapper">
            <div class="sub-blog border rounded p-3 mb-4">
                <h5 class="text-success">Sub Blog</h5>
                <input type="text" class="form-control mb-3" name="heading[]" placeholder="Enter Sub Heading" required>
                <input type="file" class="form-control mb-3" name="image[]">
                <textarea class="form-control mb-3" name="description[]" rows="3" placeholder="Enter Description"></textarea>
            </div>
        </div>

        <!-- Add More Sub-Blog -->
        <button type="button" class="btn btn-sm btn-outline-success mb-3" id="addSubBlog">+ Add Sub Blog</button>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary w-100">🚀 Submit Blog</button>

        <!-- Extra Buttons -->
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('blog.all') }}" class="btn btn-outline-dark btn-lg">📚 View All Blogs</a>
        </div>
    </form>
</div>

<!-- jQuery Clone Logic -->
<script>
    $('#addSubBlog').click(function () {
        let clone = $('.sub-blog').first().clone();
        console.log(clone);
        clone.find('input, textarea').val('');
        $('#subBlogWrapper').append(clone);
    });
</script>

</body>
</html>
