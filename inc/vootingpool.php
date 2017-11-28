 <script type="text/javascript">
    function ajax_poll(data)
    {
        if(window.XMLHttpRequest)
        {
            var xmlhttp=new XMLHttpRequest();
        }
        else
        {
             // code for IE6, IE5
            var xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
         xmlhttp.onreadystatechange=function(){
         if(xmlhttp.readyState==4  && xmlhttp.status==200)
         {
            document.getElementById("response").innerHTML=xmlhttp.responseText;
         }
        }
         xmlhttp.open("GET","api/voting.php?r="+data);
         xmlhttp.send();
    }
    </script>

        <div class="col-lg-6">
            <div class="news_pool">
        <?php
             $pool = new VotingPool();
              $guestionans = $pool->getQuestionAns();
              if ($guestionans) {
                while ($result = $guestionans->fetch_assoc()) {
          ?>
                <h1><?php echo $result['question'];?></h1>

                <div class="news_pool_option">
            
                        <div class="radio">
                            <label style="font-size: 18px;">
                                <input type="radio" value="vot1" onClick="ajax_poll(this.value)" name="vot" id="blankRadio1" aria-label="..."><?php echo $result['ans1'];?>
                            </label>
                         </div>
                         <div class="radio">
                            <label style="font-size: 18px;">
                                <input type="radio" value="vot2" onClick="ajax_poll(this.value)" name="vot" id="blankRadio1" aria-label="..."><?php echo $result['ans2'];?>
                            </label>
                         </div>
                         <div class="radio">
                            <label style="font-size: 18px;">
                                <input type="radio" value="vot3" onClick="ajax_poll(this.value)" name="vot" id="blankRadio1" aria-label="..."><?php echo $result['ans3'];?>

                                  <input type="hidden" value="<?php echo $result['id'];?>" onClick="ajax_poll(this.value)" name="id" id="blankRadio1" aria-label="...">
                            </label>
                         </div>

                             <div id="response"></div>
                             
                   
                </div>
           <?php } } ?>   
            </div>
        </div>