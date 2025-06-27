<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inventory System</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />

    <style>
        body, html {
            height: 100%;
            margin: 0;
            background: #f5f7fa;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #222;
            overflow-x: hidden;
        }

        .welcome-wrapper {
            text-align: center;
            max-width: 400px;
            animation: fadeInUp 1s ease forwards;
            opacity: 0;
        }

        h1 {
            font-weight: 700;
            margin-bottom: 0.5rem;
            font-size: 2.5rem;
        }

        p.subtitle {
            color: #555;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .btn-custom {
            width: 120px;
            border-radius: 30px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn-login {
            background-color: #4a90e2;
            color: white;
            border: none;
            margin-right: 15px;
        }
        .btn-login:hover {
            background-color: #357ABD;
            color: white;
        }

        .btn-register {
            background-color: transparent;
            border: 2px solid #4a90e2;
            color: #4a90e2;
        }
        .btn-register:hover {
            background-color: #4a90e2;
            color: white;
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .icon {
            width: 80px;
            margin: 0 auto 25px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>
<body>

<div class="welcome-wrapper">
    <img
        src="https://cdn-icons-png.flaticon.com/512/263/263142.png"
        alt="Inventory Icon"
        class="icon"
    />
    <h1>Inventory System</h1>
    <p class="subtitle">Your Inventory Management Made Simple</p>
    <div>
        <a href="/login" class="btn btn-login btn-custom">Log In</a>
        <a href="/register" class="btn btn-register btn-custom">Register</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
