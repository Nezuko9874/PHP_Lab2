<?php 
$X = 'Kai';
$Y = 'Біографія';

$pages = [
    ['file'=>'index.php?id=1','title'=>'Lalisa Manoban (BlackPink)'],
    ['file'=>'page2.php?id=2','title'=>'Kai (Exo)'],
    ['file'=>'page3.php?id=3','title'=>'Jimin (BTS)'],
    ['file'=>'page4.php?id=4','title'=>'Jisoo (BlackPink)'],
    ['file'=>'page5.php?id=5','title'=>'Felix (Stray Kids)'],
];

$img = 'img/kai.jfif';
$aimg ='img/instagram.png';

$alink = 'https://www.instagram.com/zkdlin/';
$maplink = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3313885.42629416!2d125.23235454184936!3d35.79462444248789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x356455ebcb11ba9b%3A0x91249b00ba88db4b!2z0K7QttC90LDRjyDQmtC-0YDQtdGP!5e0!3m2!1sru!2sua!4v1758469004014!5m2!1suk!2sua';

$ol_list = [
    "Майстер танцю: Кай почав займатися балетом у третьому класі, а джазовим танцем — у четвертому. Його батько підтримував його захоплення танцями, що стало важливим етапом у його житті.",
    "Сольна кар'єра: У листопаді 2020 року Кай дебютував як сольний виконавець з мініальбомом KAI, який став першим сольним альбомом корейського артиста, що очолив чати iTunes у 87 країнах."
];


$block_6_text = [
    "Кай (справжнє ім’я Кім Чон Ін, народився 14 січня 1994 року в Пусані, Південна Корея) — південнокорейський співак, танцюрист та актор, найбільш відомий як учасник популярного бой-бенду EXO. Він розпочав займатися танцями з дитинства, освоїв балет і джазовий танець, що пізніше визначило його яскравий сценічний стиль.",
    "Кай дебютував у складі EXO в 2012 році, здобувши популярність завдяки потужній харизмі та танцювальним здібностям. У 2020 році він дебютував як сольний артист із мініальбомом KAI, який очолив чарти iTunes у багатьох країнах."
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

     <button id="show-time-btn" 
        style="
            margin: 20px; 
            padding: 10px 20px; 
            cursor: pointer; 
            background-color: #a3f0d1; /* м'ятний фон */
            color: #024d31; /* темно-зелений текст для контрасту */
            border: 2px solid #7ed9b8; 
            border-radius: 8px; 
            font-size: 15px; 
            font-weight: 500; 
            box-shadow: 0 2px 6px rgba(0,0,0,0.2); 
            transition: all 0.3s ease;
        "
        onmouseover="this.style.backgroundColor='#7ed9b8'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.25)';"
        onmouseout="this.style.backgroundColor='#a3f0d1'; this.style.boxShadow='0 2px 6px rgba(0,0,0,0.2)';">
    Показати час завантаження
</button>
    
</div>

        </div> 
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    
    const pageStart = performance.now();

    // Початок роботи з localStorage
    const localStorageStart = performance.now();
    
    const elements = document.querySelectorAll("h1, h2, h4, p, li");
    const savedData = {};
    
    // Зчитування даних
    for (let i = 0; i < elements.length; i++) {
        const key = window.location.pathname + "_content_" + i;
        savedData[key] = localStorage.getItem(key);
    }
    
    // Застосування даних
     elements.forEach((el, index) => {
        const key = window.location.pathname + "_content_" + index;
        const savedValue = localStorage.getItem(key);
        if (savedValue) el.textContent = savedValue;
   

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

    document.getElementById("show-time-btn").addEventListener("click", function() {
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

        const box = document.createElement("div");
        box.style.background = "#fff";
        box.style.padding = "20px";
        box.style.borderRadius = "8px";
        box.style.boxShadow = "0 0 10px rgba(0,0,0,0.3)";
        box.style.minWidth = "300px";
        box.innerHTML = `
            <h3>Час формування сторінки</h3>
            
            <p>localStorage: ${localStorageTime.toFixed(2)} мс</p>
            <p><strong>Загальний час формування сторінки: ${totalTime.toFixed(2)} мс</strong></p>
            <button id="close-time">Закрити</button>
        `;

        overlay.appendChild(box);
        document.body.appendChild(overlay);

        document.getElementById("close-time").addEventListener("click", function() {
            document.body.removeChild(overlay);
        });

        overlay.addEventListener("click", function(e) {
            if (e.target === overlay) document.body.removeChild(overlay);
        });
    });

   const localStorageEnd = performance.now();
    const localStorageTime = localStorageEnd - localStorageStart;
    const totalTime = performance.now() - pageStart;


    console.log("Час роботи з localStorage: " + localStorageTime + " ms");
    console.log("Загальний час формування сторінки: " + totalTime + " ms");
});

</script>
</body>

</html>