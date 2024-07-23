<!DOCTYPE html>
<html>
<head>
    <title>Login with Photo Capture</title>
    <style>
        #capture-window {
            width: 640px;
            height: 520px;
        }
    </style>
</head>
<body>

<h1>Login with Photo Capture</h1>

<button id="login-btn">Login</button>

<script>
    // Function to open the capture window
    function openCaptureWindow() {
        const captureWindow = window.open('capture.php', 'CaptureWindow', 'width=640,height=520');
    }

    // Event listener for the login button
    const loginButton = document.getElementById('login-btn');
    loginButton.addEventListener('click', function() {
        openCaptureWindow();
    });
</script>

</body>
</html>
