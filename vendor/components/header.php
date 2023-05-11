<header>
    <div class="header">
        <div class="logo">
            <a href="index.php">
                <h1>SPHINX</h1>
            </a>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="index.php #whyy">О процедуре</a>
                </li>
                <li>
                    <a href="index.php #plus">Преимущества</a>
                </li>
                <li>
                    <a href="foto.php">Фото</a>
                </li>
                <li>
                    <a href="rewiew.php?page=1">Отзывы</a>
                </li>
                <li>
                    <a href="master.php">Мастера</a>
                </li>
                <? if(!$_SESSION['user']){ ?>
                <li>
                    <a href="login.php">Авторизация/Регистрация</a>
                </li>
                <? } else { ?>
                <li>
                    <a href="my_carpet.php?page=1">Мои записи</a>
                </li>
                <li>
                    <a href="vendor/action/logOut.php">Выйти</a>
                </li>
                <? if($_SESSION['user']['status'] == 1){ ?>
                <li>
                    <a href="admin.php">Админка</a>
                </li>
                <? } ?>
                <? if($_SESSION['user']['status'] == 3){ ?>
                <li>
                <a href="admin.php">Сотрудникам</a>
                </li>
                <? } ?>
                <? } ?>
            </ul>
        </div>
        <div class="address">
            <p>Омск, пр. Мира, 19</p>
            <a href="tel:+7381635323">63-53-23</a>
        </div>
    </div>
</header>