@include('head')
<body>

<h1>Unesi ime i mejl</h1>
<form action="{{ route('send-mail') }}" method="POST">
    @csrf
    <label>Ime: <input type="text" name="name" required></label><br><br>
    <label>Email: <input type="email" name="email" required></label><br><br>
    <button type="submit">Pošalji mejl</button>
</form>
</body>
