<html>
  <head>
    <title>Google recapcha demo - Codeforgeek</title>
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>
    <link rel="stylesheet" href="{{ asset('boostrap/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}">
    
  </head>
  <body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h4>Digitalizador de Documentos</h4><br>
            <h4>Login</h4>
            <form action="{{ route('auth.check') }}" method="post">
    
                @if(Session::get('fail'))
                <div class="alert alert-danger">
                   {{ Session::get('fail') }}
                </div>
                @endif
                @csrf
                <div class="form-group">
                    <label for="">Nombre de usuario</label>
                    <input type="text" class="form-control" name="email" placeholder="Ingrese usuario">
                    <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    <span class="">Nunca compartas tus contraseñas </span>
                </div>
                <div class="form-group">
                    <label for="">Contraseña</label>
                    <input type="text" class="form-control" name="password" placeholder="Ingrese password">
                    <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                </div>
    
                <button type="submit" class="btn btn-block btn-primary col-3">Acceder</button>
                <br>
                
                <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
            </form>
            <input type="file" name="image" accept="image/*" capture="environment">
            
        </div>
    </div>
      
    </form>
  </body>
</html>