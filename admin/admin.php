	<?php
		session_start();
		if(isset($_SESSION['usr']['uid']))
		{
			include("includes/header.php");
		}
		else
		{
			 header('Location:login.php');
		}
		require("../includes/connect_db.php");
		include("../includes/check_errors.php");
	?>
	<div id="mid">
	    <div class="row" style="width: 100%;">
	        <div class="col-sm-2">
	            <?php
						if($_SESSION['usr']['vaitro']==2)
						{
							include('includes/menu_left1.php');
						}
						else if($_SESSION['usr']['vaitro']==1){
							include('includes/menu_left.php');
						}
						else if($_SESSION['usr']['vaitro']==3)
						{
							 include('includes/menu_left3.php');
						}
					?>
	        </div>
	        <div class="col-sm-10 contain_right">
	            <div style="background-color:white;margin-right: -29px;margin-left: -15px;color: black;padding: 40px;">
	                <div style="padding: 15px;border-bottom: solid #eee 1px;">
	                    <span style="font-size: 28px;font-weight: both;">Dashboard </span> <span
	                        style="color: #9d9d9d;"></span>
	                </div>
	                <div style="background-color:#f5f5f5;padding: 10px;margin-top: 2%;color: #9d9d9d;">
	                    <i class="fa fa-fw fa-dashboard"></i> Dashboard
	                </div>

	                <?php
					$query_sdh = "SELECT MONTH(ThoiGianDatHang) AS month, COUNT(*) AS sodh,sum(TongTien) as TongTien FROM donhang GROUP BY MONTH(ThoiGianDatHang)";
					$result_sdh = mysqli_query($dbc, $query_sdh);
					check_errors($result_sdh, $query_sdh);
					
					$donhang_list = array(); // Khởi tạo một mảng để lưu trữ danh sách đơn hàng
					
					while ($row = mysqli_fetch_assoc($result_sdh)) {
						$thang = $row['month'];
						$sodh = $row['sodh'];
						$tongtien = $row['TongTien'];
						$donhang_list[] = array('thang' => $thang, 'sodh' => $sodh, 'tongtien' => $tongtien);
					}

						
				?>

	                <div id="area-example-3">
	                    <table class="charts-css area multiple hide-data show-labels">

	                        <thead>
	                            <tr>
	                                <th scope="col"> Year </th>
	                                <th scope="col"> Progress 1 </th>
	                                <th scope="col"> Progress 2 </th>
	                                <th scope="col"> Progress 3 </th>
	                            </tr>
	                        </thead>
	                        <tbody>
	                            Số đơn bán được
	                            <div id="container">
	                                <div style="font-size:2em"> <?php echo $donhang_list[0]['sodh'] ?></div>
	                                <div style="font-size:2em"> <?php echo $donhang_list[1]['sodh'] ?></div>
	                                <div style="font-size:2em"> <?php echo $donhang_list[2]['sodh'] ?></div>
	                            </div>


	                            <tr>
	                                <th scope="row"> <?php echo $donhang_list[0]['thang']; ?> </th>
	                                <td style="--start: 0.1; --end: <?php echo $donhang_list[0]['sodh'] / 20; ?>;"><span
	                                        class="data"> 50 </span></td>
	                                <!-- <td style="--start: 0.0; --end: 0.2;"><span class="data"> 20 </span></td>
	                                <td style="--start: 0.2; --end: 0.4;"><span class="data"> 40 </span></td> -->
	                            </tr>
	                            <tr>
	                                <th scope="row"> <?php echo $donhang_list[1]['thang']; ?> </th>
	                                <td
	                                    style="--start: <?php echo $donhang_list[0]['sodh'] / 20; ?>; --end: <?php echo $donhang_list[1]['sodh'] / 20; ?>;">
	                                    <span class="data"> 50 </span>
	                                </td>
	                                <!-- <td style="--start: 0.2; --end: 0.5;"><span class="data"> 50 </span></td>
	                                <td style="--start: 0.4; --end: 0.1;"><span class="data"> 10 </span></td> -->
	                            </tr>
	                            <tr>
	                                <th scope="row"> <?php echo $donhang_list[2]['thang']; ?> </th>
	                                <td
	                                    style="--start: <?php echo $donhang_list[1]['sodh'] / 20; ?>; --end: <?php echo $donhang_list[2]['sodh'] / 10; ?>;">
	                                    <span class="data"> 50 </span>
	                                </td>
	                                <!-- <td style="--start: 0.5; --end: 0.3;"><span class="data"> 30 </span></td>
	                                <td style="--start: 0.1; --end: 0.2;"><span class="data"> 20 </span></td> -->
	                            </tr>
	                        </tbody>
	                    </table>
	                </div>


	                <div style="display:flex;justify-content:center;">
	                    <div id="bar-example-1">
	                        <table class="charts-css bar hide-data">

	                            <tbody>
	                                <tr>
	                                    <td style="--size:<?php echo $donhang_list[0]['thang']/10; ?> ;"><?php echo number_format(($donhang_list[0]['tongtien']),0,',','.'); ?><span class="data"> $ 20K </span></td>
										
	                                </tr>
	                                <tr>
	                                    <td style="--size:<?php echo $donhang_list[1]['thang']/10; ?>;"><?php echo number_format(($donhang_list[1]['tongtien']),0,',','.'); ?><span class="data"> $ 80K </span></td>
										
	                                </tr>
	                                <tr>
	                                    <td style="--size: <?php echo $donhang_list[2]['thang']/10; ?>;"><?php echo number_format(($donhang_list[2]['tongtien']),0,',','.'); ?><span class="data"> $ 100K </span></td>
										
	                                </tr>
	                            </tbody>
	                        </table>
	                    </div>
	                </div>
	            </div>
	        </div>

	    </div>
	</div>
	</div>
	</body>

	</html>