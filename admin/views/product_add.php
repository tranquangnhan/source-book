<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-10">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-3">Sản phẩm</h4>

                        <form data-parsley-validate id="formadd" novalidate onsubmit="return submitForm()" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <?php if($message) echo "<h2 class='text-danger'>".$mesage."</h2>"; ?>    
                                <?php if ($_SESSION['message']) echo "<h2 class='text-danger text-center'>". $_SESSION['message'] ."</h2>"; ?>
                            </div>

                            <div class="boxform boxshowimg ">
                                <div class="ouputimg">
                                    <br>
                                    <div class="output-fet"><output id="list"></output></div>
                                    <a href="#" id="clear">Xoá</a>
                                </div>                            
                            </div>
                            
                            <div class="form-group">
                                <div class="inputhinh">
                                    <label for="">Image Url</label><span style="color:red;"> (*)</span>
                                    <input type="file" name="img[]" style=" position: absolute;" class="imagefet" id="control" multiple>
                                </div>                                
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Tên sản phẩm</label><span style="color:red;"> (*)</span>
                                        <input type="text" name="name"  parsley-trigger="change" required
                                            placeholder="Sản phẩm" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Tác giả</label><span style="color:red;"> (*)</span>
                                        <input type="text" name="author"  parsley-trigger="change" required
                                            placeholder="Tác giả" class="form-control" >
                                    </div>
                                </div>              
                            </div>

                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Danh mục</label><span style="color:red;"> (*)</span>
                                        <select class="form-control" name="idcate">                                            
                                            <?php 
                                                foreach ($categoryList as $row) {
                                                    echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                                }   
                                            ?>
                                        </select>
                                    </div>                                                
                                </div>  
                                
                                
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Phần 1</label><span style="color:red;"> (*)</span>
                                            <select class="form-control" name="part"> 
                                                <option value="0" selected>Chọn phần 1</option>                                 
                                                <?php 
                                                    foreach ($productList as $row) {
                                                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                                    }   
                                                ?>
                                            </select>
                                        </div>                                                
                                    </div>  

          
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Class</label><span style="color:red;"> (*)</span>
                                        <select class="form-control" name="class">                                            
                                            <option value="0">Mầm Non</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>                                                
                                </div>      
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Loại</label><span style="color:red;"> (*)</span>
                                        <select class="form-control" name="type">                                            
                                            <option value="1">Học Sinh</option>
                                            <option value="2">Giáo Viên</option>
                                        </select>
                                    </div>                                                
                                </div> 
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Năm sản xuất</label><span style="color:red;"> (*)</span>
                                        <input type="number" name="year"  parsley-trigger="change" required
                                            placeholder="0000"  class="form-control" >
                                    </div>
                                </div>  
                            </div>

                            <div class="row">
                              
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Link sản phẩm</label><span style="color:red;"> (*)</span>
                                        <input type="text" name="link"  parsley-trigger="change" required
                                            placeholder="link ..."  class="form-control" >
                                    </div>
                                </div>       
                                  <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Sách Mềm</label><span style="color:red;"></span>
                                        <input type="checkbox" name="sachmem"  class="form-control" >
                                    </div>
                                </div>       
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Link <?=$getAllLinkSingle[0]['name']?></label><span style="color:red;"></span>
                                        <input type="text" name="linksachmengv"  parsley-trigger="change"
                                            placeholder="link <?=$getAllLinkSingle[0]['name']?> ..." class="form-control" >
                                    </div>
                                </div>   
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Link <?=$getAllLinkSingle[6]['name']?></label><span style="color:red;"></span>
                                        <input type="text" name="linksachmemhs"  parsley-trigger="change"
                                            placeholder="link <?=$getAllLinkSingle[6]['name']?> ..." class="form-control" >
                                    </div>
                                </div>              
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Link <?=$getAllLinkSingle[1]['name']?></label><span style="color:red;"></span>
                                        <input type="text" name="linksachgv"  parsley-trigger="change"
                                            placeholder="link <?=$getAllLinkSingle[1]['name']?> ..." class="form-control" >
                                    </div>
                                </div>     
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Link <?=$getAllLinkSingle[7]['name']?></label><span style="color:red;"></span>
                                        <input type="text" name="linkudluyentuvung"  parsley-trigger="change"
                                            placeholder="link <?=$getAllLinkSingle[7]['name']?> ..." class="form-control" >
                                    </div>
                                </div>    
                            </div>
                         
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Link <?=$getAllLinkSingle[2]['name']?></label><span style="color:red;"></span>
                                        <input type="text" name="linksachgv2"  parsley-trigger="change"
                                            placeholder="<?=$getAllLinkSingle[2]['name']?> ..." class="form-control" >
                                    </div>
                                </div>     
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Link <?=$getAllLinkSingle[8]['name']?></label><span style="color:red;"></span>
                                        <input type="text" name="linkudnghenoi"  parsley-trigger="change"
                                            placeholder="link <?=$getAllLinkSingle[8]['name']?>..." class="form-control" >
                                    </div>
                                </div>              
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Link <?=$getAllLinkSingle[3]['name']?></label><span style="color:red;"></span>
                                        <input type="text" name="linkdekiemtra"  parsley-trigger="change"
                                            placeholder="link <?=$getAllLinkSingle[3]['name']?> ..." class="form-control" >
                                    </div>
                                </div>     
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Link <?=$getAllLinkSingle[9]['name']?></label><span style="color:red;"></span>
                                        <input type="text" name="linkstoryland"  parsley-trigger="change"
                                            placeholder="link <?=$getAllLinkSingle[9]['name']?> ..." class="form-control" >
                                    </div>
                                </div>              
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Link <?=$getAllLinkSingle[4]['name']?></label><span style="color:red;"></span>
                                        <input type="text" name="linkppct"  parsley-trigger="change"
                                            placeholder="link <?=$getAllLinkSingle[4]['name']?> ..." class="form-control" >
                                    </div>
                                </div>    
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Link ảnh chi tiết</label><span style="color:red;"></span>
                                        <input type="text" name="linkhoverimg"  parsley-trigger="change"
                                            placeholder="Link ảnh chi tiết ..." class="form-control" >
                                    </div>
                                </div>                
                            </div>
                           
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Link <?=$getAllLinkSingle[5]['name']?></label><span style="color:red;"></span>
                                        <input type="text" name="linkudluyennghenoi"  parsley-trigger="change"
                                            placeholder="link <?=$getAllLinkSingle[5]['name']?> ..." class="form-control" >
                                    </div>
                                </div>                
                            </div>
                            <label for="">Mô tả</label>
                            <textarea id="editor1"  style="height: 300px;width:100%" name="description" >                            
                                <?=$oneRecode["description"]?>
                            </textarea>                                                                                    
                            
                            <div class="form-group text-right mb-0 mt-5">
                                <input type="submit" name="them" class="btn btn-primary waves-effect waves-light mr-1" value="Thêm" id='add_product'>
                                <a href="<?=ROOT_URL?>/admin/?ctrl=product&act=index" clas="btn btn-secondary waves-effect waves-light">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>