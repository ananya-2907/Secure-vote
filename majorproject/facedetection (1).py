import mysql.connector
from flask import Flask, request, jsonify
import base64
from PIL import Image
import io
app=Flask(__name__)
@app.route('/detect-face', methods=['POST'])
def hello():
    try:
        encoded_photo = request.args.get('photo')
        encoded_mobile=request.args.get('mobile')
        decoded_bytes = base64.b64decode(encoded_photo)
        decoded_mobile = base64.b64decode(encoded_mobile)
        image1 = Image.open(io.BytesIO(decoded_bytes))
        image2=fetch_data(decoded_mobile)
        face_encoding1 = face_recognition.face_encodings(image1)
        face_encoding2 = face_recognition.face_encodings(image2)

        if len(face_encoding1) == 0:
            return jsonify({"message", 2})

        # Compare face encodings
        results = face_recognition.compare_faces([face_encoding1[0]], face_encoding2[0])

        if results[0]:
            return jsonify({"message", 1})
        else:
            return jsonify({"message", 0})
    except Exception as e:
        return jsonify({"error": str(e)}), 500
def fetch_data(mobile):
    """Fetch data from the database and print it."""
    connection = connect_to_database()
    if connection is not None and connection.is_connected():
        cursor = connection.cursor()
        cursor.execute("SELECT photo FROM users")
        
        # Fetch all rows from the last executed statement
        image = cursor.fetchall()
        cursor.close()
        connection.close()
        return image
    else:
        print("Failed to connect to the database")
def connect_to_database():
    try:
        # Connect to the database
        connection = mysql.connector.connect(
            host='localhost',  # usually localhost when using XAMPP
            user='root',       # default user for XAMPP MySQL
            password='',       # default password for XAMPP MySQL is empty
            database='voting' # your database name
        )

        return connection
    except mysql.connector.Error as e:
        print(f"Error connecting to MySQL: {e}")

if __name__ == '__main__':
    app.run(debug=True)