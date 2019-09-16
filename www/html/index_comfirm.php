<?php 
    $link = mysqli_connect('172.30.0.2', 'User', '12345678','TEST', 13306); 
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
          <form action="./index_confirm.php" name="form1">
          <label>検索文字列：<input type="text" name="word"></label>
            <button onlick="return submit();">検索</button>
          </form>
      </div>
      <div>
        <table>
            <tr>
                <td>id</td>
                <td>名前</td>
            </tr>
            <?php
                $sql = 'select * from TEST where name = ?';

                if($stmt = $mysqli->prepare($sql)){
                    $stmt->bind_param("s", $word);
                    $stmt->execute();   
                    $stmt->bind_result($id, $name, $count);

                    while($$stmt->fetch()){
                        echo "<tr>";
                        echo "    <td>".$id."</td>";
                        echo "    <td>".$name."</td>";
                        echo "    <td>".$count."</td>";
                        echo "</tr>";
                    }
                }
                $stmt->close();
                ?>
        </table>
      </div>
  </body>
</html>