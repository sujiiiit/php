<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <form id="form" method="post" class="form" action="data.php">
        <div class="input-field">
            <label for="fullname" class="label">
                <input autocomplete="off" name="fullname" id="fullname" type="text" placeholder=" " />
                <span class="placeholder fullnameplaceholder">Full Name *</span>
            </label>

            <label for="email" class="label">
                <input autocomplete="off" name="email" id="email" type="email" placeholder=" " />
                <span class="placeholder emailplaceholder">Email *</span>
            </label>
            <label for="city" class="label">
                <input autocomplete="off" name="city" id="city" type="text" placeholder=" " />
                <span class="placeholder cityplaceholder">Select City *</span>
                <span class="arrow arrow-down"></span>
            </label>
            <div class="select-wrapper">
                <div class="scrollable">
                    <ul class="city-list">

                    </ul>

                </div>
            </div>

        </div>
        <div class="radio-buttons">
            <div class="radioinputs">
                <div class="form-group">
                    <input value="Male" type="radio" id="male" name="gender" checked />
                    <label for="male">Male</label>
                </div>

                <div class="form-group">
                    <input value="Female" type="radio" id="female" name="gender" />
                    <label for="female">Female</label>
                </div>
            </div>
            <span class="radio-placeholder">Gender</span>

        </div>
        </div>


        <button class="btn signbtn" type="submit">Submit</button>
    </form>
    <script>
        document.getElementById("fullname").focus();

        document.addEventListener("DOMContentLoaded", function() {
            var form = document.getElementById("form");

            form.addEventListener("submit", function(e) {
                e.preventDefault();

                var fullname = document.getElementById("fullname").value;
                var email = document.getElementById("email");
                var formInputs = document.querySelectorAll("#form input");
                let emailPlaceholder = document.querySelector(".emailplaceholder");

                var empty = false;

                formInputs.forEach(function(input) {
                    input.addEventListener("keyup", function() {
                        this.classList.remove("error");
                    });
                    if (!input.value) {
                        input.classList.add("error");
                        empty = true;
                        input.focus();
                        return false;
                    } else {
                        input.classList.remove("error");
                    }
                });
                email.addEventListener("invalid", function() {
                    this.classList.add("error");
                    emailPlaceholder.textContent = "Invalid Email";
                });
                email.addEventListener("keyup", function() {
                    emailPlaceholder.textContent = "Email *";
                });
               

                if (empty) {
                    return;
                }

                var formData = new FormData(form);

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "submit.php", true);

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = xhr.responseText;
                        if (response === "email-error") {
                            email.classList.add("error");
                            document.querySelector(".emailplaceholder").textContent = "Email Already Exist";
                            email.focus();
                        } else {
                            console.log(response);
                        }
                    }
                };

                xhr.send(formData);
            });
        });
    </script>
    <script src="assets/js/main.js"></script>
</body>

</html>