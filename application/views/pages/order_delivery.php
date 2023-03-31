<div class="container">
    <div class="row">
        <div class=""></div>
        <div class="col-lg-12">

        <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">ФИО</th>
                <th scope="col">Производство</th>
                <th scope="col">Наименование контрагент</th>
                <th scope="col">Наименование продукт</th>
                <th scope="col">Количество</th>
                <th scope="col">Дата заказа</th>
                <th scope="col">Дата отправки</th>
                <th scope="col">Статус</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($browesorder as $row) {?>
            <tr>
                <th scope="row"><?=$row['ID_order']?></th>
                <td><?=$row['fio']?></td>
                <td><?=$row['name_p']?></td>
                <td><?=$row['contractor']?></td>
                <td><?=$row['name_product']?></td>
                <td><?=$row['count']?></td>
                <td><?=$row['date_order']?></td>
                <td><?=$row['date_send']?></td>
                <td><?=$row['status']?></td>
                <td>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?=$row['ID_order']?>">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
</button>

<!-- Модальное окно -->
<div class="modal fade" id="<?=$row['ID_order']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Изменить статус</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body">
        
<form class="row g-3" action="<?=base_url('order/upd_order')?>" method="POST">
  <div class="col-12">
    <input type="hidden" name="ID_order" value="<?=$row['ID_order']?>">
    <label for="validationDefault04" class="form-label">Статус</label>
    <select class="form-select" id="validationDefault04" name="storder" required value="<?=$row['status']?>">
      <option value="Подготовен к доставку">Подготовен к доставку</option>
      <option value="Отправка">Отправка</option>
    </select>
  </div>
 
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Сохранить</button>
  </div>
</form>
      </div>
    </div>
  </div>
</div>
</td>  
            </tr>
            <?php }?>
        </tbody>
    </table>


        </div>
        <div class=""></div>
    </div>
</div>
