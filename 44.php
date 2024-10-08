<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>員工模式</title>

    
  <link rel="stylesheet" href="style.css">
</head>



<body>
    
<br>
            <div id="div0">
            <h2><center> <a class="nav0"> 員工模式 </a> </center></h2><br>
            </div><br>
            <div id="div1">
              <a class="nav1" href="index.php">回首頁</a>
            </div><br>
            <div id="div2">
              <a class="nav1" href="4.php"  >回上一頁</a> 
            </div>


<?php
 $conn = mysqli_connect("localhost", "111dbb07", "udwbgzdg", "111dbb07");
     mysqli_query($conn, 'SET NAMES utf8');
     mysqli_query($conn, 'SET CHARACTER_SET_CLIENT=utf8');
     mysqli_query($conn, 'SET CHARACTER_SET_RESULTS=utf8');

 if (empty($_GET)){
  show($conn);

 }elseif ($_GET["x"]=="刪除"){
      $staffid = $_GET['staffid'];
      $sql = "Delete from staff where staffid = '$staffid'";
      echo '<input type="hidden" name="x" value="刪除" />';
      $result = mysqli_query($conn, $sql) or die("刪除失敗".mysqli_error($conn));
      show($conn);
  //新增
  }elseif ($_GET["x"]=="新增"){
      $staffid = $_GET['staffid'];
      $staffname = $_GET['staffname'];
      $gender = $_GET['gender'];
      $dept = $_GET['dept'];

      $sql = "Insert  into staff (staffid, staffname ,gender , dept ) 
      values('$staffid', '$staffname', '$gender' , '$dept' )";
      echo '<input type="hidden" name="x" value="新增" />';
      $result = mysqli_query($conn, $sql) or die("新增 失敗".mysqli_error($conn));
      show($conn);
  }
 else{
  if ($_GET["x"]=="修改"){
      $staffid = $_GET['staffid'];
   $sql = "select * from `staff`  where staffid = $staffid ";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_row($result);
    list($staffid , $staffname, $gender, $dept) = $row;

    echo '<form name="form" action="" method="get">';
    echo "員工編號". '<input type="text" name="staffid" value=" '.$staffid. '" />';
    //echo "<input type='hidden' name='staffid' value=$staffid />";
    echo "員工姓名". '<input type="text" name="staffname" value="' . $staffname . '" />';
    echo "性別".'<input type="text" name="gender" value="' . $gender. '" />';
    echo "部門".'<input type="text" name="dept" value="' . $dept. '" />';
    echo '<input type="submit">';
    echo '<br>';
    echo '</form">';
  }else{
        $staffid = $_GET['staffid'];
        $staffname = $_GET['staffname'];
        $gender = $_GET['gender'];
        $dept = $_GET['dept'];
//修改
$sql = "Update `staff` Set  staffname='$staffname', gender='$gender', dept='$dept' where staffid=$staffid "; //一定要where
  $result = mysqli_query($conn, $sql) or die("更新失敗");
  show($conn);
    }
}


  function show($conn){

  $sql = "select * from `staff` order by staffid";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row($result); 

  echo "<form action='' method='get'>";
  echo '<input type="hidden" name="x" value="新增" />';
  echo " 員工編號&nbsp; <input type=text name=staffid size=10> ";
  echo " 員工姓名&nbsp; <input type=text name=staffname size=5> ";
  echo " 性別&nbsp;     <input type=text name=gender size=4> ";
  echo " 部門&nbsp;     <input type=text name=dept size=6>  ";

  echo " &nbsp;&nbsp;&nbsp;   <input type=submit value=新增>";
  echo "</form>";
  echo " <br>";


echo '<table border="1" width="80%">';
  echo '<tr>
        <th><nobr>員工編號</nobr></th>
          <th><nobr>員工姓名</nobr></th>
          <th><nobr>性別</nobr></th>
          <th><nobr>部門</nobr></th>

          <th><nobr>刪除</nobr></th>
          <th><nobr>修改</nobr></th>
        </tr>';

  while ($row != NULL){
    list($staffid , $staffname, $gender, $dept) = $row;
    
      echo "<tr>";
      echo "<td>  $staffid        </td>";
      echo "<td>  $staffname      </td>";
      echo "<td>  $gender    </td>";
      echo "<td>  $dept       </td>";

      echo "<td>  <a href=44.php?x=刪除&staffid=$staffid>刪除</a> </td>";
      echo "<td>  <a href=44.php?x=修改&staffid=$staffid>修改</a>  </td>";
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