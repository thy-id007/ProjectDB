<?php // FILE: header.php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        /* --- Basic Reset and Body Styling --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #333642; /* Dark background */
            color: #fff;
        }

        /* --- Form Wrapper with Neon Glow Effect --- */
        .login-wrapper {
            position: relative;
            width: 380px;
            padding: 40px;
            background: #1c1c28;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
            overflow: hidden; /* Keeps the glow contained */
        }

        /* The animated neon border */
        .login-wrapper::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 380px;
            height: 460px; /* Adjust height to cover the form */
            background: linear-gradient(0deg, transparent, #45f3ff, #45f3ff),
                        linear-gradient(90deg, transparent, #ff45a2, #ff45a2);
            background-size: 100% 100%, 100% 100%;
            z-index: 1;
            transform-origin: bottom right;
            animation: animateBorder 6s linear infinite;
        }
        
        .login-wrapper::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 380px;
            height: 460px;
            background: linear-gradient(0deg, transparent, #45f3ff, #45f3ff),
                        linear-gradient(90deg, transparent, #ff45a2, #ff45a2);
            background-size: 100% 100%, 100% 100%;
            z-index: 1;
            transform-origin: bottom right;
            animation: animateBorder 6s linear infinite;
            animation-delay: -3s; /* Offset second animation */
        }

        @keyframes animateBorder {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* --- Form Content --- */
        .login-form {
            position: relative;
            z-index: 2; /* Ensure form content is above the glow */
            padding: 20px;
            background: #1c1c28;
            border-radius: 16px; /* Slightly smaller radius than wrapper */
            display: flex;
            flex-direction: column;
        }

        .login-form h2 {
            font-size: 2em;
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
            letter-spacing: 0.05em;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Simple SVG for the icons */
        .login-form h2 svg {
            margin-right: 10px;
        }
        
        .input-group {
            position: relative;
            margin-bottom: 30px;
        }

        .input-group input {
            width: 100%;
            padding: 15px 10px 10px;
            background: transparent;
            border: 2px solid #3d3d52;
            border-radius: 8px;
            outline: none;
            color: #fff;
            font-size: 1em;
            transition: 0.3s;
        }

        .input-group input:focus,
        .input-group input:valid {
            border-color: #45f3ff;
        }

        .input-group label {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            padding: 0 5px;
            color: #8f8f8f;
            font-size: 1em;
            pointer-events: none;
            transition: 0.3s;
        }
        
        /* Animate label up when input is focused or has content */
        .input-group input:focus ~ label,
        .input-group input:valid ~ label {
            top: 0;
            font-size: 0.75em;
            background: #1c1c28; /* Match form background to "cut out" the border */
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            border: none;
            outline: none;
            border-radius: 8px;
            background: #45f3ff;
            color: #1c1c28;
            font-size: 1.2em;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 0 5px #45f3ff, 0 0 15px #45f3ff, 0 0 30px #45f3ff;
        }

        .submit-btn:hover {
            letter-spacing: 0.05em;
            box-shadow: 0 0 10px #45f3ff, 0 0 25px #45f3ff, 0 0 50px #45f3ff;
        }

        .links {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .links a {
            color: #8f8f8f;
            text-decoration: none;
            font-size: 0.9em;
            transition: 0.3s;
        }

        .links a:hover {
            color: #45f3ff;
        }

        .links a.signup {
            color: #ff45a2;
        }
        
        .links a.signup:hover {
            color: #ff78c2;
        }

        /* --- PHP Message Styling --- */
        .message {
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 20px;
            font-size: 0.9em;
        }
        .message.success {
            background-color: #28a74533;
            color: #28a745;
            border: 1px solid #28a745;
        }
        .message.error {
            background-color: #dc354533;
            color: #dc3545;
            border: 1px solid #dc3545;
        }
    </style>
</head>
<body>
