<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="#" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img class="bi me-2" src="<?=asset_url()?>/img/logo.jpg" alt="" width="30%" height="30%">
            <p>Добро пожаловать! Контрагент <b><br><?=$session['contractor']?></b></p>
        </a>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="<?=base_url('main/product')?>" class="nav-link px-2 link-secondary">Товары</a></li>
            <li><a href="<?=base_url('order/browse_product_zakaz')?>" class="nav-link px-2 link-secondary">Мои заказы</a></li>
            
        </ul>
        <div class="col-md-3 text-end">
        <a href="<?=base_url('main/exit')?>" class="nav-link px-2 link-dark"> <button type="button" class="btn btn-outline-primary me-2">ВЫЙТИ</button></a> 
        </div>
    </header>
</div>