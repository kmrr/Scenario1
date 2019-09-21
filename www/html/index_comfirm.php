<?php 
    $link = mysqli_connect('mysql', 'User', '12345678','TEST', 3306); 
    if(mysqli_connect_errno()){ 
        die('Cannot connect DB');
    }else{
        $link->set_charset("utf-8");
    }
    $word = $_GET['word'];
?>
<html>
  <head>
      <script>
          function(){
              document.form1.submit();
          }
      </script>
  </head>
  <body>
      <div>
          <form action="./index_comfirm.php" name="form1">
          <label>検索文字列：<input type="text" name="word"></label>
            <button onlick="return submit();">検索</button>
          </form>
      </div>
      <div>
        <table border=1>
            <tr>
                <td>id</td>
                <td>名前</td>
                <td>店舗数</td>
            </tr>
            <?php
                $sql = 'select * from store_info where name = ?';

                if($stmt = $link->prepare($sql)){
                    $stmt->bind_param("s", $word);
                    $stmt->execute();   
                    $stmt->bind_result($id, $name, $store_count);

                    while($stmt->fetch()){
                        echo "<tr>";
                        echo "    <td>".$id."</td>";
                        echo "    <td>".$name."</td>";
                        echo "    <td>".$store_count."</td>";
                        echo "</tr>";
                    }
                    $stmt->close();
                }
                ?>
        </table>
      </div>
  </body>
</html>