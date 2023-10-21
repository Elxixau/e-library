
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @include('includes.link')

</head>
<body>
  <section>
  
  <div class="container-fluid h-100 ">
    <a href="/" class="btn btn-secondary mt-2">
      <i class="fa fa-arrow-left"></i> Kembali
    </a>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="{{asset('images/KKN-PLP.png')}}"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      @include('includes.notification')
      <form   method="POST" action="{{ url('/login/authentication')}}">
        @csrf
        
         <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal  me-3">Log In</p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="text" name="username" id="form3Example3" class="form-control form-control-lg"
              placeholder="Username" required/>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" name="password" id="password" class="form-control form-control-lg"
              placeholder="Password" data_toggle="password" required/>
              <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" onclick="showPassword()">
                <label class="form-check-label" for="showPassword">Show Password</label>
            </div>
          </div>

          

          <div class="text-center text-lg-start mt-4 mb-2 pt-2">
            <button type="submit" class="btn btn-secondary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
          </div>

          <p class="justify-content-center align-items-center p-2 mt-4 fs-2">&copy; 2023 KKN-PLP_UNMUL_49_SMPN_2. All rights reserved.</p>

        </form>
      </div>
    </div>
  </div>

  <script>
      function showPassword() {
        var passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
  </script>

                
  

                            
                     
               
            
            



  @include('includes.script')
</body>
</html>