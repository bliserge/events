<?php require_once('../config.php'); ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>

<body
    class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed dark-mode sidebar-mini-md sidebar-mini-xs"
    data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
    <div class="wrapper">
        <?php require_once('inc/topBarNav.php') ?>
        <?php require_once('inc/navigation.php') ?>


        <div class="content-wrapper bg-dark pt-3" style="min-height: 567.854px;">

            <!-- Main content -->
            <section class="content  text-dark">
                <div class="container-fluid">


                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">Pay for Service </h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <colgroup>
                                    <col width="5%">
                                    <col width="20%">
                                    <col width="20%">
                                    <col width="15%">
                                    <col width="20%">
                                    <col width="15%">
                                    <col width="10%">
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date Time</th>
                                        <th>Owner Name</th>
                                        <th>Service Type</th>
                                        <th colspan="2">Fill Payment Form</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <?php
                                require_once('inc/conn_pay.php');
                                $i = 1;
                                $stmt = $conn->prepare("select * from service_requests where status = '0' ");
                                $stmt->execute();
                                $service = $stmt->fetchAll();
                                foreach ($service as $row) {

                                    ?>

                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $i++; ?>
                                            </td>
                                            <td>
                                                <?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?>
                                            </td>
                                            <td>
                                                <?php echo ucwords($row['owner_name']) ?>
                                            </td>
                                            <td class='text-center'>
                                                <?php echo ucwords($row['service_type']) ?>
                                            </td>
                                            <form method="post" action="" class="form-group">
                                                <td>
                                                    <input type="hidden" name="owner"
                                                        value="<?php echo $row['owner_name'] ?>">
                                                    <input type="hidden" name="dats"
                                                        value="<?php echo $row['date_created'] ?>">
                                                    <input type="hidden" name="serv"
                                                        value="<?php echo $row['service_type'] ?>">
                                                    <input type="hidden" name="sid" value="<?php echo $row['id'] ?>">
                                                    <input type="text" name="phone" class="form-control"
                                                        placeholder="Phone Number">
                                                <td>
                                                    <input type="Number" name="amount" class="form-control"
                                                        placeholder="2000 RWF">
                                                </td>

                                                </td>
                                                <td>
                                                    <button type="submit" name="pay" class="btn btn-primary">Charge</button>

                                                </td>                                          
                                               


                                            </form>
                                        </tr>

                                    </tbody>
                                <?php } ?>
                            </table>
                            <?php
                            include 'inc/conn_pay.php';
                            include 'pay_parse.php';
                            if (isset($_POST['pay'])) {

                                $servid = $_POST['sid'];
                                $customer = $_POST['owner'];
                                $date = $_POST['dats'];
                                $phone = $_POST['phone'];
                                $servtype = $_POST['serv'];
                                $price = $_POST['amount'];
                                $curl = curl_init();
                                $transID = uniqid();
                                $calback = "";
                                $phone1 = "$phone";

                                //REQUEST PAYMENT 
                                // var_dump('phone');
                                hdev_payment::api_id("HDEV-48d87cf2-c648-49c1-9c7c-a1a12dbc30eb-ID"); //send the api ID to hdev_payment
                                hdev_payment::api_key("HDEV-79d8e552-5bed-4f5a-9551-cd051e32e406-KEY");//send the api KEY to hdev_payment
                                $pay = hdev_payment::pay($phone1, $price, $transID, $calback); //finishing the transaction 

                                //var_dump($pay);//to get payment server response
                                $status = $pay->status; //get transaction status if sent or not
                                $message = $pay->message; //transaction message 
                                if ($status = 1) { //if the status is ok or true means the transaction is sent then
                                    // make query fhere 
                                    $insertQuery = mysqli_query($conn1, "INSERT INTO  `paid_services`( `service_id`, `owner`, `service_title`, `paid_dates`, `paid_phone`, `amount`, `transID`,`trans_status`)

                        VALUES ('$servid','$customer','$servtype','$date','$phone','$price','$transID','$status')");
                                    if ($insertQuery == 1) {
                                      //if the query was ok jump to the page 
                                        echo "<script>window.location='comfirm.php?'; </script>";
                                    } else {
                                        //if the query was not ok bring alert
                                        echo "<script>window.alert('failed to load querry'); window.location='payment.php'; </script>";

                                    }
                                } else {
                                    echo "<script>window.alert('transaction was not successfuly sent'); window.location='payment.php'; </script>";

                                }


                            }


                            ?>

                        </div>
                    </div>
                    <noscript>
                        <style>
                            .m-0 {
                                margin: 0;
                            }

                            .text-center {
                                text-align: center;
                            }

                            .text-right {
                                text-align: right;
                            }

                            .table {
                                border-collapse: collapse;
                                width: 100%
                            }

                            .table tr,
                            .table td,
                            .table th {
                                border: 1px solid gray;
                            }
                        </style>
                    </noscript>


                </div>
            </section>
        </div>




        <?php require_once('inc/footer.php') ?>
</body>

</html>
<script>
    //load data tables here
    $(document).ready(function(){
    $('.table').dataTable();
    })
    </script>