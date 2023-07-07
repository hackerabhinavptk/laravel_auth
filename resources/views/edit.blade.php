<?php
//  dd($details['image']);
?>

<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>

    @if ($errors->any())

        <div class="alert alert-danger">

            @foreach ($errors->all() as $key => $value)
                <p class="text-align-center">{{ $value }}</p>
            @endforeach
        </div>

    @endif
    <div class="jumbotron container">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">Add Contacts</h3>
            </div>
            <div class="panel-body">

                <form action="/edit" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" name='name' value="{{ $details['name'] }}" class="form-control"
                            id="exampleInputPassword1" placeholder="name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">email</label>
                        <input type="text" class="form-control" value="{{ $details['email'] }}" name="email"
                            id="exampleInputPassword1" placeholder="email">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone</label>
                        <input type="text" class="form-control" value="{{ $details['phone'] }}" name="phone"
                            id="exampleInputPassword1" placeholder="phone">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Address</label>
                        <input type="text" class="form-control" value="{{ $details['address'] }}" name="address"
                            id="exampleInputPassword1" placeholder="address">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Image <img src="<?php echo url('images/' . $details['image']); ?>" style="width:100px;height:50px"/></label>
                        <input type="file" class="form-control" value="<?php echo $details['image']; ?> " name="image"
                            id="exampleInputPassword1" placeholder="image">
                    </div>

                    <input type="hidden" value="{{ $details['image'] }}" name="image_val">

                    <input type="hidden" value="{{ csrf_token() }}" name="_token">

                    <input type="hidden" value="{{ $details['id'] }}" name="id">

                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>


            </div>
        </div>


    </div>


</body>

</html>
