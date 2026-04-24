<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74ABE2, #5563DE);
            color: white;
            text-align: center;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 10px;
        }

        p {
            font-size: 1.2em;
            opacity: 0.9;
        }

        a {
            color: #fff;
            background: rgba(255, 255, 255, 0.2);
            padding: 10px 20px;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 20px;
            display: inline-block;
            transition: 0.3s;
        }

        a:hover {
            background: rgba(255, 255, 255, 0.4);
        }
    </style>
</head>
<body>
    <h1>Selamat Datang di Website Saya!</h1>
    <p>Ini adalah halaman awal (welcome page) Laravel kamu.</p>

    <a href="{{ url('/dashboard') }}">Masuk ke Dashboard</a>
</body>
</html>
