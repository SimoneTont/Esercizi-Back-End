<!-- resources/views/books/create.blade.php -->

<form method="POST" action="{{ route('books.store') }}">
    @csrf

    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>

    <label for="author">Author:</label>
    <input type="text" id="author" name="author" required>

    <label for="image_link">Image Link:</label>
    <input type="text" id="image_link" name="image_link">

    <button type="submit">Add Book</button>
</form>
