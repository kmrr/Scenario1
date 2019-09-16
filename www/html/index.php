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
          <form action="./index.php" name="form1">
          <label>検索文字列：<input type="text" name="word"></label>
            <button onlick="return submit();">検索</button>
          </form>
      </div>
      <div>
        <table border=1>
            <tr>
                <td>id</td>
                <td>名前</td>
            </tr>
            <?php
                $sql = 'select * from store_info where name = "'.$word.'"';

                $result = $link->query($sql);
                if(!$result){
                    echo $link->error;
                    exit();
                }
                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                    $rows[] = $row;
                }
                $result->free();
                $link->close();

                foreach($rows as $row){
                    echo "<tr>";
                    echo "    <td>".$row['id']."</td>";
                    echo "    <td>".$row['name']."</td>";
                    echo "    <td>".$row['store_count']."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
      </div>
  </body>
</html>
