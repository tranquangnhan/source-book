<?php if (isset($test)) {
    echo '123';
    exit();
}?>
<div class="col-lg-3 sidebar fixed-location">
    <div class="right fix" style="padding-right: 15px; padding-left: 15px;">
        <div class="sidebar-box bg-white ftco-animate">
            <form action="<?=ROOT_URL?>/san-pham" method="post" class="search-form  search-input">
                <div class="form-group">
                    <div class="row w-100 m-0">
                        <div class="search-2-left">
                        <input type="text"  name="keysearch" class="keysearch form-control" placeholder="Search...">
                    </div>
                    <div class="search-2-right">
                        <button style="background: none;border: none;" type="submit"><span type="submit" class="icon fa fa-search"></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="sidebar-box bg-white ftco-animate">
            <h3 class="heading-sidebar buttontitle">Tin Mới</h3>
            <div class="p-2">

            <?php
                    foreach ($getLastestNews as $row) {
                        $id = $row['id'];
                        $date = date('m/d/Y', $row['date']);
                        $link = ROOT_URL . "/bai-viet/" . $row['slug'] . '-' . $id;
                        $img = PATH_IMG_SITE . explode(",", $row['img'])[0];
                        echo '<div class="container-sider">
                            <div class="left-sider">
                                <a href="' . $link . '">
                                    <img class="img-sidebar" src="' . $img . '" width="50%" alt="">
                                </a>
                            </div>
                            <div class="containerright-sider d-flex align-items-center">
                                <div class="row">
                                    <div class="col-md-12 heading-section ftco-animate limit-content-3">
                                        <a href="' . $link . '"><h6>' . $row['name'] . '</h6></a>

                                    </div>
                                    <div class="col-md-12 heading-section ftco-animate limit-content-1 mt-2">
                                        <h6 class="color-gray">' . $date . '</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>';
}
?>

            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-12 col-md-6 col-sm-6">
                <div class="sidebar-box bg-white ftco-animate ">
                <h3 class="heading-sidebar color-main buttontitle">KHO MEDIA</h3>
                <div class="div-img mx-auto" style="width: 90%;">
				    <a href="https://www.youtube.com/channel/UCGzhS0mRNympJQQ0PStn7CQ"><img src="<?=PATH_URL?>images/Logo-SM-(New).png" class="img-fluid" alt=""></a>
				</div>
                </div>
            </div>

            </div>
            <div class="col-12 col-lg-12 col-md-6 col-sm-6">
                <div class="sidebar-box bg-white ftco-animate m-0">
                    <h3 class="heading-sidebar buttontitle">KẾT NỐI MẠNG XÃ HỘI</h3>
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fsachmem.vn%2F&tabs=timeline&width=315&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1259082827813860" 
											width="100%" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" 
											allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" 
											data-lazy="true">
					</iframe>
                </div>
                
            </div>
        </div>


    </div>
</div>