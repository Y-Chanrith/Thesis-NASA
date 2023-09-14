<?php
    session_start();
    include("../check-login.php");
    include("../connection.php");
    $pic_uploaded = 0;
?>
          <!-- Page Content -->
          <div class="col-lg-12">
            <?php
              $pro_name = htmlspecialchars($_POST['pro_name']);
              $pro_brand = $_POST['pro_brand'];
              $description = $_POST['description'];
              $pro_price = $_POST["pro_price"];
              $stock = $_POST["stock"];
              $cat = $_POST['category'];
              $sup = $_POST['supplier'];
              $dats = $_POST['datestock']; 
              $image = time().$_FILES["image"]['name'];

              if(move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT']. '/thesis/image/' .$image)){
                $target_file = $_SERVER['DOCUMENT_ROOT']. '/thesis/image/' .$image;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $picname = basename($_FILES['image']['name']);
                $photo = time().$picname;
                if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png"){
                  ?>
                  <script>
                    alert("Please upload photo having extension .jpg/ .jpeg/ .png");
                  </script>
                  <?php
                }
                else if($_FILES['pic']["size"] > 20000000){
                  ?>
                  <script>
                    alert("Ur photo exceed the size of 2 mb");
                  </script>
                  <?php
                }
                else{
                  $pic_uploaded = 1;
                }
          
                }
        
              switch($_GET['action']){
                case 'add':  
                // for($i=0; $i < $qty; $i++){

                  if($pic_uploaded == 1){
                    $query = "INSERT INTO product
                    (id, pro_name, brand, description, price, stock, CATEGORY_ID, SUPPLIER_ID, date_in_stock, image)
                    VALUES (Null,'{$pro_name}','{$pro_brand}','{$description}',{$pro_price},{$stock},{$cat},'{$sup}','{$dats}','{$image}')";
                      $result = mysqli_query($con,$query)or die ('Error in updating product in Database '.$query);
                  //     }
                  // break;
                  if($result){
                      header("Location: product.php");
                  }else{
                      echo "Error!";
                  }
                  }
                  
              }
            ?>
              <!-- <script type="text/javascript">window.location = "product.php";</script> -->
          </div>
