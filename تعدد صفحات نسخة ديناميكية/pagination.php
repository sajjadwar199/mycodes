<?php
/* Variables
$record_no_per_page: Number of records per Page.
$number_per_page: Number of pages.
$record_start: Which Start from database.
$page_brwoser: Get the page number from the brwoser.
$page_indx: The index that used in while loop to count the pages 
$post_record: contains Records from database.
$record_no: Numnber of all Records in database.
$pages_no: Number of Pages ($record_no / $record_no_per_page).
$table_name: Name of the table from database.
*/


function page_numbering ($record_no_per_page, $number_per_page, $table_name){
    
    //Default values
    $page_indx         =     1;
    $record_start    =     0;
    $page_brwoser     =     1;
    
    if (isset($_GET['p'])) {
        $record_start =     ((intval(abs($_GET['p'])) - 1) * $record_no_per_page);
        $page_brwoser =     abs(intval($_GET['p']));
    }

    // Determine the numbers of rows in the database.
    $post_record     =     mysql_query("SELECT * FROM $table_name");
    $record_no         =     mysql_num_rows($post_record);
    
    // Determine Number of pages.
    $pages_no         =     intval($record_no / $record_no_per_page);
    if ($record_no % $record_no_per_page){$pages_no++;}
    
    
    if ($page_brwoser <= $pages_no && $record_no != 0 && !empty($page_brwoser)) {
        
        if ($pages_no >  $number_per_page) {
            
            // Incrase the total pages number until the page browser become less than ( total pages number - Number of Pages).
            if ($page_brwoser < ($pages_no - $number_per_page) ) {
                $pages_no = $page_brwoser + $number_per_page;
            }
            
            //Set the Index of while loop = 1 if Page browser less or equal to Number of Pages else make page index equal to (page brwoser - Number of Pages)
            if ($page_brwoser <= $number_per_page){ $page_indx =1;  }
            else {$page_indx = $page_brwoser - $number_per_page; }
        }

        while ($page_indx != ($pages_no + 1)){
            
            if ($page_indx == 1) {
                if (!isset($_GET['p'])) {
                    echo "{$page_indx}";
                } else if (isset($_GET['p']) && $page_brwoser == 1) {
                    echo "{$page_indx}";
                }else {
                    echo "<a href='{$_SERVER['PHP_SELF']}'> {$page_indx}</a>";
                }
            }else {
                if ($page_brwoser == $page_indx) {
                    echo "{$page_indx}";
                } else {
                    echo "<a href='{$_SERVER['PHP_SELF']}?p={$page_indx}'style='text-decoration: none;'> .{$page_indx}.</a>";
                }
            }
            $page_indx ++;
        }
    }else{
        echo "error";
    }    
     return compact('record_start', 'record_no_per_page');
}
?>