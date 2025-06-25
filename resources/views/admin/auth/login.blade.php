<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - AdminLTE 3</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <!-- AdminLTE Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
  
  <style>
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .login-box {
      width: 400px;
      margin: 0;
    }
    
    .card {
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
      border: none;
      border-radius: 15px;
      overflow: hidden;
    }
    
    .card-header {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      text-align: center;
      padding: 30px 20px;
      border: none;
    }
    
    .card-header h3 {
      margin: 0;
      font-size: 24px;
      font-weight: 300;
    }
    
    .card-body {
      padding: 40px 30px;
    }
    
    .form-control {
      border-radius: 25px;
      padding: 12px 20px;
      border: 2px solid #e9ecef;
      transition: all 0.3s ease;
    }
    
    .form-control:focus {
      border-color: #667eea;
      box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }
    
    .btn-primary {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border: none;
      border-radius: 25px;
      padding: 12px 30px;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }
    
    .btn-outline-secondary {
      border-radius: 25px;
      padding: 12px 30px;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    
    .btn-outline-secondary:hover {
      transform: translateY(-2px);
    }
    
    .form-check-input:checked {
      background-color: #667eea;
      border-color: #667eea;
    }
    
    .form-group {
      margin-bottom: 25px;
    }
    
    .login-logo {
      text-align: center;
      margin-bottom: 30px;
    }
    
    .login-logo i {
      font-size: 48px;
      color: white;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <div class="login-logo">
      <i class="fas fa-user-shield"></i>
    </div>
    
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Welcome Back</h3>
        <p class="mb-0" style="font-size: 14px; opacity: 0.9;">Please sign in to your account</p>
      </div>
      
      <div class="card-body">

        @if (session('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        <form action="{{ route('login-verify') }}" method="post">
            @csrf

            
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" style="border-radius: 25px 0 0 25px; border-right: none; background: transparent;">
                  <i class="fas fa-envelope" style="color: #667eea;"></i>
                </span>
              </div>
              <input type="email" name="email" class="form-control" placeholder="Email Address" required style="border-left: none; border-radius: 0 25px 25px 0;">
            </div>
          </div>
          @if ($errors->has('email'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" style="border-radius: 25px 0 0 25px; border-right: none; background: transparent;">
                  <i class="fas fa-lock" style="color: #667eea;"></i>
                </span>
              </div>
              <input type="password" name="password" class="form-control" placeholder="Password" required style="border-left: none; border-radius: 0 25px 25px 0;">
            </div>
          </div>
          @if ($errors->has('password'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>          
          </span>
          @endif
          
          <div class="form-group">
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="remember">
              <label class="form-check-label" for="remember">
                Remember me
              </label>
            </div>
          </div>
          
          <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-block">
              <i class="fas fa-sign-in-alt mr-2"></i>Sign In
            </button>
          </div>
          
          <div class="text-center mt-4">
            <a href="#" style="color: #667eea; text-decoration: none;">
              <i class="fas fa-key mr-1"></i>Forgot Password?
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js"></script>
</body>
</html>