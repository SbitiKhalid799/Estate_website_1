<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel='stylesheet'>
    <link href="{{ asset('css/Signup.css') }}" rel='stylesheet'>
    <title>Signup Page</title>
</head>

<body>

    <!----------------------- Main Container -------------------------->
    <main class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">

        <!--------------------------- Left Box ----------------------------->
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"></div>

                <!-------------------- ------ Right Box ---------------------------->
                <div class="col-md-6 right-box d-flex align-items-center justify-content-center">
                    <form method="POST" action="{{route('User.store')}}" class="d-flex flex-column align-items-center justify-content-center">
                        @csrf
                        <h1 class="titleForm">Sign up</h1>
                        <div>
                            <label for="">Username</label>
                            <br>
                            <input type="text" name='name' class="form-control border-dark">
                        </div>
                        <div>
                            <label for="">Email</label>
                            <br>
                            <input type="email" name="email" class="form-control border-dark">
                        </div>
                        <div>
                            <label for="">Password</label>
                            <br>
                            <input name="password" type="text" class="form-control border-dark">
                        </div>
                        <div>
                            <label for=""> Password Confirmation </label>
                            <br>
                            <input type="password" name='password_Confirmation' class="form-control border-dark">
                        </div>
                        <div  class="d-flex flex-column align-items-center justify-content-center hover-zoom">
                            <button type="submit" class="bg-dark text-light mt-2 pb-1 pt-1" >Sign up</button>
                        </div>
                        <div class="row">
                            <small> Return to <a href="{{ route("login") }}">Login</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
