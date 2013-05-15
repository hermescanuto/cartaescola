
<h3>Your file was successfully uploaded!</h3>

<ul>
<?php
 foreach($upload_data as $file) {
    echo '<li><ul>';
    foreach ($file as $item => $value) {
        echo '<li>'.$item.': '.$value.'</li>';
    }
    echo '</ul></li>';
 } 
?>
</ul>
