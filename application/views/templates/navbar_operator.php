<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="<?=base_url('home/index')?>" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img class="bi me-2" src="<?=asset_url()?>/img/logo.jpg" alt="" width="30%" height="30%">
            <p><b>Добро пожаловать, Оператор! ФИО</b></p>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="<?=base_url('contract/browse_contract')?>" class="nav-link px-2 link-secondary">Справочник контрагентов</a></li>
            <li><a href="<?=base_url('order/browes_order')?>" class="nav-link px-2 link-dark">Заказ</a></li>
            <li><a href="<?=base_url('order/rep_delivery')?>" class="nav-link px-2 link-dark">Отчет доставка заказа</a></li>
            
        </ul>

        <div class="col-md-3 text-end">
        <a href="<?=base_url('main/index')?>" class="nav-link px-2 link-dark"> <button type="button" class="btn btn-outline-primary me-2">ВЫЙТИ</button></a> 
        </div>
    </header>
</div>