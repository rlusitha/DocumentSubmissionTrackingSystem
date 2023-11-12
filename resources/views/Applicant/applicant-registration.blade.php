<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Registration</title>
</head>

<body>
    <div class="container">
        <h1 class="display-4">Applicant Registration Form</h1>
        <br>
        <form method="post" action="{{ route('applicants.store') }}"  class="row g-3">
            @csrf
            <div class="col-md-12">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name">
            </div>
            <div class="col-md-12">
                <label for="nic" class="form-label">National Identity Card Number</label>
                <input type="text" class="form-control" id="nic" name="nic">
            </div>
            <div class="col-md-12">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob">
            </div>
            <div class="col-md-12">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
        <br>
        <footer>
            <p><i>&copy; Lusitha Ranathunga</i>
                <a href="#">rlusitha@gmail.com</a>
            </p>
        </footer>
    </div>
</body>

</html>