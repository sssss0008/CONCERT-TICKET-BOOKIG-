function showLogin() {
    document.getElementById('authForms').innerHTML = `
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    `;
}

function showRegister() {
    document.getElementById('authForms').innerHTML = `
        <h2>Register</h2>
        <form action="register.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" required>
            <button type="submit">Register</button>
        </form>
    `;
}

function logout() {
    window.location.href = 'logout.php';
}
