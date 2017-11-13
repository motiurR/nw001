<?php include '../classes/Columnistnews.php';?>

<?php
    $fm = new Format();
    $colN = new Columnistnews();
?>

<?php
    if (isset($_GET['status'])) {
        $id = $_GET['status'];
        $changeColStatus =$colN->changenColNStatusById($id);
        echo "<script>window.location = 'columnlistnewslist.php';</script>";
    }
?>
<?php
    if (isset($_GET['delcolNews'])) {
        $id = $_GET['delcolNews'];
        $delColNewsbyid =$colN->getdelDataColNewsById($id);
    }
?>

<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block"> 
                <?php
                    if (isset($delColNewsbyid)) {
                        echo $delColNewsbyid;
                    }
               ?>  
               <?php
                    if (isset($changeColStatus)) {
                        echo $changeColStatus;
                    }
               ?>            
                    <table class="data display datatable" id="example">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>News Title</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
            <?php
                $getColNews = $colN->getAllColNews();
                if ($getColNews) {
                    $i = 0;
                    while ($result = $getColNews->fetch_assoc()) {
                        $i++;
            ?>
                        <tr class="odd gradeX">
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['news_title']?></td>
                            <td><?php echo $result['author']?></td>

                            <td>
                                <a href="?status=<?php echo $result['columnistn_id']?>" onclick="return confirm('Are You Sure Want To Change?') " style="color:<?php echo $result['status']?'green':'red'; ?>"><?php echo $result['status']?'active':'in-active'; ?></a>
                            </td>

                            <td><a href="colnewsnedit.php?colnewsid=<?php echo $result['columnistn_id']?>">Edit</a> 
                 <?php if (Session::get('level') == '0') { ?> <!-- admin hole del kora jabe -->

                            || <a onclick="return confirm('Are You Sure Want To Delete?') " href="?delcolNews=<?php echo $result['columnistn_id']?>">Delete</a>

                        <?php } ?>    
                            </td>
                        </tr>
                <?php } } ?>        
                    </tbody>
                </table>
               </div>
            </div>
        </div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>

<?php include 'inc/footer.php';?>

