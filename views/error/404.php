<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oops! Lost in Digital Space</title>
    <link rel="stylesheet" href="../assets/css/output.css">
    <link rel="stylesheet" href="../assets/css/input.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
            --bg-color: #0f1923;
            --primary-color: rgba(31, 73, 146, 0.8);
            --secondary-color: #ff3b3b;
            --text-color: #f7fff7;
        }

        body {
            margin: 0;
            overflow: hidden;
            min-height: 100vh;
            padding-top: 2rem;
            background-color: var(--bg-color);
            background-size: cover;
            background-position: center;
        }

        #bgCanvas {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .error-container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            color: var(--text-color);
            z-index: 10;
        }

        .error-code {
            font-size: 20vw;
            font-weight: bold;
            color: var(--primary-color);
            animation: glitch 3s infinite;
            position: relative;
            z-index: 2;
        }

        .error-message {
            font-size: 3vw;
            margin-top: -2vw;
            color: var(--secondary-color);
            letter-spacing: 5px;
            text-transform: uppercase;
            animation: fadeIn 2s ease-out;
        }



        .cta-buttons {
            display: flex;
            gap: 20px;
            margin-top: 30px;
            animation: popIn 2s ease-out;
        }

        .btn-custom {
            padding: 12px 25px;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-custom::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, transparent, var(--primary-color), transparent);
            transition: all 0.5s ease;
            z-index: -1;
        }

        .btn-custom:hover::before {
            left: 100%;
        }

        @keyframes glitch {
            2%, 64% { transform: translate(2px, 0) skew(0deg); }
            4%, 60% { transform: translate(-2px, 0) skew(0deg); }
            62% { transform: translate(0, 0) skew(5deg); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes popIn {
            from { opacity: 0; transform: scale(0.5); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body class="min-h-screen pt-2 bg-no-repeat bg-cover">
    <canvas id="bgCanvas"></canvas>

    <div class="error-container">
        <div class="error-code">404</div>
        <div class="error-message">Page Not Found</div>
        
        <div class="cta-buttons">
            <a href="/" class="btn btn-custom text-white" style="background-color: var(--primary-color);">
                <i class="fas fa-home me-2"></i>Return Home
            </a>
        </div>
    </div>

    <script src="../assets/js/canvas.js"></script>
</body>
</html>