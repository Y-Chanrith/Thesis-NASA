<?php
session_start();
include("../check-login.php");
include '../connection.php';

// $sql = "SELECT * FROM transaction";

// var_dump(mysqli_fetch_assoc($result));

include '../include/navigation.php';

include '../include/header.php';
?>
<!------main-content-start----------->

<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrapper">

                <div class="table-title rounded">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2 class="ml-lg-2">Sales List</h2>
                        </div>

                        <!-- ============ filter ================ -->
                        <div class="col-sm-7">
                            <form action="" method="GET">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="date" required name="date" value="<?= isset($_GET['date']) == true ? $_GET['date']:'' ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <select name="payment" required class="form-control p-2">
                                            <option value="">Select Payment</option>
                                            <option value="cash"
                                            <?= isset($_GET['payment']) == true ? ($_GET['payment']== 'cash'? 'selected':''):'' ?>
                                            >Cash</option>
                                            <option value="bank transfer"
                                            <?= isset($_GET['payment']) == true ? ($_GET['payment']=='bank transfer'? 'selected':''):'' ?>
                                            >Bank Transfer</option>
                                            <option value="Credit Card"
                                            <?= isset($_GET['payment']) == true ? ($_GET['payment']=='Credit Card'? 'selected':''):'' ?>
                                            >Credit Card</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <button type="submit" class="btn btn-primary">Filter</button>
                                        <a href="sale.php" class="btn btn-secondary">Reset</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- ============ end filter ================= -->
                    </div>
                </div>
                <div>
                </div>
                <table class="table table-striped table-hover mt-2 ">
                <!-- <div class="col-md-5 col-lg-3 order-3 order-md-2 mt-2">
                        <div class="xp-searchbar">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="input-group" style="left: 331%;">
                                    <input type="search" class="form-control" name="search" placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit" id="button-addon2">Go
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div> -->
                        <br>
                    </div>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>payment Method</th>
                            <th>Customer</th>
                            <th># of Items</th>
                            <th>Total amount</th>
                            <th>Date of Sell</th>
                            <!-- <th>Due</th> -->
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- ============ search php code ============== -->
                        <?php

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $search = $_POST["search"];

                                // Perform the search query
                                $sql = "SELECT * FROM customer inner join transaction on customer.cus_id=transaction.cust_id WHERE firstname LIKE '%$search%'";
                                $result = mysqli_query($con, $sql); // $connection is your database connection

                                // Check for errors
                                if (!$result) {
                                    die("Query failed: " . mysqli_error($con));
                                }

                                // Display the search results
                                // while ($row = mysqli_fetch_assoc($result)) {
                                //     echo "Product Name: " . $row["firstname"] . "<br>";
                                //     echo "Product Description: " . $row["lastname"] . "<br>";
                                //     // Add more fields as needed
                                // }

                                // // Close the database connection
                                // mysqli_close($con);
                            }
                            // =================== end of search code ===================
                        ?>

                        <?php
                        $page=!isset($_GET['page'])||$_GET['page'] ==1 ? 1:$_GET['page'];

                        $offset=0;
                        if(!isset($_GET['page']) || $_GET['page']==1){
                            $offset=0;
                        }else{
                            $page=$page-1;
                            $offset=$page*10;
                        }

                        // filter sale list
                        // end filter sale ===========
                         // old code ===============
                        $sql = "SELECT * FROM transaction ";
                        $result = mysqli_query($con, $sql);
                        $counter=count($result->fetch_all());

                        if(isset($_GET['date']) && isset($_GET['payment'])){
                        $sql = "SELECT * FROM transaction where created_at='". $_GET['date']."' and payment_method='".$_GET['payment']."' limit 10 offset ".$offset;

                        }else{

                            $sql = "SELECT * FROM transaction limit 10 offset ".$offset;
                        }
                        //  inner join transaction_detail  on transaction.id=transaction_detail.transac_id
                        //  inner join customer on transaction.cust_id=customer.cus_id ;
                        $result = mysqli_query($con, $sql);
                        $count = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $customer_sql="select firstname,lastname,cus_id from customer where cus_id=".$row['cust_id'];
                            $cus_re = mysqli_query($con, $customer_sql);
                            $customer=$cus_re->fetch_assoc();

                        ?>
                            <tr>
                                <td><?php echo$count; ?></td>
                                <td style="color: darkblue;"><?php echo $row['payment_method']; ?></td>
                                <td><?php echo $customer['firstname']; ?> <?php echo $customer['lastname']; ?></td>
                                <td><?php echo $row['quantity']; ?> Pcs</td>
                                <td>$ <?php echo $row['grandtotal']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <!-- <td><?php //echo $row['due_amount']; ?></td> -->
                                <th>
                                    <a href="transaction_view.php?transac_id=<?=$row['id'] ?>&customer_id=<?=$customer['cus_id'] ?>&discount=<?=$row['discount'] ?? 0 ?>" class=""><i class="fas fa-eye" style="color: #149935;"></i></a>
                                    <a href="invoice.php?id=<?=$row['id']?>&customer_id=<?=$row['cust_id'] ?>&discount=<?=$row['discount'] ?? 0 ?>"><i class="fas fa-print" style="color: #ff0000;"></i></a>
                                </th>
                            </tr>

                        <?php
                            $count++;
                        }
                        ?>
                    </tbody>
                </table>

                <div class="clearfix">
                    <div class="hint-text">showing <b>5</b> out of <b>10</b></div>
                    <ul class="pagination">
                        <!-- <li class="page-item disabled"><a href="#">Previous</a></li> -->
                        <?php
                        $i=0;
                        for($i;$i<$counter/10;$i++):
                        ?>
                        <li class="page-item <?php  echo (!isset($_GET['page'] ))|| $_GET['page']==$i+1?'active': '';?> " ><a href="sale.php?page=<?=$i+1 ?>" class="page-link"><?=$i+1 ?></a></li>
                        <!-- <li class="page-item "><a href="sale.php?page=2" class="page-link">2</a></li>
                        <li class="page-item "><a href="sale.php?page=3" class="page-link">3</a></li> -->
                        <!-- <li class="page-item "><a href="sale.php?page=5" class="page-link">Next</a></li> -->
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!------main-content-end----------->
    <?php
    include '../include/footer.php';
    ?>

</div>
</div>
<!-------complete html----------->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $(".xp-menubar").on('click', function() {
            $("#sidebar").toggleClass('active');
            $("#content").toggleClass('active');
        });

        $('.xp-menubar,.body-overlay').on('click', function() {
            $("#sidebar,.body-overlay").toggleClass('show-nav');
        });

    });
</script>

</body>

</html>

