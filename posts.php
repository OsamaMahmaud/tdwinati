<?php
include('include/connection.php');
include('include/header.php');
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

            <div class="col-md-10 " >
                <div class="form-group"></div>
            <button class="btn-custom ">كل المقالات  </button>
            <?php
            $id =$_GET['id'];
            if(isset($id))
             {
                $query="delete from posts where id ='$id' ";
                $delet =mysqli_query($conn,$query);
                if(isset($delet))
                    {
                      echo '<div class="alert alert-success">' .'تم حذف المقال بنجاح'.'</div>';
                    }
                    else
                    {
                     echo'<div class="alert alert-danger">' .'عفوا حدث خطا ما'.'</div>';
                    }
                                                
             }
              ?>
             <table class="table table-orderd" >
                <tr style="background: var(--first-color); color:#fff; style='  ">
                    <th>رقم المقال</th>
                    <th>عنوان المقال</th>
                    <th>كاتب المقال</th>
                    <th>صوره المقال</th>
                    <th>تاريخ المقال</th>
                    <th>حذف المقال</th>

                </tr>
          
              <!-- Display posts -->
               <?php
                $quer="select * from posts order by id desc";

                $res=mysqli_query($conn,$quer);
                $no=0;
                if($res)
                {
                      while($row=mysqli_fetch_assoc($res))
                      {
                          $no++;
                          ?>
                              <tr style=' text-align:center;'>
                                  <td><?php echo $no ;?></td>
                                  <td><?php echo$row['postTitle'];?></td>
                                  <td><?php echo$row['podtAuthor'];?></td>
                                  <td><img src="uploads/<?php echo $row['postImage'];?>" width="10%"></td>
                                  <td><?php echo$row['postDate'];?></td>
                                  <td>
                                        <a  href='posts.php?id=<?php echo $row['id'];?>'>
                                               <button class ='btn-custom'>حذف التصنيف</button>
                                        </a>
                                  </td>
                                   

                              </tr>

                         <?php     
                      }
                    echo "</table>";
                }

               ?>
             </table>

            </div>


        </div>
    </div>
</div>
<!-- End content -->

    




<?php
include('include/footer.php');

?>