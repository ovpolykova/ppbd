<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img class="bi me-2" src="<?=asset_url()?>/img/bootstrap-logo.svg" alt="" width="40" height="32">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="<?=base_url('main/index')?>" class="nav-link px-2 link-dark">Главная</a></li>
        </ul>

        <div class="col-md-3 text-end">
            
            <!-- Если есть сессия, то "Выйти" иначе "Аторизация" и "Регистрация" на навигационной панели -->
            <?php
                if (!empty($session)) {?>
                    <a type="button" class="btn btn-primary" href="<?=base_url('main/exit')?>">Выйти</a>
                <?php }
                else
                {?>
                    <a type="button" class="btn btn-outline-primary me-2" href="<?=base_url('login/index')?>">Авторизация</a>
                    <a type="button" class="btn btn-primary" href="<?=base_url('register/index')?>">Регистрация</a>
                <?php }
            ?>

        </div>
    </header>
</div>