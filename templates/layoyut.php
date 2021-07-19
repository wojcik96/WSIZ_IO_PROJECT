<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zawsze do Celu!</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,400;0,700;1,400&family=Ubuntu:ital,wght@0,400;0,500;0,700;1,300&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
          integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">


    <link rel="stylesheet" href="../public/style/bootstrap.min.css">
    <link rel="stylesheet" href="../public/style/cover.css">
    <link rel="stylesheet" href="../public/style/style.css">
</head>
<body>
<div class="cover-container d-flex h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">Zawsze do Celu! <i class="fas fa-map-marked-alt"></i></h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link active" data-name="schedules" href="/"><i class="fas fa-clipboard-list"></i> Rozkłady
                </a>
                <a class="nav-link" data-name="weather" href="/?action=weather"><i class="fas fa-sun"></i> Pogoda </a>
                <a class="nav-link" data-name="pricelist" href="/?action=pricelist"><i
                            class="fas fa-dollar-sign"></i> Cennik </a>
            </nav>
        </div>
    </header>

    <main class="mainContainer w-100">
        <div class="mainContainer__wrapper">
            <?php require_once("templates/pages/$pageName.php"); ?>
        </div>
    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>&copy<b>Zawsze do Celu!</b> - Arkadiusz Wójcik</p>
            <p>Kontakt: xxx-xxx-xxx</p>

        </div>
    </footer>
</div>

<script type="text/javascript">
    const navBtnArray = [...document.querySelectorAll(`nav a`)];
    window.GetQueryString = function (q) {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (var i = 0; i < hashes.length; i++) {
            hash = hashes[i].split('=');
            vars[hash[0]] = hash[1];
        }
        return vars;
    };
    const params = GetQueryString();

    const navActiveBtn = document.querySelector(`a[data-name="${params['action']}"]`);
    if (navActiveBtn) {
        navBtnArray.forEach((element) => {
            element.classList.remove('active');
        })
        navActiveBtn.classList.add('active');
    }
</script>

</body>
</html>