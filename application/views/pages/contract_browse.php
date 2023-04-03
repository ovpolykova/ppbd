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

 <!-- Скрипт для пагинации -->
 <script>
        $(document).ready(function () {
        $('#conctant').DataTable();
    });
    </script>
        <table id="conctant" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">Наименование контрагент</th>
                <th scope="col">Адрес</th>
                <th scope="col">Кол-во</th>
                <th scope="col">Дата заказа</th>
                <th scope="col">Дата доставке</th>
                <th scope="col">ИНН</th>
                <th scope="col">КПП</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($contract as $row) {?>
            <tr>
                <th scope="row"><?=$row['ID_contract']?></th>
                <td><?=$row['contractor']?></td>
                <td><?=$row['address_c']?></td>
                <td><?=$row['count']?></td>
                <td><?=$row['date_order']?></td>
                <td><?=$row['date_send']?></td>
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