<h2>Dashboard</h2>
<p>Selamat datang, {{ $username }}!</p>

<form method="POST" action="/logout">
    @csrf
    <button type="submit">Logout</button>
</form>

<hr>

<h3>Kalkulator Sederhana</h3>
<form method="POST" action="{{ route('calculator') }}">
    @csrf
    <input type="number" name="angka1" placeholder="Angka pertama" required>
    <select name="operator" required>
        <option value="+">+</option>
        <option value="-">−</option>
        <option value="*">×</option>
        <option value="/">÷</option>
    </select>
    <input type="number" name="angka2" placeholder="Angka kedua" required>
    <button type="submit">Hitung</button>
</form>

@if(session('hasil') !== null)
    <p>Hasil: {{ session('hasil') }}</p>
@endif
