import requests
import json
import base64
with open(r"C:\xampp\htdocs\majorproject\uploads\IMG_20220414_105141.jpg", 'rb') as f:
    # Construct a dictionary to be sent as a payload with the request
    image_data = f.read()
    encoded_image = base64.b64encode(image_data).decode("utf-8")
    # Send POST request with image file
payload={"photo":encoded_image,"id":"1"}
response = requests.post("http://127.0.0.1:5000/detect-face", json=payload)
print(response.content)
