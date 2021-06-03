@include('layouts.head')

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1>Login Form</h1>

                        <div>
                            <input id="name" type="text" class="form-control"
                                name="name" value="{{ old('name') }}" required autofocus placeholder="Usuario">
                        </div>
                        <div>
                            <input id="password" type="password"
                                class="form-control" name="password" required
                                autocomplete="current-password" placeholder="Contraseña">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default">
                                {{ __('Login') }}
                            </button>
                        </div>
                        @if ($errors->any())
                        <div class="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and
                                    Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
