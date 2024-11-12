<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <style type="text/css"  >
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #e9ecef;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.contact-form {
    width: 100%;
    max-width: 500px;
    background: #fff;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.contact-form:hover {
    transform: translateY(-10px);
}

.contact-form h2 {
    text-align: center;
    color: #333;
    font-size: 24px;
    margin-bottom: 20px;
}

.contact-form label {
    font-weight: bold;
    color: #555;
    display: block;
    margin-top: 15px;
    margin-bottom: 5px;
    font-size: 14px;
}

.contact-form input[type="text"],
.contact-form input[type="email"],
.contact-form textarea {
    width: 100%;
    padding: 12px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f8f9fa;
    color: #333;
    font-size: 14px;
    transition: border 0.3s ease;
}

.contact-form input[type="text"]:focus,
.contact-form input[type="email"]:focus,
.contact-form textarea:focus {
    border-color: #6c63ff;
    outline: none;
}

.contact-form textarea {
    resize: vertical;
    min-height: 100px;
}

.contact-form button {
    width: 100%;
    padding: 12px;
    background-color: #6c63ff;
    color: #fff;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s ease;
    margin-top: 20px;
}

.contact-form button:hover {
    background-color: #5a54d8;
}

.contact-form button:active {
    background-color: #4a45c1;
}

.contact-form p.success-message,
.contact-form p.error-message {
    font-size: 14px;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    margin-top: 15px;
}

.contact-form p.success-message {
    color: #155724;
    background-color: #d4edda;
    border: 1px solid #c3e6cb;
}

.contact-form p.error-message {
    color: #721c24;
    background-color: #f8d7da;
    border: 1px solid #f5c6cb;
}

    </style>
</head>
<body>
    <div class="contact-form">
        <h2>Liên hệ với chúng tôi</h2>
        <form action="contact-handler.php" method="POST">
            <label for="username">Tên người dùng:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Lý do/Y kiến liên quan:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <button type="submit" name="submit">Gửi</button>
        </form>
    </div>
</body>
</html>
