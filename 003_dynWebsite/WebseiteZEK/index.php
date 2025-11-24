<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Zuckerwerk Eis und Kuchen AG</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1><a href="index.php"><img src="bilder/logo.png" alt="logo"></a>Zuckerwerk Eis und Kuchen AG</h1>
</header>
<?php
require "nav.php";
require "main.php";
?>

<main>
    <article>
        <header>
            <span>26.09.2016</span>
            <h2>Zuckerwerk,Eis und Kuchen mit neuem Logo</h2>
        </header>
        <section>Stolz präsentireren wir heute unser neues Logo</section>
        <section><img src="bilder/zek_logo.png" alt="neues Logo"></section>
    </article>
    <hr>
    <article>
        <header>
            <span>23.08.2016</span>
            <h2>Neuen Kuchen ab Oktober 2016</h2></header>
        <section>
            <p>
                Hier ein kleiner Vorgeschmack auf unsere neue Kuchenkollektion. Erhältlich ab Oktober 2016 in all
                unseren Geschäften</section>
        </p>
        <section>
            <img src="bilder/75313_html_kuchen.jpg" alt="Cake1" style="height: 200px">
            <img src="bilder/cake-html-binary-technology-theme-cakes-cupcakes-mumbai-19.jpg" alt="cake2"
                 style="height: 200px">
        </section>
    </article>
</main>

<?php
require "footer.php";
?>

</body>
</html>