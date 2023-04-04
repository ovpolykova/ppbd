<!-- Страница товара (для контрагента)|Волобуев -->
<div class="container">
    <div class="row">
        <div class="col-2">
            <!-- Поиск -->
            
            <h3 class="text-center">Фильтр</h3>
            <form action="<?=base_url('main/product')?>" method="post">
                <div class="mb-3 mt-3">
                    <input class="form-control me-2" type="search" placeholder="Поиск" name="search" value="<?php if (isset($filter['search'])) echo $filter['search'];?>">
                </div>
                
                <?php $c = 0;
                    foreach($group as $row) {
                    if (isset($filter[$c++]) != NULL) {?>
                        <div class="form-check mb-3">
                            <label class="form-check-label" for="<?=$row['ID_group']?>"><?=$row['name_g']?></label>
                            <input class="form-check-input" type="checkbox" name="<?=$row['ID_group']?>" value="<?=$row['ID_group']?>" checked>
                        </div>
                    <?php } else {?>
                        <div class="form-check mb-3">
                            <label class="form-check-label" for="<?=$row['ID_group']?>"><?=$row['name_g']?></label>
                            <input class="form-check-input" type="checkbox" name="<?=$row['ID_group']?>" value="<?=$row['ID_group']?>">
                        </div>
                    <?php }
                }?>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mb-3">Поиск</button><br>
                </div>
                
                <!-- НУЖНО ДЛЯ РАБОТЫ ПАГИНАЦИИ И ФИЛЬТРА! -->
                <input type="hidden" name="true" value="true">

            </form>
        </div>
        <div class="col-10">
            <!-- Список товаров  -->
            <div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
            <?php foreach($product as $row)
            { ?>
                <div class="col">
                    <div class="card text-center h-100">
                    <img src="/assets/img/<?=$row['image']?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?=$row['name_product']?></h5>
                        <a href="<?=base_url('order/browse_product_zakaz')?>" class="btn btn-primary">Купить</a>
                    </div>
                    </div>
                </div>
            <?php }?>
            </div>
            <?=$this->pagination->create_links();?>
        </div>
    </div>

</div>
