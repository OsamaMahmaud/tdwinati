<?php

include('include/connection.php');
include ('include/header.php');




?>


<style>

.display-cat
{
    margin-top:50px;
}

.dissplay-cat tr:first-child
{
    text-align: right;

}

</style>


<!-- strat content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-2" id="side-area">
                 <!-- start categories -->
                 <div class="categories">
                    <h4>لوحه التحكم</h4>
                    <ul>
                        <li>
                            <a href="">
                                <span><i class="fas fa-tags"></i></span>
                                <span>التصنيفات </span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span><i class="fas fa-tags"></i></span>
                                <span>المقالات</span>
                            </a>
                        </li>
                        <li>
                            <a href="new-post.php">
                                <span><i class="fas fa-tags"></i></span>
                                <span>مقال جديد</span>
                            </a>
                        </li>
                        <li>
                            <a href="posts.php">
                                <span><i class="fas fa-tags"></i></span>
                                <span>كل المقالات</span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php">
                                <span><i class="fas fa-tags"></i></span>
                                <span>عرض الموقع</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span><i class="fas fa-tags"></i></span>
                                <span>تسجيل الخروج</span>
                            </a>
                        </li>
                    </ul>

            </div>
            <!-- end categories -->
            </div>

            <div class="col-md-10" >

               <div class="add-category" >
                    <?php              
                        $cName =$_POST['category'];
                        $cAdd =$_POST['add'];
                        $id =$_GET['id'];

                        if(isset($cAdd))
                        {
                            if(empty($cName))
                            {
                                echo"<div class='alert alert-danger'>"."حقل التصنيف فارغ"."</div>";
                            }
                            elseif($cName >100)
                            {
                                echo"<div class='alert alert-danger'>"."اسم التصنيف كبير"."</div>";
                            }

                            else
                            {
                                $query="insert into categories (categoryName)value('$cName')";
                                $res=mysqli_query($conn,$query);
                                echo "<div class='alert alert-success'>"."تم اضافه التصنيف بنجاح"."</div>";
                            }
                        }

                        if(isset($id))
                        {
                            $query="delete from categories where id ='$id' ";
                            $delet =mysqli_query($conn,$query);
                            if(isset($delet))
                                {
                                    echo '<div class="alert alert-success">' .'تم حذف التصنيف بنجاح'.'</div>';
                                }
                                else
                                {
                                    echo'<div class="alert alert-danger">' .'عفوا حدث خطا ما'.'</div>';
                                }
                                
                        }

                    ?>
                    <form action="categories.php" method="POST">
                        <div class="form-group">
                            <label for="category"> تصنيف جديد</label>
                            <input type="text" name="category" id="category" class="form-control">
                        </div>
                        <button  class=" btn-custom form-control" name='add'>اضافه</button>
                    </form>
               </div>

               <div class="display-cat">
                   
                  <table class=" table">
                    <tr style="background:var(--first-color); color:#fff;">
                        <th>رقم الفئه</th>
                        <th>اسم الفئه</th>
                        <th>تاريخ الاضافه</th>
                        <th>حذف التصنيف</th>
                    </tr>
                    
                    <?php
                     $query=" SELECT * FROM categories ORDER by id DESC";
                     $result =mysqli_query($conn,$query);
                      $no=0;
                      if($result)
                      {
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $no++;
                                echo "<tr>
                                        <td>".$no."</td>
                                        <td>".$row['categoryName']."</td>
                                        <td>".$row['categoryDate']."</td> 
                                        <td>
                                            <a  href='categories.php?id=".$row['id']."'>
                                               <button class ='btn-custom'>حذف التصنيف</button>
                                            </a>
                                         </td>
                                    </tr>";


                                    
                            }
                          echo "</table>";
                      }
                     

                     
                    

                    ?>
                  
               </div>

            </div>


        </div>
    </div>
</div>
<!-- End content -->

    
    









<?php


include ('include/footer.php');


?>