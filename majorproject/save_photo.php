<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['imageData'])) {
    // Get the image data
    $imageData = $_POST['imageData'];

    // Remove the base64 prefix
    $base64 = preg_replace('/^data:image\/jpeg;base64,/', '', $imageData);

    // Convert base64 to binary data
    $binary = base64_decode($base64);

    // Save the image
    $fileName = 'my_photo/captured_photo.jpg';
    file_put_contents($fileName, $binary);

    // Respond with a success message
    echo "Photo saved successfully!";
} else {
    // Respond with an error message
    echo "Error: Photo data not received.";
}
?>
