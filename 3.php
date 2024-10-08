<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>訂單資料</title>

  <link rel="stylesheet" href="style.css">
</head>


<body>

      <br>
    <div id="div0">
    <h2><center> <a class="nav0"> 訂單資料 </a> </center></h2><br>
    </div><br>
    <div id="div1">
      <a class="nav1" href="index.php">回首頁</a>
    </div>
     <div id="div2">
    <a class="nav1" href="33.php"  >進入模式</a> 
  </div>


    <center>  <img src="image/a3.png" width="70%">  </center>
<br>


<div id="box">
  <center><font size="6"> <b> 訂購資料 </font> </b></center>
</div>
<br>
        <td>
            <br>
            <form action=""  method="get">
              使用「顧客姓名」進行查詢: <br>
            <input type="text" name="key" value="輸入關鍵字">
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

        $sql = "
          select orders.orderid ,customer.name , room.type , room.price , orders.numpeople , orders.numday , orders.orderday , orders.ciday , orders.coday , orders.pay
          
          from  customer inner join
              (room inner join orders 
              on room.no=orders.no  ) 
              on customer.id = orders.id 
      
      where name like '%$key%'   ";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row ($result) ;

  echo '<table border="1" width="80%" >';
  echo '<tr>         
        <th>編號</th>
        <th>顧客<br>姓名</th>
        <th>房型</th>
        <th>價錢</th>
        <th>入住<br>人數</th>
        <th>入住<br>天數</th>
        <th>訂購<br>日期</th>
        <th>入住<br>日期</th>
        <th>退房<br>日期</th>
        <th>付款<br>方式</th>     
        <th>總價</th>
        </tr>';
while ($row != NULL){
    list( $orderid ,$name ,$type ,$price, $numpeople , $numday ,$orderday, $ciday, $coday, $pay) = $row;

    $total = $price*$numday;
    echo "<tr>";
    echo "<td>  $orderid      </td>";
    echo "<td>  $name      </td>";
    echo "<td>  $type      </td>";
    echo "<td>  $price     </td>";
    echo "<td>  $numpeople      </td>";
    echo "<td>  $numday       </td>";
    echo "<td>  $orderday       </td>";
    echo "<td>  $ciday       </td>";
    echo "<td>  $coday      </td>";
    echo "<td>  $pay       </td>";
    echo "<td>  $total </td>";
                      
    echo "</tr>";
    $row = mysqli_fetch_row($result); 
  }
   echo "</table>";
 }
}

}else{
//inner join合併 //customer orders room 
$sql = "   
  select orders.orderid ,customer.name  , room.type , room.price , orders.numpeople , orders.numday , orders.orderday , orders.ciday , orders.coday , orders.pay
  from  customer inner join
        (room inner join orders 
      on room.no=orders.no) 
      on customer.id = orders.id ORDER BY `orderid`";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);

echo '<table border="1" width="80%" >';
  echo '<tr>
           
        <th>編號</th>
        <th>顧客<br>姓名</th>
        <th>房型</th>
        <th>價錢</th>
        <th>入住<br>人數</th>
        <th>入住<br>天數</th>
        <th>訂購<br>日期</th>
        <th>入住<br>日期</th>
        <th>退房<br>日期</th>
        <th>付款<br>方式</th>     
            <th>總價</th>
        </tr>';

while ($row != NULL){
    list( $orderid ,$name ,$type ,$price, $numpeople , $numday ,$orderday, $ciday, $coday, $pay) = $row;

    $total = $price*$numday;

    echo "<tr>";
    echo "<td>  $orderid      </td>";
    echo "<td>  $name      </td>";
    echo "<td>  $type      </td>";
    echo "<td>  $price     </td>";
    echo "<td>  $numpeople      </td>";
    echo "<td>  $numday       </td>";
    echo "<td>  $orderday       </td>";
    echo "<td>  $ciday       </td>";
    echo "<td>  $coday      </td>";
    echo "<td>  $pay       </td>";
    echo "<td>  $total </td>";
                      
    echo "</tr>";
    $row = mysqli_fetch_row($result); 
  }
   echo "</table>";
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