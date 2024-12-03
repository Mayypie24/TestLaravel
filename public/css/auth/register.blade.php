/* Mengatur tampilan form secara keseluruhan */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f2f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

/* Card untuk form registrasi */
.register-card {
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

.register-card h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

/* Input dan button dalam form */
.register-card input[type="text"],
.register-card input[type="email"],
.register-card input[type="password"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
}

.register-card input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.register-card input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Teks link di bawah form */
.register-card .login-link {
    text-align: center;
    margin-top: 15px;
    font-size: 14px;
}

.register-card .login-link a {
    color: #007bff;
    text-decoration: none;
}

.register-card .login-link a:hover {
    text-decoration: underline;
}
