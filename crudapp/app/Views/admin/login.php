<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>


</head>
<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, sans-serif;
        background: linear-gradient(135deg, #667eea, #764ba2);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-box {
        background: #ffffff;
        padding: 50px 50px;
        width: 340px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    label {
        font-weight: bold;
        color: #444;
        display: block;
        margin-bottom: 6px;

    }

    input {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;

        border: 1px solid #ccc;
        border-radius: 6px;
        outline: none;
        transition: 0.3s;
    }

    input:focus {
        border-color: #6c63ff;

        box-shadow: 0 0 5px rgba(108, 99, 255, 0.3);
    }

    button {
        width: 100%;
        padding: 12px;
        background: #667eea;
        color: white;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: 0.3s;
        border: none;
        margin-left: 10px;
        margin-top: 20px;
    }

    button:hover {
        background: #5146d8;
    }
</style>

<body>

    <div class="login-box">

        <h2>Admin Login</h2>

        <form action="<?= base_url('checkLogin') ?>" method="post">
            <label>Username</label>
            <input type="text"
                name="username"
                required
                pattern="[A-Za-z ]{3,30}"
                title="Username should contain only letters and spaces (3-30 characters).">

            <label>Password</label>
            <input type="password"
                name="password"
                required
              
              >

            <button type="submit">Login</button>
        </form>

    </div>

</body>

</html>

