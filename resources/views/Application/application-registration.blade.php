<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Registration</title>
</head>

<body>
    <div class="container">
        <h1 class="display-4">Application Registration Form</h1>
        <br>
        <form method="post" action="/registerApplication" class="row g-3" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12">
                <label for="applicant_name" class="form-label">Applicant Name</label>
                <input type="text" class="form-control" id="applicant_name" name="applicant_name">
            </div>
            <div class="col-md-12">
                <label for="applicant_nic" class="form-label">Applicant NIC</label>
                <input type="text" class="form-control" id="applicant_nic" name="applicant_nic">
            </div>
            <div class="col-md-12">
                <label for="application_date" class="form-label">Application Date</label>
                <input type="date" class="form-control" id="application_date" name="application_date">
            </div>
            <div class="col-md-12">
                <label for="disease_type" class="form-label">Disease Type</label>
                <select id="disease_type" class="form-select" name="disease_type">
                    <option selected>Choose Disease</option>
                    <option value="HIV">HIV</option>
                    <option value="Corona">Corona</option>
                    <option value="Dengue">Dengue</option>
                    <option value="Stomach_Ache">Stomach Ache</option>
                </select>
            </div>
            <div class="col-md-12">
                <label for="documents" class="form-label">Upload Documents</label>
                <input type="file" class="form-control" id="documents" name="documents[]" onchange="displayFileName()" multiple>
            </div>
            <p id="file-name-display" style="color: red;">No files chosen</p>
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
    <script>
        function displayFileName() {
            // Get the input element
            var fileInput = document.getElementById('documents');

            // Get the display element
            var fileNamesDisplay = document.getElementById('file-name-display');

            // Clear existing content
            fileNamesDisplay.innerHTML = '';

            // Display the chosen file names with their extensions
            if (fileInput.files.length > 0) {
                Array.from(fileInput.files).forEach(function(documents) {
                    var fileNameParagraph = document.createElement('p');
                    fileNameParagraph.textContent = documents.name;
                    fileNamesDisplay.appendChild(fileNameParagraph);
                });
            } else {
                var noFilesParagraph = document.createElement('p');
                noFilesParagraph.textContent = 'No files chosen';
                fileNamesDisplay.appendChild(noFilesParagraph);
            }
        }
    </script>
</body>

</html>