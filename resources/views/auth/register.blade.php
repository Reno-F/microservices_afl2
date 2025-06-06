<h2>Register</h2>
<form method="POST" action="/register">
    @csrf
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required><br>
    <button type="submit">Register</button>
</form>
<a href="/login">Sudah punya akun? Login</a>
