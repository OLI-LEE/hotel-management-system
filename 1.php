<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>房間類型</title>

   <!-- Animate.css v4.1.1 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <link rel="stylesheet" href="style.css">
</head>
  

<body>



  <br>
  <div id="div0">
  <h2><center> <a class="nav0"> 房間類型 </a> </center></h2><br>
  </div>
      <div id="div1">
      <a class="nav1" href="index.php">回首頁</a>
      </div>

  <!---
  <div id="div2">
  <a class="nav1" href="11.php"  >進入模式</a> 
  </div>
  <br> --->

<!-----
<table border="0" align="center" width="80%">
  <tr>
    <td width="20%"> <h2>豪華雙人床</h2>
      採用king size寬敞雙人床，<br>本店最熱門房型
    </td>
    <td><center> <img src="11.jpg" width="80%"></center> </td>
    <td width="20%"><h2>標準雙人床</h2>
      採用標準規格雙人床，<br>溫馨兩人好選擇
    </td>
    <td> <img src="22.png"  width="100%" height="180%"></td>
  </tr>
   <tr>
    <td><h2>豪華兩床房</h2>
      每張採用單人加大床規格，<br>品質保證
    </td>
    <td> <center> <img src="33.jpg"  width="80%"> </center></td>
    <td><h2>標準兩床房</h2>
      每張採用標準單人床規格，<br>經濟實惠的好選擇
    </td>
    <td><img src="44.jpg"  width="100%"></td>
  </tr>
  <tr>
    <td><h2>豪華單人房</h2>
      採用單人加大床規格，<br>一個人也住的舒適
    </td>
    <td> <center> <img src="55.jpg"  width="80%"> </center></td>
    <td><h2>標準單人房</h2>
      採用標準單人床規格，<br>背包客的好選擇
    </td>
    <td><img src="66.jpg"  width="100%"></td>
  </tr>
  <tr>
    <td><h2>豪華四人房</h2>
      每張採用雙人加大床規格，<br>讓您賓至如歸
    </td>
    <td> <center> <img src="77.jpg"  width="80%"> </center></td>
    <td><h2>標準四人房</h2>
      每張採用標準雙人床規格，<br>讓您一覺好眠
    </td>
    <td><img src="88.jpg"  width="100%"></td>
  </tr>
</table>
------>
    <br>

<div id="box">
  <center><font size="6"> <b> 房間詳細資料 </font> </b></center>
</div>
<br>

        <td>
            <br>
            <form action=""  method="get">
             <b> 使用「房間名稱」進行查詢:</b> <br>
            <input type="text" name="key" value="輸入房間關鍵字">
            <input type="submit" name="search" value="搜尋">
            <input type="reset" name="reset" value="重置">
            </form>
            <br>
        </td>

        <td>
            <br>
            <form action=""  method="get">
             <b> 使用「樓層」進行查詢:</b> <br>
            <input type="text" name="key2" value="輸入樓層">
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


if(isset($_GET["key"])){
  $key=$_GET["key"];
if($key != " "){
$conn = mysqli_connect("localhost", "111dbb07", "udwbgzdg", "111dbb07");

if(mysqli_connect_errno()){
 echo "連線 至MySQL 失敗: " . mysqli_connect_error();
}
else{
 mysqli_query($conn, "SET NAMES utf8");
 mysqli_query($conn, "SET CHARACTER_SET_CLIENT=utf8");
 mysqli_query($conn, "SET CHARACTER_SET_RESULTS=utf8");

                    $sql = "select * from room where type like '%$key%'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_row ($result) ;

  echo '<table border="1" width="80%">';
  echo '<tr>
        <th>房間編號</th>
        <th>房型</th>
        <th>價錢</th>
        <th>樓層</th>
        <th width="180px">設備</th>
        <th width="150px">附加</th>
        <th>狀態<br>(剩餘房數)</th>
        <th>圖片</th>
        </tr>';
    while ($row!=0){
      list( $no ,$type, $price, $floor, $fac, $add , $state ,$img) = $row;
      echo "<tr>";
      echo "<td>  $no        </td>";
      echo "<td>  $type       </td>";
      echo "<td>  $price     </td>";
      echo "<td>  $floor    </td>";
      echo "<td>  $fac       </td>";
      echo "<td>  $add        </td>";
      echo "<td>  $state     </td>";
    echo "<td>   <img src='$img'width='450px'height='300px'>  </td> " ;
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

if(mysqli_connect_errno()){
 echo "連線 至MySQL 失敗: " . mysqli_connect_error();
}
else{
 mysqli_query($conn, "SET NAMES utf8");
 mysqli_query($conn, "SET CHARACTER_SET_CLIENT=utf8");
 mysqli_query($conn, "SET CHARACTER_SET_RESULTS=utf8");

                    $sql = "select * from room where floor like '%$key2%'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_row ($result) ;

  echo '<table border="1" width="80%">';
  echo '<tr>
        <th>房間編號</th>
        <th>房型</th>
        <th>價錢</th>
        <th>樓層</th>
        <th width="180px">設備</th>
        <th width="150px">附加</th>
        <th>狀態<br>(剩餘房數)</th>
        <th>圖片</th>
        </tr>';
    while ($row!=0){
      list( $no , $type, $price, $floor, $fac, $add , $state ,$img) = $row;
      echo "<tr>";
      echo "<td>  $no        </td>";
      echo "<td>  $type       </td>";
      echo "<td>  $price     </td>";
      echo "<td>  $floor    </td>";
      echo "<td>  $fac       </td>";
      echo "<td>  $add        </td>";
      echo "<td>  $state     </td>";
    echo "<td>   <img src='$img'width='450px'height='300px'>  </td> " ;
      echo "</tr>";
      $row = mysqli_fetch_row($result); 
      }
      echo '</table>';
      $row = mysqli_fetch_row($result);
       }
     }
/////////////////////////////////////////////////
}else{
/////////////////////////////////////////////////
  $sql = "select * from room ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row ($result) ;
  echo '<table border="1" width="80%">';
  echo '<tr>
        <th>房間編號</th>
        <th>房型</th>
        <th>價錢</th>
        <th>樓層</th>
        <th width="180px">設備</th>
        <th width="150px">附加</th>
        <th>狀態<br>(剩餘房數)</th>

        <th>圖片</th>
        </tr>';
    while ($row!=0){
      list( $no ,$type, $price, $floor, $fac, $add , $state , $img ) = $row;
      echo "<tr>";
      echo "<td>  $no        </td>";
      echo "<td>  $type       </td>";
      echo "<td>  $price     </td>";
      echo "<td>  $floor    </td>";
      echo "<td>  $fac       </td>";
      echo "<td>  $add        </td>";
      echo "<td>  $state     </td>";
    echo "<td>   <img src='$img'width='450px'height='300px'>  </td> " ;

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