<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>處理模式</title>
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
   background-color:  #545454  ;
 }
.footer{
  color: white;
  text-align: center;
  background: #274C77;
  padding: 10px;
}

</style>

<body>

    <div id="div0">
    <h2><center> <a class="nav0"> 處理模式 </a> </center></h2><br>
    </div><br>
    <div id="div1">
      <a class="nav1" href="index.php">回首頁</a>
    </div><br>
    <div id="div2">
      <a class="nav1" href="5.php"  >回上一頁</a> 
    </div>

<?php

$conn = mysqli_connect("localhost", "111dbb07", "udwbgzdg", "111dbb07");
 mysqli_query($conn, "SET NAMES utf8");
 mysqli_query($conn, "SET CHARACTER_SET_CLIENT=utf8");
 mysqli_query($conn, "SET CHARACTER_SET_RESULTS=utf8");
  

if (empty($_GET)){
    show($conn);
}elseif (count($_GET)==1){
    $handleid = $_GET['handleid'];
    $sql = "delete from`handle` where  handleid= '$handleid' ";
    $result = mysqli_query($conn, $sql) or die("刪除失敗".mysqli_error($conn));
    show($conn);
}else{
    $staffid = $_GET['staffid'];
    $no = $_GET['no'];
    $handletime  = $_GET['handletime'];
    $situation = $_GET['situation'];
            //orderid 改為自動編號 
    $sql = "  
    Insert into `handle`(`staffid`, `no`, `handletime`, `situation`)
     value ($staffid, $no, '$handletime', '$situation')";
                                                  //文字得記得加上單引號

    $result = mysqli_query($conn, $sql) or die("新增 失敗".mysqli_error($conn));
    show($conn);
}


function show($conn){

            //下拉選單 員工姓名
    $sql = "select * from  staff ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
        echo "<form action='' method='get'>";
        echo "<select name=staffid>";
        while ($row != NULL){
                list($staffid , $staffname, $gender, $dept) = $row;
                echo "<option value=$staffid>$staffname</option>";    //編號改為名子
        $row = mysqli_fetch_row($result);
      }
    echo "</select>";

echo " 處理 ";

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

echo "  <input type=text name=handletime size=6> 處理時間 ";

//echo " <input type=text name=situation size=4> 處理狀態";

echo "<select name=situation>處理狀態";
         echo "<option> 處理完畢 </option>";
         echo "<option> 尚未處理 </option>";
    echo "</select>";

echo " <input type=submit value=新增>";

echo "</form>"; 
echo "<br>"; 
//表單結束

//inner join合併 //staff handle room 
$sql = "   
  select handle.handleid , staff.staffname  , room.type , handle.handletime , handle.situation
  from  staff inner join
        (room inner join handle 
      on room.no  = handle.no) 
      on staff.staffid = handle.staffid ORDER BY `handleid`";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);

echo '<table border="1" width="80%" >';
  echo '<tr>   
        <th>處理編號</th>
        <th>員工姓名</th>
        <th>房間名稱</th>
        <th>處理時間</th>
        <th>處理狀態</th>
        <th>刪除</th>
        </tr>';

while ($row != NULL){
    list( $handleid ,$staffname ,$type, $handletime ,$situation ) = $row;

    echo "<tr>";
    echo "<td>  $handleid      </td>";
    echo "<td>  $staffname      </td>";
    echo "<td>  $type      </td>";
    echo "<td>  $handletime      </td>";
    echo "<td>  $situation       </td>";

    echo "<td><a href=55.php?handleid=$handleid >刪除</a></td>";
                      
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