<?php 
$X = 'Felix';
$Y = 'Біографія';

$pages = [
    ['file'=>'index.php?id=1','title'=>'Lalisa Manoban (BlackPink)'],
    ['file'=>'page2.php?id=2','title'=>'Kai (Exo)'],
    ['file'=>'page3.php?id=3','title'=>'Jimin (BTS)'],
    ['file'=>'page4.php?id=4','title'=>'Jisoo (BlackPink)'],
    ['file'=>'page5.php?id=5','title'=>'Felix (Stray Kids)'],
];
$img = 'img/felix.jfif';
$aimg ='img/instagram.png';

$alink = 'https://www.instagram.com/yong.lixx/';
$maplink = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d424146.7075988663!2d150.60232150788846!3d-33.84723486917716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b129838f39a743f%3A0x3017d681632a850!2z0KHQuNC00L3QtdC5INCd0L7Qsi4g0K7Qti4g0KPRjdC70YzRgSwg0JDQstGB0YLRgNCw0LvQuNGP!5e0!3m2!1sru!2sua!4v1758473968197!5m2!1suk!2sua';


$ol_list = [
    "Сценічне ім’я: Felix (корейське ім’я — Lee Yong-bok / 이용복).",
    "Його глибокий голос часто контрастує з милим “яскравим” зовнішнім виглядом, що створює цікаве поєднання на сцені.",
    "Він був оголошений глобальним амбасадором бренду краси HERA, ставши першим чоловіком-амбасадором цього бренду."
];


$block_6_text = [
    "Фелікс (справжнє ім’я — Лі Фелікс, кор. 이필릭스) — південнокорейський співак, репер і танцівник, учасник бойз-бенду Stray Kids. Він народився 15 вересня 2000 року в Сіднеї, Австралія, у родині корейських емігрантів.",
    "У 2017 році повернувся до Південної Кореї, де приєднався до JYP Entertainment і став учасником гурту після реаліті-шоу Stray Kids. Фелікс відомий своєю унікально глибокою хриплуватою реперською подачею, харизмою на сцені та відмінними навичками танцю."
];


?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title></title>
</head>
<body>

<header class="header">
    <h1>
        <?= htmlspecialchars($X) ?>
    </h1>
</header>

<div class="container">
    <div class="container-wrapper">
       <h4>Меню</h4>
    <ul>
        <?php foreach($pages as $i => $p): ?>
            <?php $href = $p['file']; $label = $p['title']; ?>
            <li>
                <a href="<?= $href ?>" class="<?= ($_GET['id']??1)==($i+1) ? 'active' : '' ?>">
                    <?= htmlspecialchars($label) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    </div>
    <div class="container-blocks">
        <div class="block-3-4-5">
            <div class="block-3">
            <img src="<?= htmlspecialchars($img) ?>" alt="Lalisa Manoban" class="photo">
            </div>
            <div class="block-4-5">
            <div class="block-4">
                <iframe 
    src="<?= htmlspecialchars($maplink) ?>" 
    width ="100%"
    height="100%"
    style="border:0;" 
    allowfullscreen="" 
    loading="lazy" 
    referrerpolicy="no-referrer-when-downgrade">
</iframe>

            </div>
            <div class="block-5">
                <h2>Цікаві факти:</h2>
    <ol>
        <?php foreach($ol_list as $item): ?>
            <li><?= htmlspecialchars($item) ?></li>
        <?php endforeach; ?>
    </ol>
    <a href=" <?= htmlspecialchars($alink) ?>"><img class="aimg" src=" <?= htmlspecialchars($aimg) ?>" alt="Instagram"></a>
            </div>
            </div>
        </div>
        
        <div class="block-6">
            <?= htmlspecialchars($Y) ?>
            <?php foreach($block_6_text as $paragraph): ?>
        <p><?= $paragraph ?></p>
    <?php endforeach; ?>
    
</div>

        </div> 
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
   const navigationStart = performance.timing.navigationStart;
    const domLoadEnd = performance.timing.domContentLoadedEventEnd;
    const serverGenerationTime = domLoadEnd - navigationStart;
    
    // Початок роботи з localStorage
    const localStorageStart = performance.now();
    
    const elements = document.querySelectorAll("h1, h2, h4, p, li");
    const savedData = {};
    
    // Одноразове зчитування всіх даних
    for (let i = 0; i < elements.length; i++) {
        const key = window.location.pathname + "_content_" + i;
        savedData[key] = localStorage.getItem(key);
    }
    
    // Застосування даних
    elements.forEach((el, index) => {
        const key = window.location.pathname + "_content_" + index;
        if (savedData[key]) {
            el.textContent = savedData[key];
        }

        el.style.cursor = "pointer"; 

        el.addEventListener("click", function() {
            const overlay = document.createElement("div");
            overlay.style.position = "fixed";
            overlay.style.top = 0;
            overlay.style.left = 0;
            overlay.style.width = "100%";
            overlay.style.height = "100%";
            overlay.style.backgroundColor = "rgba(0,0,0,0.5)";
            overlay.style.display = "flex";
            overlay.style.justifyContent = "center";
            overlay.style.alignItems = "center";
            overlay.style.zIndex = 9999;

            const form = document.createElement("div");
            form.style.background = "#fff";
            form.style.padding = "20px";
            form.style.borderRadius = "8px";
            form.style.boxShadow = "0 0 10px rgba(0,0,0,0.3)";
            form.style.minWidth = "300px";
            form.style.maxWidth = "600px";

            const textarea = document.createElement("textarea");
            textarea.value = el.textContent;
            textarea.style.width = "100%";
            textarea.style.height = "100px";
            textarea.style.marginBottom = "10px";

            const saveBtn = document.createElement("button");
            saveBtn.textContent = "Зберегти";
            saveBtn.style.marginRight = "10px";

            const cancelBtn = document.createElement("button");
            cancelBtn.textContent = "Скасувати";

            form.appendChild(textarea);
            form.appendChild(saveBtn);
            form.appendChild(cancelBtn);
            overlay.appendChild(form);
            document.body.appendChild(overlay);

            textarea.focus();

            saveBtn.addEventListener("click", function() {
                el.textContent = textarea.value;
                localStorage.setItem(key, textarea.value); // зберігаємо ізольовано
                document.body.removeChild(overlay);
            });

            cancelBtn.addEventListener("click", function() {
                document.body.removeChild(overlay);
            });

            overlay.addEventListener("click", function(e) {
                if (e.target === overlay) {
                    document.body.removeChild(overlay);
                }
            });
        });
    });

    const localStorageEnd = performance.now();
    const localStorageTime = localStorageEnd - localStorageStart;
    
    // Загальний час
    const totalTime = serverGenerationTime + localStorageTime;
    
    console.log("Час генерації сторінки: " + serverGenerationTime + " ms");
    console.log("Час роботи з localStorage: " + localStorageTime + " ms");
    console.log("Загальний час формування сторінки: " + totalTime + " ms");
});

</script>
</body>

</html>