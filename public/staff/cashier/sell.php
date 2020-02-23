<?php require_once ('../../../private/initialize.php'); ?>
    <?php
$item_names = [];
$item_ids = [];
$item_prices = [];
$stock_items = find_all_items(['tb_name' => 'stock']);
$target_date = new DateTime();
/* when user selects "days" in graph dropdown menu 
*save sum sales of each of last 7 day in arrays
*plot then on graph
*and the same applys for week and week 
*
*
*
*1.get current day save in a var
*2.call find_total_sales_on_day(['tb_name' => 'sales','day'=> $target_day]) on each of the days 
*3.save return number in array plot that
*month=> find_total_sales_on_month()
*week=> find_total_sales_btn_days()
*
*/

/**
 * most sold product(day,week,month,all time)
 * count number of rows wea name is similar return assoc array with item name against number of instances
 *  
 */

 /**
  * most profitable product(day,week,month,all time)
  */

// $sales = find_all_items_on_date(['tb_name' => 'sales','date'=> $target_date]);
while ($stock_item = mysqli_fetch_assoc($stock_items))
{
    array_push($item_names, $stock_item['name']);
    array_push($item_ids, $stock_item['id']);
    array_push($item_prices, $stock_item['sale_price']);
}
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <?php require_once('../../../private/shared/commn_header_links.php'); ?>
        </head>

        <body >
        <div class="wrapper">
        
        <div class="content-wrapper">
            <section class="content-header">            
            </section>
            <!-- -->
            <section class="content">                       
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">item</h3>
                        </div>
                        <form action="sell.php" method="post" class="card-body" id="itemForm">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">name</label>
                                <div class="col-sm-7">
                                <select id="name" class="form-control select2bs4" style="width: 100%;"  onchange="getQty()">
                                    <?php                                     
                                    foreach ($item_names as $item_name) {
                                      echo "<option>".$item_name."</option>";                                      
                                      }                                    
                                    ?>
                                    </select>                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quantity" class="col-sm-2 col-form-label">quantity</label>
                                <div class="col-sm-7">
                                
                                <input id="quantity" class="form-control" type="number" placeholder="0.00" onclick="this.select();" onchange="calcToto()">
                                  
                
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-2 col-form-label">price</label>
                                <div class="col-sm-7">
                                <div class="input-group mb-3">
                                    <input id="price" class="form-control" type="number" placeholder="0.00" disabled>
                                    <div class="input-group-append">
                                      <span class="input-group-text">SHS</span>
                                  </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">total price</label>
                                <div class="col-sm-7">
                                <div class="input-group mb-3">
                                    <input id="total_price" class="form-control" type="text" placeholder="0.00" readonly>
                                    <div class="input-group-append">
                                      <span class="input-group-text">SHS</span>
                                  </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-success float-right" value="submit">submit</button>
                        </form>
                        <button type="button" id="4ere" class="btn bg-gradient-success float-right" onclick="appendTR()">submit</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Items</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>name</th>
                                        <th>quantity</th>
                                        <th style="width: 40px">price</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody"></tbody>
                                <tfoot><tr></tr></tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
             
            </section>   
            </div>
            </div>
     
        <!-- /.card -->    

            <?php require_once('../../../private/shared/cmn_scripts.php'); ?>
                <script>
               


                let item_prices = [<?php echo '"'.implode('","', $item_prices).'"'?>];
                let item_names = [<?php echo '"'.implode('","', $item_names).'"'?>];
                const inptprc = document.querySelector("#price");
                      const inptqty = document.querySelector("#quantity");
                      const nameBox = document.querySelector("#name");
                      const inptToto = document.querySelector("#total_price");

                    function getRandomInt(max) {
                        return Math.floor(Math.random() * Math.floor(max));
                    }
                    let staff = document.querySelector("#itemForm").querySelectorAll("input");
                    let nodeArray = Array.from(staff)
                    staff.forEach(s => {
                        s.addEventListener("keydown", function(event) {
                            if (event.key === "Enter") {
                                event.preventDefault();
                                if (nodeArray.indexOf(s) !== (nodeArray.length)) {
                                    nodeArray[nodeArray.indexOf(s) + 1].focus();
                                    // Do more work)
                                } else {
                                    s.closest('form').submit();
                                }
                            }
                        });
                    });

                    let tbody = document.querySelector('#tbody');
                    const getDefaultCurrency = () => {};
                    const appendTR = () => {
                        let counter = tbody.rows.length;
                        let itemName = nameBox.value || 'someItem';
                        let quantity = inptqty.value;
                        let tt = inptToto.value;
                        let currencySymbol = getDefaultCurrency() || ' UGX'
                        let rowString = '<tr><td>';
                        rowString += counter + 1;
                        rowString += '</td><td>';
                        rowString += itemName;
                        rowString += '</td><td><div>';
                        rowString += quantity;
                        rowString += '</div></td><td><span class="badge bg-primary">'
                        rowString += tt;
                        rowString += currencySymbol;
                        rowString += '</span></td></tr>';
                        tbody.insertAdjacentHTML('afterbegin', rowString);
                    };

                    $(function() {
                        //Initialize Select2 Elements
                        $('.select2').select2()
                        //Initialize Select2 Elements
                        $('.select2bs4').select2({
                            theme: 'bootstrap4'
                        })
                        //Bootstrap Duallistbox
                        $('.duallistbox').bootstrapDualListbox()
                        $("input[data-bootstrap-switch]").each(function() {
                            $(this).bootstrapSwitch('state', $(this).prop('checked'));
                        });
                    })

                    const getQty = ()=>{
                      inptprc.value = item_prices[item_names.indexOf(nameBox.options[nameBox.selectedIndex].text)];
                      inptqty.value= 1; 
                      calcToto();
                    } 
                    const calcToto = ()=>{                      
                      inptToto.value = inptqty.value*inptprc.value
                    }
                </script>
        </body>

        </html>