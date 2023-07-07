@if (session('delete'))
    <div class="alert alert-danger">
        {{ session('delete') }}
    </div>
@endif

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>


    <table class="table table-dark">
        <thead align="left" style="display: table-header-group">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">phone</th>
                <th scope="col">Address</th>
                <th scope="col">Image</th>

                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($contacts as $key => $value)
                <tr class="item_row">
                    <td> {{ $value->name }} </td>
                    <td>{{ $value->email }} </td>
                    <td> {{ $value->phone }} </td>
                    <td>{{ $value->address }} </td>

                    <td><img src="<?php echo url('images/' . $value->image); ?>" width="30"></td>

                    <td><a href='/delete/{{ $value->id}}'><button>Delete</button> </a>
                        <a href='/edit/{{$value->id}}'><button>Edit</button> </a>

                    </td>

                </tr>
            @endforeach
        </tbody>


    </table>

</body>

</html>
