<?php
require_once "../system/config.php";
//    require_once "../languages/".$_SESSION['lang'].".php";

require_once "../system/database.php";
require_once "../lib/myfunctions.php";
require_once "models/home.php";
require_once "models/user.php";
require_once "models/blog.php";
class Home
{
    public function __construct()
    {
        $this->model = new model_home();
        $this->modelUser = new Model_user();
        $this->modelBlogs = new Model_blog();
        $this->lib = new lib();

        $act = "home";
        if (isset($_GET["act"]) == true) {
            $act = $_GET["act"];
        }

        switch ($act) {
            case "home": 
                $this->home();
                break;
            case "productdetail": 
                $this->productdetail();
                break;
            case "about": 
                $this->about();
                break;
            case "products": 
                $this->products();
                break;
            case "student": 
                $this->student();
                break;
            case "teacher": 
                $this->teacher();
                break;            
            case "parent": 
                $this->parent();
                break;
            case "blog": 
                $this->blog();
                break;    
            case "blogdetail": 
                $this->blogdetail();
                break;           
            case "contact": 
                $this->contact();
                break;
            case "updateSlug":
                $this->updateSlug();
                break;
            case "aboutorther1":
                $this->aboutOrther1();
                break;
            case "aboutorther2":
                $this->aboutOrther2();
                break;
            case "aboutorther3":
                $this->aboutOrther3();
                break;
            case "clearcache":
                 $this->clear();
            break;
            
        }

    }
    
    function vn_to_str ($str){
 
$unicode = array(
 
'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
 
'd'=>'đ',
 
'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
 
'i'=>'í|ì|ỉ|ĩ|ị',
 
'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
 
'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
 
'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
 
'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
 
'D'=>'Đ',
 
'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
 
'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
 
'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
 
'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
 
'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
 
);
 
foreach($unicode as $nonUnicode=>$uni){
 
$str = preg_replace("/($uni)/i", $nonUnicode, $str);
 
}
$str = str_replace(' ','_',$str);
 
return $str;
 
}

    function updateSlug() {
        $listBook = $this->model->getAllProduct();
        foreach ($listBook as $book) {
            $slug = $this->slug($book['name']);
            $slug = $slug . '-' . $book['id'];
            $id   = $book['id'];
            $this->model->updateSlug($slug, $id);             
        }        
        exit();
    }

    function slug($str) {
        $str = $this->stripUnicode($str);
        $ar  = array("%", "$", "*", "&", "?", "!", "#", "@","-","_"); // % $ * & ? ! # @
        $str = str_replace($ar, " ",$str);
        $str = trim(preg_replace('/\s+/',' ', $str)); // \s+ là một hoặc nhiều khoảng trắng
        $str = str_replace(" ", "-",$str);
        return $str;
    }

    function stripUnicode($str){
        if(!$str) return false;
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|A',
            'd'=>'đ|Đ|D', 'f'=>'F', 's'=>'S', 'r'=>'R', 'w'=>'W', 'q'=>'Q', 't'=>'T', 'p'=>'P', 'g'=>'G',
            'h'=>'H', 'j'=>'J', 'k'=>'K', 'l'=>'L', 'z'=>'Z', 'x'=>'X', 'c'=>'C', 'v'=>'V', 'b'=>'B', 'n'=>'N', 'm'=>'M',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|E',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị|I',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|O',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|U',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ|Y',
        );
        foreach($unicode as $khongdau=>$codau) {
            $arr =explode("|",$codau);
            $str = str_replace($arr,$khongdau,$str);
        }
        return $str;
    }

    public function home()
    {
        $page_title   = "Trang Chủ - EngBook";
        $viewFile     = "views/home.php";
        $abouts       = $this->model->getAbouts();
        $video        = $this->model->getAllVideo();
        $bloglist1    = $this->modelBlogs->getbloglimit(' limit 0, 2', 1);
        $bloglist2    = $this->modelBlogs->getbloglimit(' limit 2, 3', 1);        
        require_once "views/layout.php";
    }

    public function about() {
        $css          = "about.css";
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            if ($page == 3) {
                $css = "about-other.css";
                $js   = ["about-other.js"];
            } else {
                $sprs = $this->model->getSupportResource();            
                $css  = "about-page.css";
                $js   = ["about-page.js"];
            }
        }
        $page_title   = "Giới Thiệu - EngBook";
        $viewFile     = "views/about.php";
        $abouts       = $this->model->getAbouts();
        if (isset($_GET['id'])) {
            $id          = $_GET['id'];
            $aboutDetail = $this->model->getAboutDetail($id);
            $namePage2 = $aboutDetail['name'];
        }   
        $namePage     = "Giới Thiệu";        
        require_once "views/layout.php";
    }

    public function products() {
        $page_title     = "Sản Phẩm - EngBook";
        $viewFile       = "views/product-list.php";
        $namePage       = "Sản Phẩm";                
        $js             = ["product-list.js", "sticky.js"];
        $ajax           = ["product-list.js"];
        $categories     = $this->model->getCategories();
        $getLastestNews = $this->modelBlogs->getLastestNews();
        $idCateFirst    = $categories[0]['id'];
        $abouts         = $this->model->getAbouts();

        
        if (isset($_POST['keysearch'])) {
            $key = $_POST['keysearch'];
            if ($key == '') {
                // $listProduct   = $this->model->getBookByKeyWordLimit($key);            /
                $AmountProduct = 0;  
                $level = 7;     
            } else {                     
                $listProduct   = $this->model->getBookByKeyWordLimit($key);            
                $AmountProduct = $this->model->getAmountBookByKeyWord($key);  
                $level = 7;                     
            }   
        } else {
            if (isset($_GET['level'])) {            
                $level = $_GET['level'];
                        
                if ($level == 1) {
                    $namePage2     = 'TIẾNG ANH MẦM NON';
                    $listProduct   = $this->model->getProductsByClass(0);                
                    $AmountProduct = $this->model->getAmountProductsByClass(0);
                    
                } else if ($level == 2) {
                    $namePage2     = 'TIẾNG ANH TIỂU HỌC';
                    $listProduct   = $this->model->getProductByClass(0, '(1, 2, 3, 4, 5)');
                    $AmountProduct = $this->model->countProductByClass('(1, 2, 3, 4, 5)');
                    
                } else if ($level == 3) {
                    $namePage2     = 'TIẾNG ANH TRUNG HỌC CƠ SỞ';
                    $listProduct   = $this->model->getProductByClass(0, '(6, 7, 8, 9)');
                    $AmountProduct = $this->model->countProductByClass('(6, 7, 8, 9)');
                } else if ($level == 4) {
                    $namePage2     = 'TIẾNG ANH TRUNG HỌC PHỔ THÔNG';
                    $listProduct   = $this->model->getProductByClass(0,'(10, 11, 12)');
                    $AmountProduct = $this->model->countProductByClass('(10, 11, 12)');

                } else if ($level == 10) { // lọc học sinh
                    $listProduct   = $this->model->getProductStudentLimit();
                    $AmountProduct = $this->model->countProductStudent();
                } else if ($level == 11) { // lọc giáo viên
                    $listProduct   = $this->model->getProductTeacherLimit();
                    $AmountProduct = $this->model->countProductTeacher();
                } else if ($level == 12) { // lọc cate 1
                    $listProduct   = $this->model->getProductByCateFirstLimit($idCateFirst);  
                    
                    $AmountProduct = $this->model->countProductByCateFirst($idCateFirst);
                }
                
            } else {
                $level = 6;
                $listProduct    = $this->model->getProductDefault(0);
                $AmountProduct  = $this->model->getAmountProductDefault();
            }
        }

        if ($AmountProduct == 0) {
            $mess  = '<h3 class="text-center w-100 notice-h3">Không tìm thấy sản phẩm !</h3>';
            if (isset($_POST['keysearch'])) {
                $mess .= '<a href="/san-pham" class="text-center w-100 notice-h3">Quay lại trang sản phẩm</a>';
            }
        }

        $limitItem      = 9;
        $pageNumber     = ceil($AmountProduct / $limitItem);
        require_once "views/layout.php";
    }

    public function productdetail() {
        $abouts         = $this->model->getAbouts();
        $slug           = $_GET['slug'];
        $oneproduct     = $this->model->getOnePro($slug);
        $getLastestNews = $this->modelBlogs->getLastestNews();
        

        $slugPart1      =   $this->model->getSlugById($oneproduct['id']);

        $slugPart2      =  $this->model->getSlugByPart($oneproduct['id']);  
        
        if($this->model->getSlugByPart($oneproduct['id']) == ''){
            $slugPart1 = $this->model->getSlugById($oneproduct['part']);  
            $slugPart2 =  $this->model->getSlugById($oneproduct['id']);
        }
       
     
        $checkOnePart   = $this->model->checkOnePart();

        $getAllLinkSingle = $this->model->getAllLinkSingle();
        

        $getProductsSameClass = $this->model->getProductsSameClass($oneproduct['class']);
   
        $page_title   = "Sản Phẩm Chi Tiết - EngBook";
        $viewFile     = "views/product-detail.php";
        $css          = "product-detail.css";        
        $js           = ["course-detail.js", "sticky.js"];    

        $namePage     = "Sản Phẩm";
        require_once "views/layout.php";
    }

    public function student() {
        $abouts         = $this->model->getAbouts(); 
        $video          = $this->model->getVideoNew();      
        $page_title     = "Học Sinh - EngBook";
        $viewFile       = "views/student.php";
        $css            = "student.css";        
        $namePage       = "Học Sinh";               
        $ajax           = ["product-list.js", "student.js"];
        $js             = ["sticky.js"];
        $categories     = $this->model->getCategories();
        $getLastestNews = $this->modelBlogs->getLastestNews();
        $idCateFirst    = $categories[0]['id'];
        $where          = ' type = 1 ';

        $listProduct    = $this->model->getProductLimit($where);        
        $allproduct     = $this->model->getProductStudent();        
        $AmountProduct  = count($allproduct);
        
        if ($AmountProduct == 0) {
            $mess = '<h3 class="text-center w-100 notice-h3">Không tìm thấy sản phẩm !</h3>';
        }

        $limitItem      = 9;
        $pageNumber     = ceil($AmountProduct / $limitItem);
        
        require_once "views/layout.php";
    }

    public function teacher() {
        if (isset($_GET['what'])) {
            $what = $_GET['what'];
        }
        $abouts         = $this->model->getAbouts();
        
        $page_title     = "Giáo Viên - EngBook";
        $viewFile       = "views/teacher.php";
        $css            = "teacher.css";    
        $js             = ["teacher.js", "sticky.js"];    
        $namePage       = "Giáo Viên";            
        $ajax           = ["product-list.js", "teacher.js"];
        $where          = ' type in (1,2) ';
        $level          = 13;
        $categories     = $this->model->getCategories();
        $getLastestNews = $this->modelBlogs->getLastestNews();
        $listProduct    = $this->model->getProductLimit($where);        
        $allproduct     = $this->model->getProductTeacher();        
        $AmountProduct  = count($allproduct);
        
        if ($AmountProduct == 0) {
            $mess = '<h3 class="text-center w-100 notice-h3">Không tìm thấy sản phẩm !</h3>';
        }
        
        $listSpResources = $this->model->getSpResoucesClasslimit();
        $amountSpResources = $this->model->getAmountSpResourcesClass();
        
        if ($amountSpResources == 0) {
            $mess2 = '<h3 class="text-center w-100 notice-h3">Không tìm thấy tài nguyên hỗ trợ!</h3>';
        }
        
        $limitItem      = 9;
        $pageNumber     = ceil($AmountProduct / $limitItem);        
        $pageNumberResources = ceil($amountSpResources / $limitItem); 
       
        require_once "views/layout.php";
    }

    public function parent() {
        $abouts         = $this->model->getAbouts();
        $getLastestNews = $this->modelBlogs->getLastestNews();
        $page_title     = "Phụ Huynh - EngBook";
        $viewFile       = "views/parent.php";          
        $namePage       = "Phụ Huynh";
        require_once "views/layout.php";
    }

    public function blog() {
        $js             = ["sticky.js"];
        $abouts         = $this->model->getAbouts();
        $getLastestNews = $this->modelBlogs->getLastestNews();
        $showDmBlog     =  $this->modelBlogs->getAllBlogCate();

        if(isset($_GET['maloai'])==true&&($_GET['maloai']>0))
        $maLoai = $_GET['maloai'];

        $pageNum = 1;
        if(isset($_GET['Page'])==true) $pageNum = $_GET['Page'];
       
        settype($maLoai,"int");
        settype($pageNum,"int");

        if($pageNum<=0) $pageNum = 1;
        $pageSize = PAGE_SIZE_BAIVIET;

        if($maLoai)
        {
            $ds =  $this->modelBlogs->getHangHoaTheoLoai($maLoai,$pageNum,$pageSize);
         
            $TotalProduct = (int)  $this->modelBlogs->demHangHoaTheoLoai($maLoai);
        }
        if(!$maLoai)
        {    
            if ($maLoai != 4) {            
                $ds = $this->modelBlogs->getAllHangHoa($pageNum,$pageSize);
                $TotalProduct = (int) $this->modelBlogs->demAllHangHoa();
            } else {
                $ds = $this->modelBlogs->getAllHangHoaFour($pageNum,$pageSize);
                $TotalProduct = (int) $this->modelBlogs->demAllHangHoaFour();
            }
        }

        if($TotalProduct == 0) $TotalProduct =1;
        $BaseLink= 'bai-viet';


        $Pagination =  $this->modelBlogs->Page($TotalProduct, $pageNum,$pageSize,$BaseLink);
      
        if ($maLoai == 4) {            
            $page_title   = "Phụ Huynh - EngBook";
            $viewFile     = "views/parent.php";          
            $namePage     = "Phụ Huynh";
        } else {                    
            $page_title   = "Tin Tức - EngBook";
            $viewFile     = "views/blog-list.php";  
            $namePage     = "Tin Tức";
        }
        require_once "views/layout.php";
    }

    public function blogdetail() {
        $js             = ["sticky.js"];
        $abouts         = $this->model->getAbouts();
        $slug           = $_GET['slug'];
        $getLastestNews = $this->modelBlogs->getLastestNews();
        $oneBlog = $this->modelBlogs->getBlogDetail($slug);
   

        $page_title   = "Tin Tức - EngBook";
        $viewFile     = "views/blog-detail.php";     
        $css          = "blog-detail.css";         
        $namePage     = "Tin Tức";
        require_once "views/layout.php";
    }

    public function aboutOrther1(){
        $abouts         = $this->model->getAbouts();
        $aboutOther     = true;
        $page_title     = "Tin Tức - EngBook";
        $js             = ["about-other.js"];
        $viewFile       = "views/about-orther1.php";    
        $css            = "about-other.css";   
        require_once "views/layout.php";
    }

    public function aboutOrther2(){
        $abouts         = $this->model->getAbouts();
        $aboutOther     = true;
        $page_title     = "Tin Tức - EngBook";
        $js             = ["about-other.js"];
        $viewFile       = "views/about-orther2.php";    
        $css            = "about-other.css";     
        require_once "views/layout.php";
    }

    public function aboutOrther3(){
        $abouts         = $this->model->getAbouts();
        $aboutOther     = true;
        $page_title     = "Tin Tức - EngBook";
        $js             = ["about-other.js"];
        $viewFile       = "views/about-orther3.php";    
        $css            = "about-other.css";     
        require_once "views/layout.php";
    }

    public function contact() {
        require '../lib/vendor/autoload.php'; 
       

        $abouts = $this->model->getAbouts();

        if(isset($_POST['submitMessage'])){
            $name = strip_tags(trim($_POST['name']));
            $gmail = strip_tags(trim($_POST['email']));
            $subject = strip_tags(trim($_POST['subject']));
            $message = strip_tags(trim($_POST['message']));
            if($name == '' || $gmail == ''|| $subject=='' ||$message == '' ){
            echo '<script>alert("Bạn chưa điền đủ thông tin !")</script>';
            }elseif(!filter_var($gmail, FILTER_VALIDATE_EMAIL) ){
                echo '<script>alert("Email không đúng định dạng !")</script>';
            }else{
            $this->model->storeContact($name,$gmail,$subject,$message);

            $email = new \SendGrid\Mail\Mail();
            

            $email->addTo("sachtienganh@heid.vn","Website book"); 
            $email -> setFrom('thanhnutruyenky86@gmail.com', 'Website book');

            $email->setSubject("Thư liên hệ từ website");

            $email -> addDynamicTemplateData('UserName', $name);
            $email -> addDynamicTemplateData('email', $gmail);
            $email -> addDynamicTemplateData('subject', $subject);
            $email -> addDynamicTemplateData('message', $message);
            
            $email -> setTemplateId('d-e8b90235142b4e9b9b1ed83f66b01b51');
       
            
            $sendgrid = new \SendGrid('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');
            
            try {
                $response = $sendgrid->send($email);
                if($response->statusCode()){
                    echo '<script>alert("Cảm ơn! Chúng tôi sẽ liên hệ bạn sớm nhất !")</script>';
                }
            } catch (Exception $e) {
                echo 'Caught exception: '. $e->getMessage() ."\n";
            }   

            } 
        

            
        }
      
        $page_title   = "Liên Hệ - EngBook";
        $viewFile     = "views/contact.php";     
        $css          = "contact.css";         
        $namePage     = "Liên Hệ";
        require_once "views/layout.php";
    }
    
    function clear(){
         header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }
}
