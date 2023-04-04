<!-- Отчет списка подготовленных к доставке заказов |Харламов | НОВЫЙ!!!-->
<div class="container">
    <div class="row">
        <div class=""></div>
        <div class="col-lg-12">
<h1 style="text-align:center;">Cписка подготовленных к доставке заказов</h1>
        <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">ФИО</th>
                <th scope="col">Наименование контрагент</th>
                <th scope="col">Наименование продукт</th>
                <th scope="col">Количество</th>
                <th scope="col">Дата заказа</th>
                <th scope="col">Дата отправки</th>
             
                
            
            </tr>
        </thead>
        <tbody>
        <?php foreach ($otchter as $row) {?>
            <tr>
                <th scope="row"><?=$row['ID_order']?></th>
                <td><?=$row['fio']?></td>
                <td><?=$row['contractor']?></td>
                <td><?=$row['name_product']?></td>
                <td><?=$row['count']?></td>
                <td><?=$row['date_order']?></td>
                <td><?=$row['date_send']?></td>
           
                <td>
                    <form method="POST" action="<?=base_url('order/upd_order_doc')?>"><button class="btn btn-success" type="submit" value="<?=$row['ID_order']?>" name="ID_order"">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
  <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
</svg> Отправлен</button>
                    </form>
</td>


    
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