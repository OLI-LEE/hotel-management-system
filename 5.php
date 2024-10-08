<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>處理程序</title>

  <link rel="stylesheet" href="style.css">
  
</head>



<body>

  <br>
  <div id="div0">
  <h2><center> <a class="nav0"> 處理程序</a> </center></h2><br>
  </div>
  <div id="div1">
    <a class="nav1" href="index.php">回首頁</a>
  </div>
  <div id="div2">
  <a class="nav1" href="55.php"  >進入模式</a> 
  </div>
  <br> 

<br>
  <center>  <img src="image/a5.png" width="65%">  </center>
  <br>

<div id="box">
  <center><font size="6"> <b> 處理程序詳細資料 </font> </b></center>
</div>
<br>
        <td>
            <br>
            <form action=""  method="get">
              使用「員工姓名」進行查詢: <br>
            <input type="text" name="key" value="">
            <input type="submit" name="search" value="搜尋">
            <input type="reset" name="reset" value="重置">
            </form>
            <br>
        </td>
<?php

$conn = mysqli_connect("localhost", "111dbb07", "udwbgzdg", "111dbb07");

if (mysqli_connect_errno()){
  echo "連線 至MySQL 失敗: " . mysqli_connect_error();
}
else{
  mysqli_query($conn, "SET NAMES utf8");
  mysqli_query($conn, "SET CHARACTER_SET_CLIENT=utf8");
  mysqli_query($conn, "SET CHARACTER_SET_RESULTS=utf8");
//查詢結果：     
if(isset($_GET["key"])){
  $key=$_GET["key"];
if($key != " "){


$conn = mysqli_connect("localhost", "111dbb07", "udwbgzdg", "111dbb07");

if (mysqli_connect_errno()){
  echo "連線 至MySQL 失敗: " . mysqli_connect_error();
}
else{
  mysqli_query($conn, "SET NAMES utf8");
  mysqli_query($conn, "SET CHARACTER_SET_CLIENT=utf8");
  mysqli_query($conn, "SET CHARACTER_SET_RESULTS=utf8");


  $sql = " select handle.handleid , staff.staffname  , 
                  room.type , handle.handletime , handle.situation
            from  staff inner join
            (room inner join handle 
              on room.no  = handle.no) 
              on staff.staffid = handle.staffid 
  where staffname like '%$key%'";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row ($result) ;

  echo '<table border="1" width="80%">';
  echo '<tr>   
        <th>處理編號</th>
        <th>員工姓名</th>
        <th>房間名稱</th>
        <th>處理時間</th>
        <th>處理狀態</th>
        </tr>';
    while ($row!=0){
      list( $handleid ,$staffname ,$type, $handletime ,$situation) = $row;
      echo "<tr>";
        echo "<td>  $handleid      </td>";
        echo "<td>  $staffname      </td>";
        echo "<td>  $type      </td>";
        echo "<td>  $handletime      </td>";
        echo "<td>  $situation       </td>";
      echo "</tr>";
      $row = mysqli_fetch_row($result); 
      }
      echo '</table>';
      $row = mysqli_fetch_row($result);
       }
       }
}else{
/////////////////////////////////////////////
   $sql =  "select handle.handleid , staff.staffname  ,
                   room.type , handle.handletime , handle.situation
            from  staff inner join
                  (room inner join handle 
                  on room.no  = handle.no) 
                  on staff.staffid = handle.staffid 
            ORDER BY `handleid`";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row ($result) ;
  echo '<table border="1" width="80%">';
  echo '<tr>
        <th>處理編號</th>
        <th>員工姓名</th>
        <th>房間名稱</th>
        <th>處理時間</th>
        <th>處理狀態</th>
        </tr>';
    while ($row!=0){
      list($handleid ,$staffname ,$type, $handletime ,$situation) = $row;
      echo "<tr>";
        echo "<td>  $handleid      </td>";
        echo "<td>  $staffname      </td>";
        echo "<td>  $type      </td>";
        echo "<td>  $handletime      </td>";
        echo "<td>  $situation       </td>";
      echo "</tr>";
      $row = mysqli_fetch_row($result); 
      }
      echo '</table>';
      $row = mysqli_fetch_row($result);
       }
     }
?>

<br><br>
<footer class="footer">
  <p>© Copyright <br>
        <script>
            document.write(new Date().getFullYear())
        </script>    -- TKU -- 111B -- 007 </p>
</footer>



</body>
</html>