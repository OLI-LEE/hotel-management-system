<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>員工資訊</title>

  <link rel="stylesheet" href="style.css">

</head>

<body>

  <br>
  <div id="div0">
  <h2><center> <a class="nav0"> 員工資訊</a> </center></h2><br>
  </div>
  <div id="div1">
    <a class="nav1" href="index.php">回首頁</a>
  </div>
   <div id="div2">
    <a class="nav1" href="44.php"  >進入模式</a> 
  </div>

<br>
  <center>  <img src="image/a4.png" width="70%">  </center>
<br>


<div id="box">
  <center><font size="6"> <b> 員工詳細資訊 </font> </b></center>
</div>
<br>
</div>

        <td>
            <br>
            <form action=""  method="get">
              使用「員工編號」進行查詢: <br>
            <input type="text" name="key" value="">
            <input type="submit" name="search" value="搜尋">
            <input type="reset" name="reset" value="重置">
            </form>
            <br>
        </td>

        <td>
            <br>
            <form action=""  method="get">
              使用「員工姓名」進行查詢: <br>
            <input type="text" name="key2" value="">
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
/////////////////////////////////////////////////////////////////////////
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

  $sql = "select * from staff where staffid like '%$key%'";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row ($result) ;

  echo '<table border="1" width="80%">';
  echo '<tr>
        <th>員工編號</th>
        <th>員工姓名</th>
        <th>姓別</th>
        <th>部門</th>
        </tr>';
    while ($row!=0){
      list( $staffid , $staffname, $gender, $dept) = $row;
      echo "<tr>";
      echo "<td>  $staffid        </td>";
      echo "<td>  $staffname        </td>";
      echo "<td>  $gender      </td>";
      echo "<td>  $dept    </td>";
      echo "</tr>";
      $row = mysqli_fetch_row($result); 
      }
      echo '</table>';
      $row = mysqli_fetch_row($result);
       }
       }
///////////////////////////////////////////////////////////////////
}elseif(isset($_GET["key2"])){
  $key2=$_GET["key2"];
if($key2 != " "){

$conn = mysqli_connect("localhost", "111dbb07", "udwbgzdg", "111dbb07");

if (mysqli_connect_errno()){
  echo "連線 至MySQL 失敗: " . mysqli_connect_error();
}
else{
  mysqli_query($conn, "SET NAMES utf8");
  mysqli_query($conn, "SET CHARACTER_SET_CLIENT=utf8");
  mysqli_query($conn, "SET CHARACTER_SET_RESULTS=utf8");

  $sql = "select * from staff where staffname like '%$key2%'";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row ($result) ;

  echo '<table border="1" width="80%">';
  echo '<tr>
        <th>員工編號</th>
        <th>員工姓名</th>
        <th>姓別</th>
        <th>部門</th>
        </tr>';
    while ($row!=0){
      list( $staffid , $staffname, $gender, $dept) = $row;
      echo "<tr>";
      echo "<td>  $staffid        </td>";
      echo "<td>  $staffname        </td>";
      echo "<td>  $gender      </td>";
      echo "<td>  $dept    </td>";
      echo "</tr>";
      $row = mysqli_fetch_row($result); 
      }
      echo '</table>';
      $row = mysqli_fetch_row($result);
       }
       }
////////////////////////////////////////////////////////////////////////
}else{
  $sql = "SELECT * FROM `staff`";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row ($result) ;
  echo '<table border="1" width="80%">';
  echo '<tr>
        <th>員工編號</th>
        <th>員工姓名</th>
        <th>姓別</th>
        <th>部門</th>
        </tr>';
    while ($row!=0){
      list( $staffid , $staffname, $gender, $dept) = $row;
      echo "<tr>";
      echo "<td>  $staffid        </td>";
      echo "<td>  $staffname        </td>";
      echo "<td>  $gender      </td>";
      echo "<td>  $dept    </td>";
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