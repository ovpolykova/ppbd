<!-- Страница товара (для контрагента)|Волобуев -->
<div class="container">

    <!-- Список товаров 
    <div class="col-md-3">
        <form action="<?=base_url('product/browse_product')?>" method="GET">
            <div class="card shadow mt-3">
                <div class="card-header">
                    <h5>Фильтр
                        <button type="submit" class="btn btn-primary btn-sm float-end">Найти</button>
                    </h5>
                </div>
                <div class="card-body">
                    <h6>Группа товаров</h6>
                    <hr>
                    <?php
                        
                        if(($result)> 0)
                        {
                            foreach($result as $row)
                            {
                                $checked = [];
                                if(isset($_GET['`group`']))
                                {
                                    $checked = $_GET['`group`'];
                                }
                                ?>
                                    <div>
                                        <input type="checkbox" name="`group`[]" value="<?= $row['ID_group']; ?>" 
                                            <?php if(in_array($row['ID_group'], $checked)){ echo "checked"; } ?>>
                                            
                                        <?= $row['name_g']; ?>
                                    </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "Никаких брендов не найдено";
                        }
                    ?>
                </div>
            </div>
            <br>
        </form>
    </div> -->
    
    <div class="row row-cols-1 row-cols-md-4 g-4">
    <?php foreach($result as $row)
    { ?>
        <div class="col">
            <div class="card text-center h-100">
            <img src="/assets/img/<?=$row['image']?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?=$row['name_product']?></h5>
                <p class="card-text"><?=$row['price']?> <?=$row['valuta']?></p>
                <a href="<?=base_url('order/browse_product_zakaz?ID_list='.$row['ID_list'])?>" class="btn btn-primary">Купить</a>
            </div>
            </div>
        </div>
    <?php }?>
    </div>
    
</div>
