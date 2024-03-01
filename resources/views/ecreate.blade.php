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
                    <form method="POST" action="{{ route('events.cre') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="slug">slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" required>
                        </div>
                            <label for="date">Date:</label>
                            <input type="date" class="form-control" id="date" name="date" required>

                            <div class="form-group">
                                @foreach($users as $user)
                                <input type="hidden" class="form-control" id="author_id" name="author_id" value="{{ $user->id }}">
                            </div>
                            @endforeach
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
