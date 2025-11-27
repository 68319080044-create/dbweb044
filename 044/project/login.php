<!doctype html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --mint-50: #f2fffb;
            --mint-200: #c8fff0;
            --mint-300: #9cf5df;
            --mint-500: #2ecaa9;
            --mint-600: #24ae8f;
            --mint-700: #1b8b6c;
            --dark-text: #06321f;
        }

        body {
            background: linear-gradient(135deg, var(--mint-50), var(--mint-200) 40%, var(--mint-300));
            background-attachment: fixed;
            font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            min-height: 100vh;
            color: var(--dark-text);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.85));
            padding: 40px;
            border-radius: 14px;
            box-shadow: 0 8px 28px rgba(5, 40, 20, 0.12);
            backdrop-filter: blur(8px);
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            text-align: center;
            color: var(--mint-700);
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 25px;
        }

        .glow-line {
            width: 70%;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--mint-500), transparent);
            margin: 15px auto;
            border-radius: 2px;
            animation: pulse 2.2s infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 0.4;
            }

            50% {
                opacity: 1;
            }
        }

        label {
            color: var(--mint-700);
            font-weight: 500;
            font-size: 15px;
        }

        .form-control {
            background: #ffffff;
            border: 1px solid rgba(5, 40, 20, 0.1);
            border-radius: 8px;
            padding: 12px;
            font-size: 15px;
            transition: all 0.25s ease;
            color: var(--dark-text);
        }

        .form-control:focus {
            border-color: var(--mint-500);
            box-shadow: 0 0 10px rgba(46, 202, 169, 0.25);
            outline: none;
        }

        .btn-primary {
            background: linear-gradient(90deg, #54e6c6, #2ecaa9);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            color: #fff;
            transition: all 0.3s ease;
            box-shadow: 0 8px 18px rgba(46, 202, 169, 0.25);
            margin-top: 15px;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #2ecaa9, #24ae8f);
            box-shadow: 0 0 15px rgba(46, 202, 169, 0.4);
            transform: translateY(-2px);
        }

        .form-text {
            text-align: center;
            margin-top: 10px;
            font-size: 0.9rem;
            color: #206653;
        }

        a {
            color: var(--mint-600);
            text-decoration: none;
        }

        a:hover {
            color: var(--mint-700);
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2 class="login-header">Login</h2>
        <div class="glow-line"></div>

        <form action="check_login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input name="username" type="text" class="form-control" id="username" placeholder="Enter username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Enter password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>

        <p class="form-text">Don't have an account? <a href="register_form.php">Register here</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>