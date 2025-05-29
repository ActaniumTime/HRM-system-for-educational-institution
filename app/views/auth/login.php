<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
 
    <style>
        body {
            height: 100vh;
            background: linear-gradient(90deg,#e52e71,#ff8a00);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .slider-thumb::before {
            position: absolute;
            content: "";
            left: 35%;
            top: 23%;
            width: 550px;
            height: 550px;
            background:rgb(255, 255, 255);
            border-radius: 62% 47% 82% 35% / 45% 45% 80% 66%;
            will-change: border-radius, transform, opacity;
            animation: sliderShape 8s linear infinite;
            display: block;
            z-index: -1;
            -webkit-animation: sliderShape 8s linear infinite;
        }
         @keyframes sliderShape{
            0%,100%{
            border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%;
                transform: translate3d(0,0,0) rotateZ(0.01deg);
            }
            34%{
                border-radius: 70% 30% 46% 54% / 30% 29% 71% 70%;
                transform:  translate3d(0,5px,0) rotateZ(0.01deg);
            }
            50%{
                transform: translate3d(0,0,0) rotateZ(0.01deg);
            }
            67%{
                border-radius: 100% 60% 60% 100% / 100% 100% 60% 60% ;
                transform: translate3d(0,-3px,0) rotateZ(0.01deg);
            }
        }

        .card {
            background-color:rgba(255, 255, 255, 0);
            border: none;
            border-radius: 36px;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
        }

        .btn-primary {
            background-color: #ffc825;
            color: #303030;
            border: none;
            border-radius: 36px;
            padding: 12px 20px;
            font-weight: bold;
            transition: transform 0.3s, background-color 0.3s;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #303030;
            box-shadow: 0 4px 8pxrgba(48, 48, 48, 0.5);
            transform: translateY(-3px);
            transition: transform 0.3s, background-color 0.3s;
            color: white;
        }

        .form-label {
            font-weight: bold;
            color: #303030;
        }

        .text-danger {
            color: #e63946;
        }

        h2 {
            font-size: 1.8rem;
            font-weight: bold;
            color: #303030;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.6);
            border-radius: 36px;
            border: 1px solid rgba(48, 48, 48, 0.2);
            padding: 12px 16px;
            font-size: 14px;
            color: #303030;
            box-shadow: none;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #ffc825;
            outline: none;
        }

    </style>

</head>
<body>
    <div class="slider-thumb"></div>
    <div class="card">
        <h2>Вітаємо!</h2>
        <?php if (isset($error)): ?>
            <p class="text-danger text-center"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-4">
                <label for="email" class="form-label">Електрона пошта:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Пароль:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Увійти</button>
        </form>
    </div>
</body>
</html>