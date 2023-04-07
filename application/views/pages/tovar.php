<div class="container">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
<!-- Фильтры -->
<form class="row gy-2 gx-3 align-items-center" action="<?base_url('tovar/browse_tovar')?>" method="post">
    <div class="col-sm-3">
    <select class="form-select" name="ID_product">
        <?php foreach ($tova as $row) {?>
      <option value="<?=$row['ID_product']?>"><?=$row['name_product']?></option>
      <?php }?>
    </select>
  </div>
  
  <div class="col-auto">
    <button type="submit" class="btn btn-primary">Поиск</button>
    <a href="<?=base_url('tovar/browse_tovar')?>" class="btn btn-danger">Очистить</a>
  </div>
</form>
<br>
<hr>

<!-- Скрипт для пагинации -->
<script>
        $(document).ready(function () {
        $('#tovarss').DataTable();
    });
    </script>

        <table id="tovarss" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Наименование контрагент</th>
                <th scope="col">Наименование продукты</th>
    
            </tr>
        </thead>
        <tbody>
        <?php foreach ($tovars as $row) {?>
            <tr>
                <th scope="row"><?=$row['ID_order']?></th>
                <td><?=$row['contractor']?></td>
                <td><?=$row['name_product']?></td>

            </tr>
            <?php }?>
        </tbody>
    </table>


        </div>
        <div class="col-lg-1"></div>
    </div>
</div>