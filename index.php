<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">
                        <img src="img/download.png"
                          style="width: 100px; margin-left: -150px;" alt="logo">
                        <h4 class="mt-1 mb-5 pb-1" ></h4>
                      </div>
      
                      <form>
                        <h5 style="text-align: center;">LOGIN</h5>
      
                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example11">CNIC</label>
                          <input type="number" id="number" class="form-control"
                           placeholder= "CNIC"/>
                          
                        </div>
      
                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example22">Password</label>
                          <input type="password" id="form2Example22" class="form-control"
                          placeholder="Password" />
                          <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                              <label class="form-check-label" for="form2Example3">
                                Remember me
                              </label>
                            </div>
                            <a href="#!" class="text-body">Forgot password?</a>
                          </div>

                        </div>
             
      
                        <div class="text-center pt-1 mb-5 pb-1">
                          <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">Log
                            in</button>
                        
                        </div>
      
                       
      
                      </form>
      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center IMG-1">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                      <h2 class="mb-4">Welcome to RAAS <br> Insitute of Emerging <br>Technology</h2>
                      <p class="small mb-0 mt-4s">For Password quarieties  contant constranst <br> Admission Deperement.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>






      <?php




include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Login successful!";
            // Set a session or token for authentication
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}

$conn->close();






?>
      
    



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>