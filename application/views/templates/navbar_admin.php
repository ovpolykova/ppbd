<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="#" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img class="bi me-2" src="<?=asset_url()?>/img/logo.jpg" alt="" width="30%" height="30%">
            <p>Добро пожаловать! Администратор<b><br><?=$session['fio']?></b></p>
        </a>
        <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Справочники
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?=base_url('contract_admin/index')?>">Контрагент</a></li>
                    <li><a class="dropdown-item" href="<?=base_url('user/index')?>">Пользователь</a></li>
                    <li><a class="dropdown-item" href="<?=base_url('price/browse_price')?>">Прайс-лист</a></li>
                    <li><a class="dropdown-item" href="<?=base_url('product/browse_product')?>">Товар-прайс</a></li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Списки заказов
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">По контрагентам</a></li>
                    <li><a class="dropdown-item" href="#">По товарам</a></li>
                    <li><a class="dropdown-item" href="#">Не выполненных срок</a></li>
                </ul>
            </li>
        </ul>
        <div class="col-md-3 text-end">
        <a href="<?=base_url('main/exit')?>" class="nav-link px-2 link-dark"> <button type="button" class="btn btn-outline-primary me-2">ВЫЙТИ</button></a> 
        </div>
    </header>
</div>