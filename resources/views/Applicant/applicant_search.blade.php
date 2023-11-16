<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Search Applicant</title>
</head>

<body>

    <div class="container">
        <br>
        <form id="nic_form" action="/get_applicant" method="POST">
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="nic" class="col-form-label">NIC</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="nic" class="form-control" name="nic">
                </div>
                <div class="col-auto">
                    <!-- <span id="passwordHelpInline" class="form-text">
                    Must be 8-20 characters long.
                </span> -->
                    <button id="nic_submit" class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
        <br>
        <p id="message"></p>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script type="text/javascript">
        $(document).ready(function() {
            $("#nic_form").on('submit', function(e){
                e.preventDefault();

                let form_data = $(this).serializeArray();
                let form_action = $(this).prop('action');

                $.ajax({
                    url: form_action,
                    data: form_data,
                    method: "POST",
                    dataType: "json",
                    error: function (e){
                        console.log("error");
                    },
                    success: function (r){
                        $('#message').empty();
                        $('#message').append(r.nic);
                    }
                });
            });
        });
    </script>
</body>

</html>