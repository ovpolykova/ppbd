<!-- Страница товара (для администратора)|Кузнецов -->
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Товар</th>
                <th scope="col"></th>
                <!-- <th scope="col"></th> -->
            </tr>
        </thead>
        <tbody>

            <?php foreach ($product as $row)
            { ?>
            <tr>
                <th scope="row"><?=$row['ID_product']?></th>
                <td><?=$row['name_product']?></td>
                <td>
                    <!-- Триггер -->
                    <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#<?=$row['ID_product']?>">Изменить цену</button>
                    <!-- Модальное окно -->
                    <div class="modal fade" id="<?=$row['ID_product']?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="<?=base_url('product/upd_price_product')?>" method="post">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Изменить цену №<?=$row['ID_product']?> товара к прайс-листу</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-4">Тип прайс-листа</div>
                                            <div class="col-4">Валюта</div>
                                            <div class="col-4">Цена</div>
                                        </div>
                                        <?php $a = 1; $b = 0;?>
                                        <?php foreach ($price as $row1) { 
                                            if ($row1['ID_product']==$row['ID_product']) {
                                                $b++;?>
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

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
                <!-- <td>
                    <form action="<?=base_url('product/del_product')?>" method="post">
                        <button class="btn btn-outline-danger" name="ID_product" value="<?=$row['ID_product']?>">Удалить</button></td>
                    </form>
                </td> -->
            </tr>
            <?php }?>
            
        </tbody>


    </table>
</div>

