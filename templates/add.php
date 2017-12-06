<main>
    <nav class="nav">
        <ul class="nav__list container">
            <? foreach ($categories as $key => $value): ?>
                <li class="nav__item">
                    <a href="all-lots.html"><?= $value['title']; ?></a>
                </li>
            <? endforeach; ?>
        </ul>
    </nav>
    <form class="form form--add-lot container<? if (isset($error)): ?><?= ' form--invalid'; ?><? endif; ?>"
          action="add.php" method="post" enctype="multipart/form-data"> <!-- form--invalid -->
        <h2>Добавление лота</h2>
        <div class="form__container-two">
            <div class="form__item<? if (isset($error['lot-name'])): ?><?= ' form__item--invalid'; ?><? endif; ?>">
                <!-- form__item--invalid -->
                <label for="lot-name">Наименование</label>
                <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота"
                       value="<? if (isset($newLot['lot-name'])): ?><?= $newLot['lot-name']; ?><? endif; ?>">
                <span class="form__error">Введите наименование лота</span>
            </div>
            <div class="form__item<? if (isset($error['category'])): ?><?= ' form__item--invalid'; ?><? endif; ?>">
                <label for="category">Категория</label>
                <select id="category" name="category"
                        value="<? if (isset($newLot['category'])): ?><?= $newLot['category']; ?><? endif; ?>">
                    <option><? if (isset($newLot['category'])): ?><?= $newLot['category']; ?><? else: ?>Выберите категорию<? endif; ?></option>
                    <? foreach ($categories as $key => $value): ?>
                        <option><?= $value['title']; ?></option>
                    <? endforeach; ?>
                </select>
                <span class="form__error">Выберите категорию</span>
            </div>
        </div>
        <div class="form__item form__item--wide<? if (isset($error['message'])): ?><?= ' form__item--invalid'; ?><? endif; ?>">
            <label for="message">Описание</label>
            <textarea id="message" name="message"
                      placeholder="Напишите описание лота"><? if (isset($newLot['message'])): ?><?= $newLot['message']; ?><? endif; ?></textarea>
            <span class="form__error">Напишите описание лота</span>
        </div>
        <div class="form__item form__item--file<? if (isset($lotUrl)): ?><?= ' form__item--uploaded'; ?><? endif; ?>">
            <label>Изображение</label>
            <div class="preview">
                <button class="preview__remove" type="button">x</button>
                <div class="preview__img">
                    <img src="<? if (isset($lotUrl)): ?><?= $lotUrl; ?><? endif; ?>" width="113" height="113"
                         alt="Изображение лота">
                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" id="photo2" value="" name="lot-img">
                <label for="photo2">
                    <span>+ Добавить</span>
                </label>
            </div>
        </div>
        <div class="form__container-three<? if (isset($error['lot-rate'])): ?><?= ' form__item--invalid'; ?><? endif; ?>">
            <div class="form__item form__item--small">
                <label for="lot-rate">Начальная цена</label>
                <input id="lot-rate" type="text" name="lot-rate" placeholder="0"
                       value="<? if (isset($newLot['lot-rate'])): ?><?= $newLot['lot-rate']; ?><? endif; ?>">
                <span class="form__error"><? if (isset($error['lot-rate']) and $error['lot-rate'] == 'number'): ?>Недопустимое значение<? else: ?>Введите начальную цену<? endif; ?></span>
            </div>
            <div class="form__item form__item--small<? if (isset($error['lot-step'])): ?><?= ' form__item--invalid'; ?><? endif; ?>">
                <label for="lot-step">Шаг ставки</label>
                <input id="lot-step" type="text" name="lot-step" placeholder="0"
                       value="<? if (isset($newLot['lot-step'])): ?><?= $newLot['lot-step']; ?><? endif; ?>">
                <span class="form__error"><? if (isset($error['lot-rate']) and $error['lot-rate'] == 'number'): ?>Недопустимое значение<? else: ?>Введите шаг ставки<? endif; ?></span>
            </div>
            <div class="form__item<? if (isset($error['lot-date'])): ?><?= ' form__item--invalid'; ?><? endif; ?>">
                <label for="lot-date">Дата окончания торгов</label>
                <input class="form__input-date" id="lot-date" type="date" name="lot-date"
                       value="<? if (isset($newLot['lot-date'])): ?><?= $newLot['lot-date']; ?><? endif; ?>">
                <span class="form__error">Введите дату завершения торгов</span>
            </div>
        </div>
        <? if (isset($error)): ?>
            <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <? endif; ?>
        <button type="submit" class="button">Добавить лот</button>
    </form>
</main>

