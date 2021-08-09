<input type="hidden" name="" class="levelType" value="<?=$level?>">

<section class="ftco-section ftco-about img">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-12 about-intro">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="d-flex about-wrap">
                            <div
                                class="about-teacher bg-size-100 w-100 d-flex align-items-center justify-content-center">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pl-md-5">
                        <div class="row justify-content-start pb-3">
                            <div class="col-md-12 heading-section ftco-animate" style="line-height: 1.3;">
                                <span class="subheading">GIỚI THIỆU</span>
                                <p>Đảm bảo lộ trình học tập xuyên suốt từ lớp 1 đến lớp 12, đáp ứng điều kiện giảng dạy đại trà bộ môn Tiếng Anh trong nhà trường phổ thông Việt Nam. Hệ thống tài nguyên hỗ trợ giảng dạy, học liệu điện tử đầy đủ, phong phú và được cập nhật thường xuyên, bao gồm: </p>
                                    <p>- Sách học sinh, Sách giáo viên, Sách bài tập;</p>
                                    <p>- Sách Mềm – Hệ thống phần mềm hỗ trợ giảng dạy, học tập; </p>
                                    <p>- Thiết bị dạy học: Bộ thẻ từ, Bộ quân rối, Tranh tình huống; </p>
                                    <p>- Phân phối chương trình, Giáo án giờ lên lớp, Bài giảng powerpoint, <br>Tiết giảng minh họa; </p>
                                    <p>- Hệ thống hỗ trợ, tập huấn sử dụng sách đồng bộ qua các kênh online và offline.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="col-12 text-center">
                    <div class="block-27">
                        <div class="row">
                            <div class="col-12" id="nav-chil">
                                <ul>
                                    <li class="<?=($what==1) ? 'active' : ''?> "><a href="#" class="big filter class" data-type="1" data-class="0">Mầm Non</a></li>
                                    <li><a href="#" class="filter class" data-type="1" data-class="1">1</a></li>
                                    <li><a href="#" class="filter class" data-type="1" data-class="2">2</a></li>
                                    <li><a href="#" class="filter class" data-type="1" data-class="3">3</a></li>
                                    <li><a href="#" class="filter class" data-type="1" data-class="4">4</a></li>
                                    <li><a href="#" class="filter class" data-type="1" data-class="5">5</a></li>                             
                                    <li><a href="#" class="filter class" data-type="1" data-class="6">6</a></li>
                                    <li><a href="#" class="filter class" data-type="1" data-class="7">7</a></li>
                                    <li><a href="#" class="filter class" data-type="1" data-class="8">8</a></li>
                                    <li><a href="#" class="filter class" data-type="1" data-class="9">9</a></li>                             
                                    <li><a href="#" class="filter class" data-type="1" data-class="10">10</a></li>
                                    <li><a href="#" class="filter class" data-type="1" data-class="11">11</a></li>
                                    <li><a href="#" class="filter class" data-type="1" data-class="12">12</a></li>                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 mb-5 text-center">
                    <div class="w-100">
                        <label class="btn box-shadow-none p-0">
                            <div id="option1" class="btn book show-option product  <?=($what==0) ? 'option-active' : ''?> " data-show-op="1">Sách Mềm</div>
                        </label>
                        <label class="btn box-shadow-none p-0">
                            <div id="option2" class="btn sp_rs show-option support-resources <?=($what==1) ? 'option-active' : ''?> " data-show-op="2"> Tài
                                nguyên hỗ trợ giảng dạy</div>
                        </label>
                        <label class="btn box-shadow-none p-0">
                            <div id="option3 " class="btn show-option" data-show-op="3"> Kiểm tra đánh
                                giá</div>
                        </label>
                        <label class="btn box-shadow-none p-0">
                            <div id="option3" class="btn show-option" data-show-op="4"> Đào tạo - Bồi
                                dưỡng</div>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="option-item <?=($what==0) ? 'active' : ''?> option_1 w-100 book" data-option="1">
                        <div class="container">
                            <div class="row product-box">    
                                <?php 
                                    if (isset($mess)) {
                                        echo $mess;
                                    }
                                ?>                                
                                <?php foreach ($listProduct as $product) { 
                                    if($product['sachmem'] ==1 ){
                                        $link =$product['link'];
                                    }else{
                                        $link = ROOT_URL."/sach/".$product['slug'];
                                    }
                                ?>
                                <div class="col-md-4 col-12 product-item d-flex align-items-stretch ftco-animate">
                                    <div class="project-wrap">
                                        <a href="<?=$link?>" class="img" style="background-image: url(<?=PATH_IMG_SITE?><?= $product['img']?>);">
                                        </a>
                                        <div class="text p-4">
                                            <p class="advisor m-0 limit-content-2"><span>Sách <?=($product['type'] == 1)? "Học Sinh": "Giáo Viên"?> </span></p>    
                                            <h3><a class="limit-content-2" href="<?=$link?>"><?=$product['name']?></a></h3>
                                            <p class="advisor limit-content-1">Tác Giả: <span><?=$product['author']?></span></p>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>

                                <div class="w-100 text-center">
                                    <div class="ftco-loader mr-0-auto">
                                        <svg class="circular" width="48px" height="48px">
                                            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                                            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
                                        </svg>
                                    </div>
                                </div>
                                <!-- <div class="box-on-top hide"></div> -->
                            </div>

                            <div class="row mt-5 pagina-box " style="<?php echo ($pageNumber == 0) ? 'display: none' : ''?>">
                                <div class="col">
                                    <div class="block-27 text-center">
                                        <input type="hidden" class="pageNumber" value="<?=$pageNumber?>">
                                        <ul class="page-num">
                                                <li><a href="javascript:void(0)" class="pagination-control prev" onclick="moveBack();">&lt;</a></li>                
                                                <div class="page-list d-inline-block">
                                                <?php 
                                                if ($pageNumber <= 6) {
                                                    for ($i = 1; $i < $pageNumber + 1; $i++) { 
                                                        ?>
                                                            <li <?php echo ($i == 1) ? 'class="active"' : ''?>><a href="javascript:void(0)" data-item="<?=$i?>" onclick="movePage(<?=$i?>)" class="pagination-item"><?= $i ?></a></li>                                    
                                                        <?php 
                                                    }
                                                } else {
                                                    for ($i = 1; $i < $pageNumber + 1; $i++) {
                                                        if ($i < 4) { 
                                                        ?>
                                                            <li <?php echo ($i == 1) ? 'class="active"' : ''?>><a href="javascript:void(0)" data-item="<?=$i?>" onclick="movePage(<?=$i?>)" class="pagination-item"><?= $i ?></a></li>                                    
                                                        <?php } 
                                                    } if ($pageNumber > 6) { ?>       
                                                        <li><span data-item="near-end">...</span></li>
                                                        <li><a href="javascript:void(0)" data-item="<?=$pageNumber - 1?>" onclick="movePage(<?=$i?>)" class="pagination-item"><?= $pageNumber - 1 ?></a></li>                                    
                                                        <li><a href="javascript:void(0)" data-item="<?=$pageNumber ?>" onclick="movePage(<?=$i?>)" class="pagination-item"><?= $pageNumber ?></a></li>                                    
                                                <?php } 
                                                } ?>
                                                </div>                            
                                            <li><a href="javascript:void(0)" class="pagination-control next" onclick="moveNext()">&gt;</a></li>                                                             
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="option-item <?=($what==1) ? 'active' : ''?> option_2 w-100" data-option="2">
                        <div class="row spre">
                            <?php 
                            if (isset($mess2)) {
                                echo $mess2;
                            }                            
                            ?>                                
                            <?php foreach ($listSpResources as $spre) {      
                                                        
                            ?>
                            <div class="col-md-4 col-4 Resources-item d-flex align-items-stretch ftco-animate">
                                <div class="project-wrap text-center sprs">
                                    <a href="<?=$spre['link']?>" class="img" style="background-image: url('<?=PATH_IMG_SITE?>/<?= $spre['img']?>');">
                                    </a>
                                    <div class="text p-4">
                                        <h3><a href="<?=$spre['link']?>"><?= $spre['name'] ?></a></h3>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <div class="w-100 text-center">
                                <div class="ftco-loader teacher mr-0-auto">
                                    <svg class="circular" width="48px" height="48px">
                                        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                                        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5 pagina-box " style="<?php echo ($pageNumberResources == 0) ? 'display: none' : ''?>">
                            <div class="col">
                                <div class="block-27 text-center">
                                    <input type="hidden" class="pageNumberTeacher" value="<?=$pageNumberResources?>">
                                    <ul class="page-num">
                                            <li><a href="javascript:void(0)" class="pagination-control prev" onclick="moveBack();">&lt;</a></li>                
                                            <div class="page-list-sprs d-inline-block">
                                            <?php 
                                            if ($pageNumberResources <= 6) {
                                                for ($i = 1; $i < $pageNumberResources + 1; $i++) { 
                                                    ?>
                                                        <li <?php echo ($i == 1) ? 'class="active"' : ''?>><a href="javascript:void(0)" data-item="<?=$i?>" onclick="movePage(<?=$i?>)" class="pagination-item"><?= $i ?></a></li>                                    
                                                    <?php 
                                                }
                                            } else {
                                                for ($i = 1; $i < $pageNumberResources + 1; $i++) {
                                                    if ($i < 4) { 
                                                    ?>
                                                        <li <?php echo ($i == 1) ? 'class="active"' : ''?>><a href="javascript:void(0)" data-item="<?=$i?>" onclick="movePage(<?=$i?>)" class="pagination-item"><?= $i ?></a></li>                                    
                                                    <?php } 
                                                } if ($pageNumberResources > 6) { ?>       
                                                    <li><span data-item="near-end">...</span></li>
                                                    <li><a href="javascript:void(0)" data-item="<?=$pageNpageNumberResourcesumber - 1?>" onclick="movePage(<?=$i?>)" class="pagination-item"><?= $pageNumber - 1 ?></a></li>                                    
                                                    <li><a href="javascript:void(0)" data-item="<?=$pageNumberResources ?>" onclick="movePage(<?=$i?>)" class="pagination-item"><?= $pageNumber ?></a></li>                                    
                                            <?php } 
                                            } ?>
                                            </div>                            
                                        <li><a href="javascript:void(0)" class="pagination-control next" onclick="moveNext()">&gt;</a></li>                                                             
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>
</section>

<input type="hidden" value="<?=$what?>" id="what_">