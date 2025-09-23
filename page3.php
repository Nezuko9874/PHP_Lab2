<?php 
$X = 'Jimin (BTS)';
$Y = 'Біографія';

$pages = [
    ['file'=>'index.php?id=1','title'=>'Lalisa Manoban (BlackPink)'],
    ['file'=>'page2.php?id=2','title'=>'Kai (Exo)'],
    ['file'=>'page3.php?id=3','title'=>'Jimin (BTS)'],
    ['file'=>'page4.php?id=4','title'=>'Jisoo (BlackPink)'],
    ['file'=>'page5.php?id=5','title'=>'Felix (Stray Kids)'],
];

$img = 'img/jimin.jfif';
$aimg ='img/instagram.png';

$alink = 'https://www.instagram.com/j.m';
$maplink = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3313885.42629416!2d125.23235454184936!3d35.79462444248789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x356455ebcb11ba9b%3A0x91249b00ba88db4b!2z0K7QttC90LDRjyDQmtC-0YDQtdGP!5e0!3m2!1sru!2sua!4v1758469004014!5m2!1suk!2sua';

$ol_list = [
    "Освіта та танці:
Чімін навчався у Busan High School of Arts, де спеціалізувався на сучасному танці (modern dance). Його викладачі помітили талант і підштовхнули до участі в прослуховуваннях, що врешті привело до підписання контракту з Big Hit Entertainment.",
    "Сольні треки в складі гурту
В рамках BTS він виконав кілька сольних пісень: “Lie” (2016), “Serendipity” (2017) та “Filter” (2020). Вони досягали високих позицій у чартах, і “Filter” встановив рекорд за кількістю стрімів серед корейських пісень у перші 24 години після виходу."
];


$block_6_text = [
    "
Чімін (Пак Чі Мін, народився 13 жовтня 1995 року в Пусані, Південна Корея) — співак, танцюрист та автор пісень, відомий як один із вокалістів і головних танцюристів гурту BTS. Він навчався у Busan High School of Arts, де спеціалізувався на сучасному танці, що згодом визначило його сценічний стиль.",
    "У складі BTS дебютував у 2013 році та здобув світове визнання завдяки потужній харизмі, емоційному вокалу й унікальним сольним трекам, серед яких “Lie”, “Serendipity” та “Filter”. У 2023 році він розпочав успішну сольну кар’єру, випустивши альбом Face, а його сингл Like Crazy став першим корейським сольним треком, що очолив Billboard Hot 100."
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
                localStorage.setItem(key, textarea.value); 
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