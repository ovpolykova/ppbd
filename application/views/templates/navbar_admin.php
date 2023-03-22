<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="<?=base_url('home/index')?>" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img class="bi me-2" src="<?=asset_url()?>/img/logo1.png" alt="" width="100" height="80">
            <p><b>Добро пожаловать, Администратор! ФИО</b></p>
        </a>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="<?=base_url('price/index')?>" class="nav-link px-2 link-dark">Прайс лист</a></li>
            <li><a href="<?=base_url('product/index')?>" class="nav-link px-2 link-dark">Товары</a></li>
            <li><a href="<?=base_url('user/index')?>" class="nav-link px-2 link-dark">Пользователь</a></li>
            <li><a href="<?=base_url('/index')?>" class="nav-link px-2 link-dark">Контрагент</a></li>
        </ul>

        <div class="col-md-3 text-end">
        <a href="<?=base_url('home/index')?>" class="nav-link px-2 link-dark"> <button type="button" class="btn btn-outline-primary me-2">ВЫЙТИ</button></a> 
        </div>
    </header>
</div>