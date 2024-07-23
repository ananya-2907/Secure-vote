<!--  <!DOCTYPE html>
<html>
<head>
    <title>Capture Photo</title>
    <style>
        #video {
            width: 640px;
            height: 480px;
        }
        #canvas {
            display: none;
        }
    </style>
</head>
<body>

<h2>Capture Photo</h2>

<div>
    <video id="video" autoplay></video>
    <canvas id="canvas"></canvas>
    <button id="capture-btn">Capture Photo</button>
</div>

<script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const captureButton = document.getElementById('capture-btn');

    // Get user media
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            video.srcObject = stream;
        })
        .catch(function(err) {
            console.error('Error accessing the camera: ', err);
        });

    // Capture photo
    captureButton.addEventListener('click', function() {
        const context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        // Convert canvas to JPEG
        const imageData = canvas.toDataURL('image/jpeg', 0.9);

        // Close the capture window
        savePhoto(imageData);
        window.opener.postMessage(imageData, "*");
        window.close();
    });
    function savePhoto(imageData) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'save_photo.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log('Photo saved successfully!');
                // You can handle the response from save_photo.php here
            }
        };
        xhr.send('imageData=' + encodeURIComponent(imageData));
    }
</script>

</body>
</html>









 -->




 <!DOCTYPE html>
<html>
<head>
    <title>Capture Photo</title>
    <style>
        #video {
            width: 640px;
            height: 480px;
        }
        #canvas {
            display: none;
        }
    </style>
</head>
<body>

<h2>Capture Photo</h2>

<div>
    <video id="video" autoplay></video>
    <canvas id="canvas"></canvas>
    <button id="capture-btn">Capture Photo</button>
</div>

<script>
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const captureButton = document.getElementById('capture-btn');

    // Get user media
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            video.srcObject = stream;
        })
        .catch(function(err) {
            console.error('Error accessing the camera: ', err);
        });

    // Capture photo
    captureButton.addEventListener('click', function() {
        const context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, canvas.width, canvas.height);

        // Convert canvas to JPEG
        const imageData = canvas.toDataURL('image/jpeg', 0.9);

        // Send the captured photo to PHP for saving
        savePhoto(imageData);
        //window.opener.postMessage(imageData, "*");
        //window.close();
    });

    // Function to send captured photo to PHP for saving
    function savePhoto(imageData) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'save_photo.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log('Photo saved successfully!');
                // You can handle the response from save_photo.php here
            }
        };
        xhr.send('imageData=' + encodeURIComponent(imageData));
    }
</script>

</body>
</html>
 
