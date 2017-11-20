<?php include '../classes/NewsAddN.php';?>
<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
               <h2> Dashbord</h2>
               <div class="block">
	                <h2 style="text-align: center;">Hello <?php echo Session::get('adminUser');?></h2>               
	               <h2 style="text-align: center;">Welcome To The <span style="color: red">Global</span> Admin panel</h2> 

	               <table class="data display datatable" id="example">
					<thead>
						<tr">
							<th width="10%">Sl</th>
							<th width="20%">Title</th>
							<th width="15%">Category</th>
							<th width="10%">TotalHits</th>
						</tr>
					</thead>
					<tbody>
			<?php
				$news = new NewsAddN();
				$HitProduct = $news->getAllHitProduct();
				if ($HitProduct) {
					$i = 0;
					while ($result = $HitProduct->fetch_assoc()) {
						$i++;
			?>			
			
						<tr class="odd gradeX">
							<td style="text-align: center;"><?php echo $i;?></td>
							<td style="text-align: center;"><?php echo $result['news_title']; ;?></td>
							<td style="text-align: center;"><?php echo $result['category_title']; ;?></td>
							<td style="text-align: center;"><?php echo $result['hits'];?>(times)</td>
						</tr>

				   <?php } } ?> 		
					</tbody>
				</table>

               </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>