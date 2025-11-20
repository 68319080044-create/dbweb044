<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        :root {
            --mint-50: #f2fffb;
            --mint-200: #c8fff0;
            --mint-300: #9cf5df;
            --mint-500: #2ecaa9;
            --mint-600: #24ae8f;
            --mint-700: #1b8b6c;
            --dark-text: #06321f;
            --card-bg-glass: rgba(255, 255, 255, 0.9);
            --card-radius: 12px;
        }

        body {
            background: linear-gradient(135deg, var(--mint-50), var(--mint-200) 40%, var(--mint-300));
            color: var(--dark-text);
            font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-form {
            background: linear-gradient(180deg, var(--card-bg-glass), rgba(255, 255, 255, 0.82));
            max-width: 760px;
            width: 90%;
            padding: 40px;
            border-radius: var(--card-radius);
            box-shadow: 0 8px 30px rgba(5, 40, 20, 0.12);
            backdrop-filter: blur(6px);
        }

        .register-form h2 {
            color: var(--mint-700);
            font-size: 24px;
            margin-bottom: 30px;
            text-align: left;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px 40px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 0;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #174936;
            font-weight: 500;
            font-size: 15px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="tel"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid rgba(5, 40, 20, 0.08);
            border-radius: 8px;
            background: #ffffff;
            color: var(--dark-text);
            font-size: 15px;
            transition: all 0.2s ease;
            box-sizing: border-box;
        }

        input::placeholder {
            color: #88988f;
        }

        input:focus {
            border-color: var(--mint-500);
            box-shadow: 0 0 10px rgba(46, 202, 169, 0.15);
            outline: none;
        }

        .form-text {
            margin-top: 10px;
            font-size: 0.9rem;
            color: #206653;
        }

        a {
            color: var(--mint-600);
            text-decoration: none;
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background: linear-gradient(90deg, #54e6c6, #2ecaa9);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 18px rgba(46, 202, 169, 0.25);
            margin-top: 30px;
        }

        .btn-submit:hover {
            background: linear-gradient(90deg, #2ecaa9, #24ae8f);
            box-shadow: 0 0 15px rgba(46, 202, 169, 0.4);
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .register-form {
                padding: 30px;
            }

            .form-group.full-width {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>
    <form class="register-form" method="POST" action="register_save.php">
        <h2>Registration</h2>

        <div class="form-grid">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" placeholder="Enter your name" required autocomplete="name">
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required autocomplete="username">
            </div>

            <div class="form-group full-width">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required autocomplete="email">
            </div>

            <div class="form-group full-width">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your number" required autocomplete="tel">
            </div>

            <div class="form-group full-width">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required autocomplete="new-password">
            </div>

            <div class="form-group full-width">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required autocomplete="new-password">
            </div>
        </div>

        <button type="submit" class="btn-submit">Register</button>

        <p class="form-text">Already have an account? <a href="login.php">Login here</a></p>
    </form>
</body>

</html>