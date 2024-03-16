<?php

include('include/connection.php');
include ('include/header.php');


?>


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
                            <a href="categories.php">
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
                            <a href="">
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


            <div class="col-md-10"  id="main-area">

                <button class="btn-custom">مقال جديد</button>

               <div class="add-category">
                    <?php
                       $pTitle    =$_POST['title'];
                       $pCategory =$_POST['category'];
                       $pContent  =$_POST['content'];
                       $bAdd      =$_POST['add'];
                       // $postImage ="image";
                       $imageName=$_FILES['postImage']['name'];
                       
                       $imageTmp =$_FILES['postImage']['tmp_name'];
                       
                       if(isset($bAdd))
                       {
                           if(empty($pTitle) && empty($pContent))
                           {
                               echo"<div class='alert alert-danger'>"." الرجاء ملء الحقول"."</div>";
                           }
                       
                           elseif ($pContent > 10000) {
                               
                               echo"<div class='alert alert-danger'>"." محتوي المنشور كبير جدا"."</div>";
                           }
                       
                           else
                           {
                               $postImage =rand(0,1000)."_".$imageName;
                               move_uploaded_file($imageTmp,"uploads\\".$postImage);
                               $query ="insert into posts(postTitle,postCat,postContent,postImage)values('$pTitle','$pCategory','$pContent','$postImage')";
                               $resu= mysqli_query($conn,$query);
                       
                               if(isset($resu))
                               {
                                   echo "<div class='alert alert-success'>" ."تم اضافه المنشور بنجاح "."</div>";
                               }
                       
                           }
                       }
                       
                       
                    ?>
                    <form action="new-post.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title"> عنوان المقاله</label>
                                <input type="text" name="title" id="category" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="cate">التصنيف</label>
                                <select name="category" id="cate" class="form-control" >

                                   <?php
                                     
                                     $query ="select * from categories";
                                     $resu= mysqli_query($conn,$query);

                                     while($raw=mysqli_fetch_assoc($resu))
                                     {

                                         echo "<option>".$raw['categoryName']."</option>";
                                     }
                                   ?>
                                  
                                </select>
                            </div>

                           <div class="form-group">
                                <label for="image">صوره المقال</label>
                                <input type="file" name="postImage" id="image" class="form-control">
                          </div>

                          <div class="form-group">
                            <label for="content">نص المقال</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                      </div>

                        <button name="add" class=" btn-custom form-control">نشر المقاله</button>
                    </form>
               </div>

            </div>


        </div>
    </div>
</div>
<!-- End content -->

    


<?php


include ('include/footer.php');


?>