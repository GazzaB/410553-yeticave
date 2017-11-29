<main>
    <nav class="nav">
        <ul class="nav__list container">
            <? foreach ($categories as $key => $value): ?>
                <li class="nav__item">
                    <a href=""><?= $value['title']; ?></a>
                </li>
            <? endforeach; ?>
        </ul>
    </nav>
    <? if (isset($_GET['id'])): ?>
        <? $lots = $lots[$_GET['id']] ?>
        <? if (isset($lots)): ?>


            <section class="lot-item container">
                <h2><?= ($lots['title']) ?></h2>
                <div class="lot-item__content">
                    <div class="lot-item__left">
                        <div class="lot-item__image">
                            <img src="<?= ($lots['url']) ?>" width="730" height="548" alt="Сноуборд">
                        </div>
                        <p class="lot-item__category">Категория: <span><?= ($lots['category']) ?></span></p>
                        <p class="lot-item__description"><?= $lots['message'];?></p>
                    </div>
                    <div class="lot-item__right">
                        <div class="lot-item__state">
                            <div class="lot-item__timer timer">
                                10:54:12
                            </div>
                            <div class="lot-item__cost-state">
                                <div class="lot-item__rate">
                                    <span class="lot-item__amount">Текущая цена</span>
                                    <span class="lot-item__cost"><?= ($lots['price']); ?></span>
                                </div>
                                <div class="lot-item__min-cost">
                                    Мин. ставка <span><?= ($lots['price']+$lots['step']); ?></span>
                                </div>
                            </div>
                            <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post">
                                <p class="lot-item__form-item">
                                    <label for="cost">Ваша ставка</label>
                                    <input id="cost" type="number" name="cost" placeholder="<?= ($lots['price']+$lots['step']); ?>">
                                </p>
                                <button type="submit" class="button">Сделать ставку</button>
                            </form>
                        </div>
                        <div class="history">
                            <h3>История ставок (<span>4</span>)</h3>
                            <table class="history__list">
                                <?php foreach ($bets as $key => $value): ?>
                                    <tr class="history__item">
                                        <td class="history__name"><?= $value['name']; ?></td>
                                        <td class="history__price"><?= $value['price']; ?> р</td>
                                        <td class="history__time"><?= startTime($value['ts']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        <? else: ?>
            <?php http_response_code(404); ?>
            <p class="title404">Такой страницы не существует</p>
        <? endif; ?>
    <? endif; ?>
</main>
