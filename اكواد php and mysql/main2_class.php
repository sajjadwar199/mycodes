<?php
/*
 الكلاس من برمجة سجاد عبد الكريم محسن 
*/
class main
{
    public $con;


    public
        $image;
    // auto connect  function to database


    public function connect()
    {

        
        $con = mysqli_connect("localhost", "root", "", "saraha");
          $charset="utf8";
           mysqli_set_charset($con,$charset);

        
        if (!$con) {
            echo "لم يتم الاتصال";
        } else {
            echo "";
        }
        return $con;
    }
    //redirect the page
    public static function redir($page)

    {
        return header('location:' . $page . '.php');
    }
    //error massage function
    public static function error_massage()
    {
        if (isset($_SESSION['error_massage'])) {
            @$error = "<div style='text-align:right' class='alert alert-danger'>";
            @$error .= strip_tags($_SESSION['error_massage']);
            @$error .= '</div>';
        }
        $_SESSION['error_massage'] = null;

        return @$error;
    }
    //success massage function

    public static function success_message()
    {
        if (isset($_SESSION['success_message'])) {
            @$success = "<div style='text-align:right' class='alert alert-success'>";
            @$success .= strip_tags($_SESSION['success_message']);
            @$success .= '</div>';
        }
        $_SESSION['success_message'] = null;

        return @$success;
    }

    //query function 
    function query($sql)
    {

        $c = new main;
        $conn = $c->connect();
        $query = mysqli_query($conn, $sql);
        if (!$query) {

            $_SESSION['error_massage'] = 'هناك خطا في الاستعلام';
        } else {
            echo "";
        }
        return $query;
    }
    //fetch array of all information from database 
    public static function  fetch($q)
    {
        $row = mysqli_fetch_array($q);
        return $row;
    }
    //insert,delete,update,..
    public static function model($sql2, $alert = null, $page = null)
    {
        $c = new main;
        $conn = $c->connect();
        @$query = mysqli_query($conn, $sql2);
        if ($query and $alert != "" and $page != "") {
            echo "<script>alert('$alert')</script>";
            echo "<Script>window.open('$page','_self')</Script>";
        } else if ($alert != "" and $page != "") {
            echo "<script>alert('هناك خطا ')</script>";
            echo "<Script>window.open('$page','_self')</Script>";
        }
    }
    //function for upload images 
    function upload_image($image, $file_upload_to, $page)
    {

        $rand = substr(md5(uniqid(rand(), true)), 3, 10); //create md5 for file
        if (isset($image)) { //isset of image name from form
            $image = $image;
        }

        $file_name = $_FILES["$image"]["name"]; //  1-get the name of file 
        $file_tmp_name = $_FILES["$image"]["tmp_name"]; // 2-get the temb_name of file
        $file_size = $_FILES["$image"]["size"]; // 3-get size of file 
        $file_type = $_FILES["$image"]["type"]; // 4-get the type of file
        $file_error = $_FILES["$image"]["error"]; //5-get any error
        $folder = "$file_upload_to/"; //6- the dir of upload folder
        $path = $folder.$rand.$file_name; //7-make path of file 
        $tmp = explode('.', $file_name); //8-search from allow types of file
        $test_type = end($tmp);
        $type = array('jpeg', 'jpg', 'png', 'gif', 'jfif');

        if (in_array($test_type, $type) and $file_size < 2000000) {
            move_uploaded_file($file_tmp_name, $path); //upload file to folder
            return $path;
        } else {
           
           echo "<script>alert(' لرجاء اضافة صورة بصيغة مدعومة اقل من 2 ميغا بايت!لم تتم اضافة ')</script>";
            echo "<Script>window.open('$page','_self')</Script>"; //if found any error 
            return $path=false;
        }
    }



    //arabic function ago 


    function arabic_date_format($timestamp)
    {
        $periods = array(
            "second"  => "ثانية",
            "seconds" => "ثواني",
            "minute"  => "دقيقة",
            "minutes" => "دقائق",
            "hour"    => "ساعة",
            "hours"   => "ساعات",
            "day"     => "يوم",
            "days"    => "أيام",
            "month"   => "شهر",
            "months"  => "شهور",
        );

        $difference = (int) abs(time() - $timestamp);

        $plural = array(3, 4, 5, 6, 7, 8, 9, 10);

        $readable_date = "منذ ";

        if ($difference < 60) // less than a minute
        {
            $readable_date .= $difference . " ";
            if (in_array($difference, $plural)) {
                $readable_date .= $periods["seconds"];
            } else {
                $readable_date .= $periods["second"];
            }
        } elseif ($difference < (60 * 60)) // less than an hour
        {
            $diff = (int) ($difference / 60);
            $readable_date .= $diff . " ";
            if (in_array($diff, $plural)) {
                $readable_date .= $periods["minutes"];
            } else {
                $readable_date .= $periods["minute"];
            }
        } elseif ($difference < (24 * 60 * 60)) // less than a day
        {
            $diff = (int) ($difference / (60 * 60));
            $readable_date .= $diff . " ";
            if (in_array($diff, $plural)) {
                $readable_date .= $periods["hours"];
            } else {
                $readable_date .= $periods["hour"];
            }
        } elseif ($difference < (30 * 24 * 60 * 60)) // less than a month
        {
            $diff = (int) ($difference / (24 * 60 * 60));
            $readable_date .= $diff . " ";
            if (in_array($diff, $plural)) {
                $readable_date .= $periods["days"];
            } else {
                $readable_date .= $periods["day"];
            }
        } elseif ($difference < (365 * 24 * 60 * 60)) // less than a year
        {
            $diff = (int) ($difference / (30 * 24 * 60 * 60));
            $readable_date .= $diff . " ";

            if (in_array($diff, $plural)) {
                $readable_date .= $periods["months"];
            } else {
                $readable_date .= $periods["month"];
            }
        } else {
            $readable_date = date("d-m-Y", $timestamp);
        }

        return $readable_date;
    }


    //  دالة توليد ملفات الرفع اوتماتيكيا
    function create_upload_file($folder_name)
    {
        if (!is_dir($folder_name)) {
            mkdir($folder_name);
        }
    }
    public  static function number_query($q)
    {
        $num = mysqli_num_rows($q);
        return $num;
    }

    //دالة لحذف الملفات 
    public static function delete_file($url)
    {

        $filename = dirname(__FILE__) . "$url";
        chmod($filename, 0777);
        unlink($filename);
    }



    // main parination 
    public static function pagination($query, $per_page = 10, $page = 1, $url = '?')
    {
        $c = new main;
        $conn = $c->connect();

        $query = "SELECT COUNT(*) as `num` FROM {$query}";
        $row = mysqli_fetch_array(mysqli_query($conn, $query));
        $total = $row['num'];
        $adjacents = "2";

        $prevlabel = "&lsaquo; Prev";
        $nextlabel = "Next &rsaquo;";
        $lastlabel = "Last &rsaquo;&rsaquo;";

        $page = ($page == 0 ? 1 : $page);
        $start = ($page - 1) * $per_page;

        $prev = $page - 1;
        $next = $page + 1;

        $lastpage = ceil($total / $per_page);

        $lpm1 = $lastpage - 1; // //last page minus 1

        $pagination = "";
        if ($lastpage > 1) {
            $pagination .= "<ul class='pagination'>";
            $pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";

            if ($page > 1) $pagination .= "<li><a href='{$url}page={$prev}'>{$prevlabel}</a></li>";

            if ($lastpage < 7 + ($adjacents * 2)) {
                for ($counter = 1; $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination .= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";
                }
            } elseif ($lastpage > 5 + ($adjacents * 2)) {

                if ($page < 1 + ($adjacents * 2)) {

                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $pagination .= "<li><a class='current'>{$counter}</a></li>";
                        else
                            $pagination .= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";
                    }
                    $pagination .= "<li class='dot'>...</li>";
                    $pagination .= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                    $pagination .= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";
                } elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {

                    $pagination .= "<li><a href='{$url}page=1'>1</a></li>";
                    $pagination .= "<li><a href='{$url}page=2'>2</a></li>";
                    $pagination .= "<li class='dot'>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $pagination .= "<li><a class='current'>{$counter}</a></li>";
                        else
                            $pagination .= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";
                    }
                    $pagination .= "<li class='dot'>..</li>";
                    $pagination .= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                    $pagination .= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";
                } else {

                    $pagination .= "<li><a href='{$url}page=1'>1</a></li>";
                    $pagination .= "<li><a href='{$url}page=2'>2</a></li>";
                    $pagination .= "<li class='dot'>..</li>";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                        if ($counter == $page)
                            $pagination .= "<li><a class='current'>{$counter}</a></li>";
                        else
                            $pagination .= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";
                    }
                }
            }

            if ($page < $counter - 1) {
                $pagination .= "<li><a href='{$url}page={$next}'>{$nextlabel}</a></li>";
                $pagination .= "<li><a href='{$url}page=$lastpage'>{$lastlabel}</a></li>";
            }

            $pagination .= "</ul>";
        }

        return $pagination;
    }
    //parination use
    public static function paginationshow($per_page, $statement, $loop = null)
    {

        $c = new main;
        $conn = $c->connect();

        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
        if ($page <= 0) $page = 1;

        //$per_page = 1; // Set how many records do you want to display per page.

        $startpoint = ($page * $per_page) - $per_page;

        // $statement = "`ad` "; // Change `records` according to your table name.

        $results = mysqli_query($conn, "SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");

        if (mysqli_num_rows($results) != 0) {

            // displaying records.
            while ($row = mysqli_fetch_object($results)) {


                //write you data show


            }
        } else {
            echo "No records are found.";
        }



        echo '
        <Style>
ul.pagination {
	text-align:center;
	color:#829994;
}
ul.pagination li {
	display:inline;
	padding:0 3px;
}
ul.pagination a {
	color:#0d7963;
	display:inline-block;
	padding:5px 10px;
	border:1px solid #cde0dc;
	text-decoration:none;
}
ul.pagination a:hover, 
ul.pagination a.current {
	background:#0d7963;
	color:#fff; 
}
        
        </Style>
        
        
        ';
        // displaying paginaiton.
        echo $c->pagination($statement, $per_page, $page, $url = '?');
    }
};
