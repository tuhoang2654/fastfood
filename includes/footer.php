<?php
	include_once(CORE_PATH.'/Arr.php');
    include_once(CORE_PATH.'/Lang.php');
	include_once(BASE_PATH.'/../helpers/utils.php');
	use Core\Arr;
	
	// $lang = $_GET['lang']??'en';
	$lang = $_SESSION['lang'];
	// $lang = $_GET['lang'] ? 'en' 'vi';
	setLang($lang);
	
	?>
<div id="footer">
		<div class="ftr_img">
		<img src="IMAGES/logo-pizzahut.png">
		</div>
		<div class="ftr_container">
			<div class="ftr_container_ptr_1 ftr_ctn_flt">
				<div>
					<h4>
						<?php echo _text('about us'); ?>	
					</h4>
					<ul>
						<li>
							<b>Về chúng tôi</b>
						</li>
						<li>
							Lĩnh vực hoạt động
						</li>
						<li>
							Liên hệ với chúng tôi
						</li>
						<li>
							Tin tức - Sự kiện
						</li>
						<li>
							Quy định bảo hành - đổi trả
						</li>
					</ul>
				</div>
			</div>
			<div class="ftr_container_ptr_2 ftr_ctn_flt">
				<div>
					<h4>
						<?php echo _text('take care customers'); ?>
					</h4>
					<ul>
						<li>
							<b>Hướng dẫn mua hàng</b>
						</li>
						<li>
							Qui định đổi trả
						</li>
						<li>
							Chính sách bán hàng
						</li>
						<li>
							Chính sách bảo mật
						</li>
					</ul>
				</div>
			</div>
			<div class="ftr_container_ptr_3 ftr_ctn_flt">
				<div class="ttl">
					<h4>
					<?php echo _text('contact'); ?>
					</h4>
					<div>
						<h4>Tây Hồ - Hà Nội</h4>
					</div>
					<div class="icn">
						<ul>
							<li>
								<i class="fa fa-google-plus">
								</i>
							</li>
							<li>
								<i class="fa fa-facebook">
								</i>
							</li>
							<li>
								<i class="fa fa-youtube">
								</i>
							</li>
							<li>
								<i class="fa fa-twitter ">
								</i>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div style="clear: both;"></div>
		<div class="ftr_bnr">
			© 2023, Pizza Hut Store
		</div>
	</div>
</body>
</html>