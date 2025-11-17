<!doctype html>
<html lang="de">
<head>
    <title>ClientSiede Validierung</title>
</head>
<body>
<form method="post">
    <label>
        Vorname: <input type="text" name="vorname" required>
    </label><br>

    <label>
        E-Mail-Adresse: <input type="email" name="email" required>
    </label><br>

    <label>
        Alter: <input type="number" name="age" min="18" max="99">
    </label><br>

    <label>
        Telefonnummer: <input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890">
    </label><br>

    <button type="submit">Absenden</button>
</form>


</body>
</html>