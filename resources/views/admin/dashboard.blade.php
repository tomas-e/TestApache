<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('boostrap/bootstrap-4.3.1-dist/css/bootstrap.min.css') }}">
    
</head>
<body>
    <div class="container">
        <div class="row">
            <h4>Dashboard</h4><hr>
            <table class="table table-hover">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $LoggedUserInfo['name'] }}</td>
                        <td>{{ $LoggedUserInfo['email'] }}</td>
                        <td><a href="{{ route('auth.logout') }}">Logout</a></td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</body>
</html>