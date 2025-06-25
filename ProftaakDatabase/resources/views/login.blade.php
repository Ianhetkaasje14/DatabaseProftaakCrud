<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KrasHosting Admin</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <header>
        <a id="header-logo" href="{{ route('home.show') }}">
            <img src="{{ asset('img/logo.svg') }}" alt="KrasHosting Logo">
        </a>
        <div id="links-wrapper">
            <a class="link" href="{{ route('home.show') }}">Home</a>
            <a class="link" href="{{ route('over.show') }}">Over</a>
            <a class="link" href="{{ route('producten.show') }}">Producten</a>
            <a class="link" href="{{ route('contact.show') }}">Contact</a>
            <div id="icon-wrapper">
                <a class="icon" id="account" href="{{ route('login.show') }}">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 12C10.35 12 8.9375 11.4125 7.7625 10.2375C6.5875 9.0625 6 7.65 6 6C6 4.35 6.5875 2.9375 7.7625 1.7625C8.9375 0.5875 10.35 0 12 0C13.65 0 15.0625 0.5875 16.2375 1.7625C17.4125 2.9375 18 4.35 18 6C18 7.65 17.4125 9.0625 16.2375 10.2375C15.0625 11.4125 13.65 12 12 12ZM0 24V19.8C0 18.95 0.21875 18.1688 0.65625 17.4563C1.09375 16.7438 1.675 16.2 2.4 15.825C3.95 15.05 5.525 14.4688 7.125 14.0813C8.725 13.6938 10.35 13.5 12 13.5C13.65 13.5 15.275 13.6938 16.875 14.0813C18.475 14.4688 20.05 15.05 21.6 15.825C22.325 16.2 22.9062 16.7438 23.3438 17.4563C23.7813 18.1688 24 18.95 24 19.8V24H0ZM3 21H21V19.8C21 19.525 20.9313 19.275 20.7938 19.05C20.6562 18.825 20.475 18.65 20.25 18.525C18.9 17.85 17.5375 17.3438 16.1625 17.0063C14.7875 16.6688 13.4 16.5 12 16.5C10.6 16.5 9.2125 16.6688 7.8375 17.0063C6.4625 17.3438 5.1 17.85 3.75 18.525C3.525 18.65 3.34375 18.825 3.20625 19.05C3.06875 19.275 3 19.525 3 19.8V21ZM12 9C12.825 9 13.5313 8.70625 14.1188 8.11875C14.7063 7.53125 15 6.825 15 6C15 5.175 14.7063 4.46875 14.1188 3.88125C13.5313 3.29375 12.825 3 12 3C11.175 3 10.4688 3.29375 9.88125 3.88125C9.29375 4.46875 9 5.175 9 6C9 6.825 9.29375 7.53125 9.88125 8.11875C10.4688 8.70625 11.175 9 12 9Z"
                            fill="white" />
                    </svg>
                </a>
                <a class="icon" id="search" href="#">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M22.1333 24L13.7333 15.6C13.0667 16.1333 12.3 16.5556 11.4333 16.8667C10.5667 17.1778 9.64445 17.3333 8.66667 17.3333C6.24444 17.3333 4.19444 16.4944 2.51667 14.8167C0.838889 13.1389 0 11.0889 0 8.66667C0 6.24444 0.838889 4.19444 2.51667 2.51667C4.19444 0.838889 6.24444 0 8.66667 0C11.0889 0 13.1389 0.838889 14.8167 2.51667C16.4944 4.19444 17.3333 6.24444 17.3333 8.66667C17.3333 9.64445 17.1778 10.5667 16.8667 11.4333C16.5556 12.3 16.1333 13.0667 15.6 13.7333L24 22.1333L22.1333 24ZM8.66667 14.6667C10.3333 14.6667 11.75 14.0833 12.9167 12.9167C14.0833 11.75 14.6667 10.3333 14.6667 8.66667C14.6667 7 14.0833 5.58333 12.9167 4.41667C11.75 3.25 10.3333 2.66667 8.66667 2.66667C7 2.66667 5.58333 3.25 4.41667 4.41667C3.25 5.58333 2.66667 7 2.66667 8.66667C2.66667 10.3333 3.25 11.75 4.41667 12.9167C5.58333 14.0833 7 14.6667 8.66667 14.6667Z"
                            fill="white" />
                    </svg>
                </a>
            </div>
        </div>
    </header>
    <div class="content" id="loginContent">
        <h1>Inloggen</h1>

        @if ($errors->any())
            <div id="errorMessage" class="message error">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        @if (session('success'))
            <div class="message success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.authenticate') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="login-button">Log in</button>
        </form>

        <div id="credentialsInfo" class="message"
            style="background-color: #e2e3e5; color: #383d41; border: 1px solid #d6d8db;">
            <strong>Gebruik voor demonstratie:</strong><br>
            Email: admin@admin.nl<br>
            Wachtwoord: welkom123
        </div>
    </div>
    <img class="img" src="{{ asset('img/paars.png') }}" alt="decoration">

    <footer>
        <div>
            <img src="{{ asset('img/logo.svg') }}" alt="KrasHosting Logo">
            <div id="logo-box">
                <p>KRAS
                <p class="red">HOSTING</p>
                </p>
            </div>
        </div>
        <div class="contact-info">
            <p>Neem contact op:</p>
            <a href="tel:+31612345678">+31 6 12345678</a>
            <a href="mailto:info@krashosting.nl">info@krashosting.nl</a>
            <p>Adres: Kasteeldreef 122, 5046 CV Tilburg</p>
        </div>
    </footer>
</body>

</html>