<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('boostrap/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}">
    
</head>
<body>
    
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4">
        <h4>Login</h4>
        <form action="{{ route('auth.check') }}" method="post">

            @if(Session::get('fail'))
            <div class="alert alert-danger">
               {{ Session::get('fail') }}
            </div>
            @endif
            @csrf
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Enter email">
                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" class="form-control" name="password" placeholder="Enter password">
                <span class="text-danger">@error('password'){{ $message }} @enderror</span>
            </div>

            <button type="submit" class="btn btn-block btn-primary"> Sign In</button>
            <br>
            <a href="{{ route('auth.register') }}" >I don't have an account</a>
        </form>
            
        
    </div>
</div>
    
</body>
</html>