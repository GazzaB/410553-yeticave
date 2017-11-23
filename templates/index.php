<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное
            снаряжение.</p>
        <ul class="promo__list">
            <?php foreach ($categories as $key => $value): ?>
                <li class="promo__item <?= $value['class']; ?>">
                    <a class="promo__link" href="all-lots.html"><?= $value['title']; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
            <?php foreach ($lots as $key => $value): ?>
                <li class="lots__item lot">
                    <div class="lot__image">
                        <img src="<?= $value['url'];?>" width="350" height="260" alt="<?= esc($value['title']);?>">
                    </div>
                    <div class="lot__info">
                        <span class="lot__category"><?= esc($value['category']);?></span>
                        <h3 class="lot__title"><a class="text-link" href="lot.php?id=<?= $key;?>"><?= esc($value['title']);?></a>
                        </h3>
                        <div class="lot__state">
                            <div class="lot__rate">
                                <span class="lot__amount">Стартовая цена</span>
                                <span class="lot__cost"><?= esc($value['price']);?><b class="rub">р</b></span>
                            </div>
                            <div class="lot__timer timer">
                                <?= $lot_time_remaining = gmdate("H:i", $tomorrow - $now); ?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>