<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>客戶模式</title>
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
      width:18%;
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
      left: 300px;
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
      left: 530px;
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
            <h2><center> <a class="nav0"> 客戶模式 </a> </center></h2><br>
            </div><br>
            <div id="div1">
              <a class="nav1" href="index.php">回首頁</a>
            </div><br>
            <div id="div2">
              <a class="nav1" href="2.php"  >回上一頁</a> 
            </div>


<?php
 $conn = mysqli_connect("localhost", "111dbb07", "udwbgzdg", "111dbb07");
     mysqli_query($conn, 'SET NAMES utf8');
     mysqli_query($conn, 'SET CHARACTER_SET_CLIENT=utf8');
     mysqli_query($conn, 'SET CHARACTER_SET_RESULTS=utf8');

 if (empty($_GET)){
  show($conn);

 }elseif ($_GET["x"]=="刪除"){
      $id = $_GET['id'];
      $sql = "Delete from customer where id = '$id'";
      echo '<input type="hidden" name="x" value="刪除" />';
      $result = mysqli_query($conn, $sql) or die("刪除失敗".mysqli_error($conn));
      show($conn);
  //新增
  }elseif ($_GET["x"]=="新增"){
      $id = $_GET['id'];
      $name = $_GET['name'];
      $idcard = $_GET['idcard'];
      $tel = $_GET['tel'];
      $address = $_GET['address'];
      $email = $_GET['email'];
      $note = $_GET['note'];

      $sql = "Insert  into customer (id, name , idcard, tel, address, email , note) 
      values('$id', '$name', '$idcard', '$tel', '$address', '$email', '$note' )";
      echo '<input type="hidden" name="x" value="新增" />';
      $result = mysqli_query($conn, $sql) or die("新增 失敗".mysqli_error($conn));
      show($conn);
  }
 else{
  if ($_GET["x"]=="修改"){
      $id = $_GET['id'];
   $sql = "select * from `customer`  where id = $id ";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_row($result);
    list($id, $name, $idcard, $tel, $address ,$email, $note) = $row;

    echo '<form name="form" action="" method="get">';

    echo "顧客編號".$id.'<br>';
    echo "<input type='hidden' name='id' value=$id />";
    echo "顧客姓名". '<input type="text" name="name" value="' . $name . '" />';
    echo "身分證".'<input type="text" name="idcard" value="' . $idcard. '" />';
    echo "電話".'<input type="text" name="tel" value="' . $tel. '" />';
    echo "地址".'<input type="text" name="address" value="' . $address. '" />'.'<br>';
    echo "email".'<input type="text" name="email" value="' . $email . '" />';
    echo "備註".'<input type="text" name="note" value="' . $note. '" />'.'<br>';
    echo '<input type="submit">';
    echo '<br>';
    echo '</form">';
  }else{
        $id = $_GET['id'];
        $name = $_GET['name'];
        $idcard = $_GET['idcard'];
        $tel = $_GET['tel'];
        $address = $_GET['address'];
        $email = $_GET['email'];
        $note = $_GET['note'];
//修改
$sql = "Update `customer` Set name='$name', idcard='$idcard', 
                          tel='$tel', address='$address' , email='$email', 
                          note='$note' WHERE id=$id "; //一定要where
  $result = mysqli_query($conn, $sql) or die("更新失敗");
  show($conn);
    }
}


  function show($conn){

  $sql = "select * from `customer` order by id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row($result); 

  echo "<form action='' method='get'>";
  echo '<input type="hidden" name="x" value="新增" />';
  echo " 顧客姓名&nbsp; <input type=text name=name size=3> ";
  echo " 身分證&nbsp;  <input type=text name=idcard size=15> ";
  echo " 電話&nbsp;  <input type=text name=tel size=9>  ";
   echo " <br><br>";
  echo " 地址&nbsp;  <input type=text name=address size=20>  ";
  echo " email&nbsp;  <input type=text name=email size=20>  ";
  echo " 備註&nbsp;   <input type=text name=note size=3>  ";
  echo " &nbsp;&nbsp;&nbsp;   <input type=submit value=新增>";
  echo "</form>";
  echo " <br>";


echo '<table border="1" width="80%">';
  echo '<tr>
        <th><nobr>顧客編號</nobr></th>
          <th><nobr>顧客姓名</nobr></th>
          <th><nobr>身份證</nobr></th>
          <th><nobr>電話</nobr></th>
          <th><nobr>地址</nobr></th>
          <th><nobr>email</nobr></th>
           <th><nobr>備註</nobr></th>
          <th><nobr>刪除</nobr></th>
          <th><nobr>修改</nobr></th>
        </tr>';

  while ($row != NULL){
    list($id, $name, $idcard, $tel, $address ,$email, $note) = $row;
    
      echo "<tr>";
      echo "<td>  $id        </td>";
      echo "<td>  $name      </td>";
      echo "<td>  $idcard    </td>";
      echo "<td>  $tel       </td>";
      echo "<td>  $address   </td>";
      echo "<td>  $email     </td>";
      echo "<td>  $note      </td>";
      echo "<td>  <a href=22.php?x=刪除&id=$id>刪除</a> </td>";
      echo "<td>  <a href=22.php?x=修改&id=$id>修改</a>  </td>";
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