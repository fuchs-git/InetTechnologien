<!doctype html>
<html lang="de">
<head>
    <script src="script.js" defer></script>
    <title>Document</title>
</head>
<body>



<form id="registrationForm">
    <h2>Registrierung</h2>

    <input type="text" id="name" name="name" placeholder="Name eingeben"><br>
    <input type="email" id="email" name="email" placeholder="E-Mail eingeben"><br>
    <input type="password" id="password1" name="password1" placeholder="Passwort eingeben"><br>
    <input type="password" id="password2" name="password2" placeholder="Passwort wiederholen"><br>

    <button type="submit">Absenden</button>

    <!-- Bereich für Fehlermeldungen -->
    <div id="errorMessages" style="color: red;"></div>
</form>

</body>
</html>