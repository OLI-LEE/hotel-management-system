<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>訂單模式</title>

     <link rel="stylesheet" href="style.css">
</head>


<body>

    <div id="div0">
    <h2><center> <a class="nav0"> 訂單模式 </a> </center></h2><br>
    </div><br>
    <div id="div1">
      <a class="nav1" href="index.php">回首頁</a>
    </div><br>
    <div id="div2">
      <a class="nav1" href="3.php"  >回上一頁</a> 
    </div>

<?php

$conn = mysqli_connect("localhost", "111dbb07", "udwbgzdg", "111dbb07");
 mysqli_query($conn, "SET NAMES utf8");
 mysqli_query($conn, "SET CHARACTER_SET_CLIENT=utf8");
 mysqli_query($conn, "SET CHARACTER_SET_RESULTS=utf8");
  

if (empty($_GET)){
    show($conn);
}elseif (count($_GET)==1){
    $orderid = $_GET['orderid'];
    $sql = "delete from`orders` where  orderid= '$orderid' ";
    $result = mysqli_query($conn, $sql) or die("刪除失敗".mysqli_error($conn));
    show($conn);
}else{
    $id = $_GET['id'];
    $no = $_GET['no'];
    $numpeople = $_GET['numpeople'];
    $numday = $_GET['numday'];
    $orderday = $_GET['orderday'];
    $ciday = $_GET['ciday'];
    $coday = $_GET['coday'];
    $pay = $_GET['pay'];
            //orderid 改為自動編號 
    $sql = "  
    Insert into `orders`(`id`, `no`, `numpeople`, `numday`, `orderday`, `ciday`, `coday`, `pay`)
     value ($id, $no, $numpeople, $numday, '$orderday', '$ciday', '$coday', '$pay')";
                                                  //文字得記得加上單引號

    $result = mysqli_query($conn, $sql) or die("新增 失敗".mysqli_error($conn));
    show($conn);
}


function show($conn){

            //下拉選單 客戶姓名
    $sql = "select * from customer ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
        echo "<form action='' method='get'>";
        echo " \t \t <select name=id>";
        while ($row != NULL){
                list($id, $name, $idcard, $tel, $address ,$email, $note) = $row;
                echo "<option value=$id>$name</option>";    //編號改為名子
        $row = mysqli_fetch_row($result);
      }
    echo "</select>";

echo " 訂購 ";

     //下拉選單 房型
    $sql = "select * from room";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
            echo "<select name=no>";
            while ($row != NULL){
                    list($no ,$type, $price, $floor, $fac, $add , $state) = $row;
                    echo "<option value=$no>$type </option>";
            $row = mysqli_fetch_row($result);
        }
    echo "</select>";

echo " \t <input type=text name=numpeople size=2> 人數";
echo " \t <input type=text name=numday size=2> 天數";
echo " \t <input type=text name=orderday size=6> 訂購日";
echo " \t <input type=text name=ciday size=6> 入住日";
echo " \t <input type=text name=coday size=6> 退房日";

//下拉式選單 付款方式 
    echo "\t <select name=pay>";
         echo "<option> 線上支付 </option>";
         echo "<option> 現場付款 </option>";
    echo "</select>";

//echo " <input type=text name=pay size=4> 付款方式";

echo " <input type=submit value=新增>";

echo "</form>"; 
echo "<br>"; 
//表單結束

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
            <th>刪除</th>
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

    echo "<td><a href=33.php?orderid=$orderid >刪除</a></td>";
                      
    echo "</tr>";
    $row = mysqli_fetch_row($result); 
  }
   echo "</table>";
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