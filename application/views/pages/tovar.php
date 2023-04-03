<div class="container">
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
<!-- Фильтры -->
<form class="row gy-2 gx-3 align-items-center">
    <div class="col-sm-3">
    <select class="form-select" id="autoSizingSelect">
      <option value="">Choose...</option>
      <option value="1">One</option>
    </select>
  </div>
  
  <div class="col-auto">
    <button type="submit" class="btn btn-primary">Поиск</button>
  </div>
</form>
<br>

        <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Наименование контрагент</th>
                <th scope="col">Тип контрагент</th>
                <th scope="col">Юр. адрес</th>
                <th scope="col">Дата договора</th>
                <th scope="col">ИНН</th>
                <th scope="col">КПП</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($tovars as $row) {?>
            <tr>
                <th scope="row"><?=$row['ID_contract']?></th>
                <td><?=$row['contractor']?></td>
                <td><?=$row['type_c']?></td>
                <td><?=$row['address_c']?></td>
                <td><?=$row['date_c']?></td>
                <td><?=$row['inn']?></td>
                <td><?=$row['kpp']?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>


        </div>
        <div class="col-lg-1"></div>
    </div>
</div>