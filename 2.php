<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>客戶資訊</title>
</head>

<style type="text/css">
body{
      background: #A3CEF1 ;
      font-size: 22px;
}

table{
      position: top ;
      margin-right: auto;
      margin-left: auto;
      font-size: 18px;
      background: #E7ECEF ;
      text-align:center;    
}

#div0{
      color: black;
      text-align:center;
      width:15%;
      height: 90px;
      display: block;
      background-image: url(00.png) ;
      padding-top: 5px;
      padding-bottom: 5px;
      border-radius:20px;
      margin: left ;
      background-size: 170%;
}
#div1{
      color: black;
      text-align:center;
      width:15%;
      display: block;
      background-color: #274C77;
      padding-top: 5px;
      padding-bottom: 5px;
      border-radius:20px;
      margin: left ;

      position: absolute;
      width: 200px;
      height: 80px;
      left: 250px;
      top: 40px;

}
#div2{
      color: black;
      text-align:center;
      width:15%;
      display: block;
      background-color: #274C77;
      padding-top: 5px;
      padding-bottom: 5px;
      border-radius:20px;
      margin: left ;

      position: absolute;
      width: 200px;
      height: 80px;
      left: 470px;
      top: 40px;
}

a.nav0{
            padding:10px 20px;
            text-decoration:none;
            background-color:white;
            opacity: 0.9;
            color:black;
            border-radius:20px;  
            line-height:15px;
            font-weight: bold;
            }
a.nav1{
            padding:20px 20px;
            text-decoration:none;
            background-color:white;
            opacity: 0.9;
            color:black;
            border-radius:20px;  
            line-height:80px;
            font-weight: bold;
            }

a.nav1:hover, a:active{
    background-color:   #FFFF59 ;
}

td:hover {
            background-color: #FFFF59;
        }

#box{
   position: center;
   background-color:  #274C77  ;
    color: white;
    padding: 8px;
 }

.footer{
  color: white;
  text-align: center;
  background: #274C77;
  padding: 10px;
}

</style>

<body>

  <br>
  <div id="div0">
  <h2><center> <a class="nav0"> 客戶資訊</a> </center></h2><br>
  </div>
  <div id="div1">
    <a class="nav1" href="index.php">回首頁</a>
  </div>
  <div id="div2">
    <a class="nav1" href="22.php"  >進入模式</a> 
  </div>

<br>
  <center>  <img src="a2.png" width="70%">  </center>
<br>

<div id="box">
  <center><font size="6"> <b> 客戶詳細資訊 </font> </b></center>
</div>

<br>
        <td>
            <br>
            <form action=""  method="get">
              使用「客戶姓名」進行查詢: <br>
            <input type="text" name="key" value="輸入顧客姓名">
            <input type="submit" name="search" value="搜尋">
            <input type="reset" name="reset" value="重置">
            </form>
            <br>
        </td>

        <td>
            <br>
            <form action=""  method="get">
              使用「身分證」進行查詢: <br>
            <input type="text" name="key2" value="輸入身分證">
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

  $sql = "select * from customer where name like '%$key%'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row ($result) ;

  echo '<table border="1" width="80%">';
  echo '<tr>
        <th>顧客編號</th>
        <th>姓名</th>
        <th>身分證</th>
        <th>電話</th>
        <th>地址</th>
        <th>email</th>
        <th>備註</th>
        </tr>';
    while ($row!=0){
      list( $id, $name, $idcard, $tel, $address ,$email, $note) = $row;
      echo "<tr>";
      echo "<td>  $id    </td>";
      echo "<td>  $name    </td>";
      echo "<td>  $idcard      </td>";
      echo "<td>  $tel       </td>";
      echo "<td>  $address       </td>";
      echo "<td>  $email       </td>";
      echo "<td>  $note      </td>";
      echo "</tr>";
      $row = mysqli_fetch_row($result); 
      }
      echo '</table>';
      $row = mysqli_fetch_row($result);
       }
       }
//////////////////////////////////////////////////////
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

  $sql = "select * from customer where idcard like '%$key2%'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row ($result) ;

  echo '<table border="1" width="80%">';
  echo '<tr>
        <th>顧客編號</th>
        <th>姓名</th>
        <th>身分證</th>
        <th>電話</th>
        <th>地址</th>
        <th>email</th>
        <th>備註</th>
        </tr>';
    while ($row!=0){
      list( $id, $name, $idcard, $tel, $address ,$email, $note) = $row;
      echo "<tr>";
      echo "<td>  $id    </td>";
      echo "<td>  $name    </td>";
      echo "<td>  $idcard      </td>";
      echo "<td>  $tel       </td>";
      echo "<td>  $address       </td>";
      echo "<td>  $email       </td>";
      echo "<td>  $note      </td>";
      echo "</tr>";
      $row = mysqli_fetch_row($result); 
      }
      echo '</table>';
      $row = mysqli_fetch_row($result);
       }
       }
//////////////////////////////////////////////////////
}else{   
  $sql = "select * from customer ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row ($result) ;
  echo '<table border="1" width="80%">';
  echo '<tr>
        <th>顧客編號</th>
        <th>姓名</th>
        <th>身分證</th>
        <th>電話</th>
        <th>地址</th>
        <th>email</th>
        <th>備註</th>
        </tr>';
    while ($row!=0){
      list( $id, $name, $idcard, $tel, $address ,$email, $note) = $row;
      echo "<tr>";
      echo "<td>  $id        </td>";
      echo "<td>  $name      </td>";
      echo "<td>  $idcard    </td>";
      echo "<td>  $tel       </td>";
      echo "<td>  $address   </td>";
      echo "<td>  $email     </td>";
      echo "<td>  $note      </td>";
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