<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="jumbotron vertical-center"> 
        <div class="container">

            <img src="{{ asset('assets/img/logo.png') }}">

            <div class="row">
                <div class="col-md-4">
                    <form method="POST" action="{{ route('create') }}">
                        @csrf
                        <div class="form-group">
                        <input type="text" class="form-control" id="task" name="task" placeholder="Insert task name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>

                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Task</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <th scope="row" style="width: 10%">{{ $task->id }}</th>
                                <td style="width: 100%">
                                    @if ($task->completed)
                                        <s>{{ $task->task }}</s>
                                    @else
                                        {{ $task->task }}
                                    @endif
                                </td>
                                <td style="width: 100%">
                                    <div style="display: inline-flex">
                                    @if (!$task->completed)
                                        <a class="btn btn-primary btn-success" href="{{ route('complete', $task->id) }}"><li class="fa fa-check"></li></a>
                                    @endif
                                    @if (!$task->deleted_at)
                                        <a class="btn btn-primary btn-danger" href="{{ route('delete', $task->id) }}"><li class="fa fa-times"></li></a>
                                    @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <p class="text-center copyright">Copyright &copy; 2020 All Rights Reserved.</p>

        </div>
    </div>

</body>
</html>
