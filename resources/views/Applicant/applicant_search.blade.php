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
                    <button id="nic_submit" class="btn btn-primary" type="submit">Search</button>
                    <button id="nic_reset" class="btn btn-secondary" type="reset">Clear</button>
                </div>
            </div>
        </form>
        <br>

        <p id="message" style="color: red;"></p>

        <table id="applicationTable" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Application Id</th>
                    <th scope="col">NIC</th>
                    <th scope="col">Name</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Documents</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
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
            $("#nic_form").on('submit', function(e) {
                e.preventDefault();

                let form_data = $(this).serializeArray();
                let form_action = $(this).prop('action');

                $.ajax({
                    url: form_action,
                    data: form_data,
                    method: "POST",
                    dataType: "json",
                    error: function(e) {
                        console.log("error");
                    },
                    success: function(r) {
                        $('#message').empty();
                        $('#applicationTable tbody').empty();

                        if (r.applications[0] == null) {
                            $('#message').append("No records were found!");
                        } else {

                            var responseData = r;

                            // Function to populate the table
                            function populateTable(data) {
                                var tableBody = $('#applicationTable tbody');

                                // Clear existing rows
                                tableBody.empty();

                                // Loop through each application in the response
                                $.each(data.applications, function(index, application) {
                                    // Split the path string into an array of paths
                                    var paths = application.path.split(',');

                                    var originalNames = application.original_name.split(',');

                                    // Create a row for each application
                                    var row = '<tr>' +
                                        '<td>' + application.id + '</td>' +
                                        '<td>' + application.nic + '</td>' +
                                        '<td>' + application.full_name + '</td>' +
                                        '<td>' + /* Add disease information here */ +'</td>' +
                                        '<td>';

                                    // Add links for each document path
                                    $.each(paths, function(index, path) {
                                        row += '<a href="' + path + '" class="pdf-link" data-value"' + path + '" target="_blank">' + originalNames[index] + '</a><br>';
                                    });

                                    row += '</td>' +
                                        '<td><button class="btn btn-primary">Add Documents</button></td>' +
                                        '</tr>';

                                    // Append the row to the table body
                                    tableBody.append(row);
                                });
                            }
                            // Call the function to populate the table with the provided data
                            populateTable(responseData);
                        }
                    }
                });
            });

            //Clear the paragraph tag and the table body when click the reset button
            $('#nic_reset').on('click', function(e) {
                $('#message').empty();
                $('#applicationTable tbody').empty();
            });

            $(document).on('click', '.pdf-link', function(e) {
                e.preventDefault();

                var link = $(this).attr('href');

                $.ajax({
                    url: '/stream_document',
                    data: {
                        'data': link
                    },
                    error: function(e) {
                        console.log("error");
                    },
                    success: function(r) {
                        console.log(r)
                    }
                });
            });
        });
    </script>
</body>

</html>