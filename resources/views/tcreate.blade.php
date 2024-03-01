<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <div class="card">
                <div class="card-header">
                    create
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tickets.cre') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="cost">slug</label>
                            <input type="number" class="form-control" id="cost" name="cost" required>
                        </div>
                        <div class="form-group">
                            <label for="body">body</label>
                            <input type="text" class="form-control" id="body" name="body" required>
                            <div class="form-group">
                                <label for="author_id">Author:</label>
                                <select class="form-control" id="author_id" name="author_id" required>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
