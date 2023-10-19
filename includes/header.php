<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta charset="UTF-8">
    <title>Pizza Hut</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./CSS/mycss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="JAVASCRIPT/pbjquery.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <script src="JAVASCRIPT/jquery1.js" type="text/javascript"></script>
    <script src="JAVASCRIPT/jquery2.js" type="text/javascript"></script>
    <link rel="icon" href="IMAGES/logo-pizzahut.png" type="image/x-icon">
</head>

<body>
    <?php
	define('BASE_PATH',dirname(__FILE__));
	define('CORE_PATH',BASE_PATH.'/../core');
	include_once(CORE_PATH.'/Arr.php');
	include_once(CORE_PATH.'/Lang.php');
	
	include_once(BASE_PATH.'/../helpers/utils.php');
	$lang = $_GET['lang'] ?? 'vi';
	setLang($lang);
	?>
    <div id="da_w2">
        <div id="header">
            <div id="top">
                <div>
                    <div class="right">
                        <ul class="menu">
                            <li>
                                <a
                                    href="?lang=<?php echo $lang == 'vi' ? 'en' : 'vi' ?>"><?php echo $lang == 'vi' ? 'English' : 'Tiếng Việt' ?></a>
                            </li>
                            <li>
                                <a href="kiemtradonhang.php"><i class="fa fa-pencil-square-o"></i>
                                    <?php
								echo _text('check order');
								?>
                                </a>
                            </li>
                            <li>
                                <a href="giohang.php"><i class="fa fa-shopping-cart"></i>
                                    <?php
								echo _text('cart');
								?>
                                </a>
                            </li>
                            <li>
                                <a href="dangnhap.php"><i class="fa fa-sign-in"></i>
                                    <?php
								echo _text('login');
								?>
                                </a>
                            </li>
                            <li>
                                <a href="dangky.php"><i class="fa fa-key"></i>
                                    <?php
								echo _text('sign up');
								?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="left">
                        <div class="wrd_frst">
                            <i class="fa fa-phone">
                                Hotline:0944641969
                            </i>
                        </div>
                    </div>

                </div>
            </div>
            <div id="mid">
                <div class="md_search">
                    <input id="all" type="text" name="all" value="" placeholder="<?php echo _text('search')?>"
                        style="padding-left: 1%;">
                    <button type="button" value="search" onclick="searchItem(1);">
                        <i class="fa fa-search">
                        </i>
                    </button>
                </div>
                <div class="md_banner">
                    <a href="index.php" title="pizza hut">
                        <img src="IMAGES/logo-pizzahut.png">
                    </a>
                </div>
            </div>
            <div id="lst_menu">
                <ul class="lst_menu_ul">
                    <li class="addclass1" onclick="addclass();">
                        <a href="index.php" title="TRANG CHỦ">
                            <span>
                                <?php
								
								echo _text('home page');
								?>
                            </span>
                        </a>
                        <div></div>
                    </li>
                    <li class="s">/</li>
                    <li class="addclass1">
                        <a href="sanpham.php" title="SẢN PHẨM">
                            <span>
                                <?php
								
								echo _text('product');
								?>
                            </span>
                        </a>
                    </li>
                    <li class="s">/</li>
                    <li>
                        <a href="tintuc.php" title="TIN TỨC">
                            <?php
								echo _text('news');
								?>
                        </a>
                    </li>
                    <li class="s">/</li>
                    <li>
                        <a href="gioithieu.php" title="GIỚI THIỆU">
                            <?php
								echo _text('about us');
								?>
                        </a>
                    </li>
                    <li class="s">/</li>
                    <li>
                        <a href="lienhe.php" title="LIÊN HỆ">
                            <?php
								echo _text('contact');
								?>
                        </a>
                    </li>
                    <li class="s">/</li>
                </ul>
            </div>
        </div>
        <div style="clear: both;border-bottom: solid #dddddd 1px;"></div>

        <script type="text/javascript">
        function searchItem(page) {
            var name = document.getElementById('all').value;
            if (name != "") {
                $.ajax({
                    type: "POST",
                    url: "includes/search_item.php",
                    data: {
                        name: name,
                        page: page
                    },
                    cache: false,
                    success: function(results) {
                        //document.getElementById('all').value="";
                        $('.product-wrapper').html(results);
                    }
                });
            }
        }
        </script>
</body>

</html>