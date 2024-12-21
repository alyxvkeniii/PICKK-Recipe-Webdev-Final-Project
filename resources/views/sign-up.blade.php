
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up for PICKK Recipes</title>
    <link rel="stylesheet" href="/assets/css/signup.css">
</head>
<body>

    <!-- HEADER -->
        <header>

            <div class="logo">
                <a href="/">
                    <img src="/assets/images/logo.png" alt="Logo">
                </a>
            </div>
 
            <nav>
                <ul>
                    <li><a href="{{ route('faq') }}" class="button"><b>FAQ</b></a></li>
                </ul>
            </nav>

        </header>
    <!-- END OF HEADER -->
    
    <div class="main-wrapper">

    <div class="header-text">
        <h1>JOIN PICKK THE OFFICIAL RECIPE PLATFORM</h1>
        <p>Sign up for free to explore a world of tried-and-true recipes</p>
    </div>

    <div class="container">
         <!-- Sign Up Form -->
        <h2>Sign Up for PICKK Recipes</h2>

        <form method="POST" action="{{ route('sign-up') }}">
            @csrf

            <!-- userame Input -->
            <div class="form-group">
                <label for="userame">Username</label>
                <input type="text" id="username" name="username" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Your Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="form-group">
                <label for="password">Create a Password</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password Input -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <!-- Checkbox Aggreement -->
                <div class="aggreement">
                    <label>
                        <input type="checkbox" id="accept" name="accept">
                        I have read and I accept the 
                        <a href="/terms" target="_blank">Terms and Conditions</a> and 
                        <a href="/privacy" target="_blank">Privacy Policy</a>.
                    </label>
                </div>
            <label>

            <!-- Submit Button -->
            <button type="submit" class="btn">Sign Up</button>
            <div class="dont">
                <p>Already have an account? <a href="{{ route('login') }}" class="button"><b>Login</b></a></p>
            </div>
        </form>
    </div>
    </div>
</body>
</html>
