<!-- Страница прайс-листа (для администратора) с модал. окна – добавить прайс-лист|Кузнецов -->
<div class="container">
    <h1 class="display-3 text-center mb-5">Прайс-лист</h1>
    <div class="row">

    <div class="col-2">
        <h3 class="text-center">Фильтр</h3>
        <form action="<?=base_url('price/browse_price')?>">
            <input type="hidden" name="filter" value="1">
            <?php foreach($group as $row) {?>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="<?=$row['ID_group']?>">
                <label class="form-check-label" for="<?=$row['ID_group']?>"><?=$row['name_g']?></label>
            </div>
            <?php }?>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mb-3">Поиск</button><br>
                <a href="<?=base_url('price/browse_price')?>" class="btn btn-danger">Очистить</a>
            </div>
        </form>
    </div>

    <div class="col-10">
        <div class="accordion">
            <?php $a=1; $b=1?>
            <?php foreach($product as $row) {
                $b++;?>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?=$b?>" aria-expanded="false" aria-controls="collapseThree">
                            <?=$row['name_product']?>
                        </button>
                    </h2>
                    <div id="<?=$b?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            
                            <form action="<?=base_url('price/upd_price_product')?>" method="post">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-4">Тип прайс-листа</div>
                                        <div class="col-4">Валюта</div>
                                        <div class="col-4">Цена</div>
                                    </div>
                                    <?php $a = 1?>
                                    <?php foreach ($price as $row1) { 
                                        if ($row1['ID_product']==$row['ID_product']) {?>
                                        <input type="hidden" name=<?="value".$a++?> value="<?=$row1['ID_list']?>">
                                        <div class="row">
                                            <div class="col-md-4"> 
                                                <label for="" class="form-label"></label>
                                                <input type="text" class="form-control" placeholder="<?=$row1['type_t']?>" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="form-label"></label>
                                                <select class="form-select" name="<?="value".$a++?>">
                                                    <option value="<?=$row1['ID_valuta']?>" selected><?=$row1['valuta']?></option>

                                                    <?php foreach ($valuta as $row2) {?>
                                                    <option value="<?=$row2['ID_valuta']?>"><?=$row2['valuta']?></option>
                                                    <?php }?>

                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="" class="form-label"></label>
                                                <input type="number" class="form-control" name="<?="value".$a++?>" min="0" step="0.01" value="<?=$row1['price']?>">      
                                            </div>
                                        </div>
                                    <?php } 
                                    }?>  
                                </div>
                                <input type="hidden" name="count_list" value="<?=$b?>">
                                <br>

                                <div class="text-end">
                                    <!-- Кнопка-триггер модального окна -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?=$b?>">
                                        Добавить тип прайс-листа
                                    </button>

                                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                                </div>

                            </form>
                                <!-- Модальное окно -->
                                <form action="<?=base_url('price/add_price')?>" method="post">
                                    <div class="modal fade" id="modal<?=$b?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$row['name_product']?></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <input type="hidden" name="ID_product" value="<?=$row['ID_product']?>">
                                                    <div class="row">
                                                        <div class="col-4">Тип прайс-листа</div>
                                                        <div class="col-4">Валюта</div>
                                                        <div class="col-4">Цена</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label"></label>
                                                            <select class="form-select" name="ID_type_t">

                                                                <?php foreach ($type_t as $row) {?>
                                                                <option value="<?=$row['ID_type_t']?>"><?=$row['type_t']?></option>
                                                                <?php }?>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label"></label>
                                                            <select class="form-select" name="ID_valuta">

                                                                <?php foreach ($valuta as $row) {?>
                                                                <option value="<?=$row['ID_valuta']?>"><?=$row['valuta']?></option>
                                                                <?php }?>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class="form-label"></label>
                                                            <input type="number" class="form-control" name="price" min="0" step="0.01">      
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
    </div>
</div>