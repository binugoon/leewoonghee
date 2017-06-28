<?
   // ÀÌÀüÈ­¸é¿¡¼­ ÀÌ¸§ÀÌ ÀÔ·ÂµÇÁö ¾Ê¾ÒÀ¸¸é "ÀÌ¸§À» ÀÔ·ÂÇÏ¼¼¿ä"
   // ¸Þ½ÃÁö Ãâ·Â
   if(!$id) {
     echo("
           <script>
             window.alert('아이디를 입력하세요.')
             history.go(-1)
           </script>
         ");
         exit;
   }

   if(!$passwd) {
     echo("
           <script>
             window.alert('비밀번호를 입력하세요.')
             history.go(-1)
           </script>
         ");
         exit;
   }

   include "../dbconn.php";

   $sql = "select * from member where id='$id'";
   $result = mysql_query($sql, $connect);

   $num_match = mysql_num_rows($result);

   if(!$num_match) 
   {
     echo("
           <script>
             window.alert('로그인이 안됩니다.')
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $row = mysql_fetch_array($result);

        $db_passwd = $row[passwd];

        if($passwd != $db_passwd)
        {
           echo("
              <script>
                window.alert('비밀번호를 다시 입력하세요.')
                history.go(-1)
              </script>
           ");

           exit;
        }
        else
        {
           $userid = $row[id];
           $username = $row[name];

           session_start();
           session_register(userid);
           session_register(username);

           echo("
              <script>
                top.location.href = '../index.php';
              </script>
           ");
        }
   }        
      
?>
