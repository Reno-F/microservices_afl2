<h2>Dashboard</h2>
<p>Selamat datang, {{ $username }}!</p>

<form method="POST" action="/logout">
    @csrf
    <button type="submit">Logout</button>
</form>
