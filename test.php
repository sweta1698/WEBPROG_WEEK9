<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>test</title>
    <style>
      #d1 {
        width: 300px;
        background: #FFF;
        padding: 15px 40px 40px;
        border: 1px solid #ccc;
        /*margin: 50px auto 0;*/
        border-radius: 5px;
      }
      body {
        font-size: 125%;
        background-image: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.1)), url("https://www.amity.edu/raipur/images/raipur.jpg");
        text-align: center;
      }
      h2 {
          text-align: center;
          text-decoration: underline;
      }
      form {
          width: 300px;
          background: #FFF;
          padding: 15px 40px 40px;
          border: 1px solid #ccc;
          margin: 50px auto 0;
          border-radius: 5px;
      }

      input, select {
          border: 1px solid #ccc;
          padding: 10px;
          display: block;
          width: 100%;
          box-sizing: border-box;
          border-radius: 2px;
      }
      .row {
          padding-bottom: 10px;
      }
      .form-inline {
          border: 1px solid #ccc;
          padding: 8px 10px 4px;
          border-radius: 2px;
      }
      .form-inline label, .form-inline input {
          display: inline-block;
          width: auto;
          padding-right: 15px;
      }
      .error {
          color: rgb(255, 238, 0);
          font-size: 90%;
      }
      input[type="submit"] {
          font-size: 110%;
          font-weight: 100;
          background: #006dcc;
          border-color: #016BC1;
          box-shadow: 0 3px 0 #0165b6;
          color: #fff;
          margin-top: 10px;
          cursor: pointer;
      }
    </style>
  </head>
  <body onload="setvars()">
    <center>
      <button><a href="home.html">Go Back</a></button>
      <br>
      <form name="test_form" method="post">
        <label><b>Welcome to Test!</b></label><br><br>
        <label><b>Q1.</b> In which year did India gain independence?</label>
        <input type="text" name="q1">

        <label><b>Q2.</b> What is the name of the first Indian satellite?</label>
        <input type="text" name="q2">

        <label><b>Q3.</b> What are the initials of the Indian space agency?</label>
        <input type="text" name="q3">

        <label><b>Q4.</b> What is the national animal of India?</label>
        <input type="text" name="q4">

        <!--<label><b>Q5.</b> What is the square of 8?</label>
        <input type="text" name="q5">-->

        <label><b>Q5.</b> What is <span id='variable1'></span> times <span id='variable2'></span>?
          <br><a href="http://localhost:8080/ajaxexample/" target="_blank">Number tables &rarr;</a>
        </label>
        <input type="text" name="q5">
        <!--<input type="hidden" id="vf1" name="varr1" >
        <input type="hidden" id="vf2" name="varr2" >-->
        <input type="hidden" id="q5a" name="q5ans" >

        <input type="submit" name="t_f_submit">
      </form>
    </center>
    <script>
    function setvars()
    {
      var str1 = Math.floor((Math.random()*20)+1);
      document.getElementById('variable1').innerHTML = str1;
      var str2 = Math.floor((Math.random()*10)+1);
      document.getElementById('variable2').innerHTML = str2;
      //document.getElementById('vf1').innerHTML = str1;
      /*var v1in = document.getElementById("vf1");
      v1in.value = str1;
      var v2in = document.getElementById("vf2");
      v2in.value = str2;*/
      var q5ansin = document.getElementById("q5a");
      q5ansin.value = str1*str2;
      //document.write(str1*str2);
    }
    </script>
  </body>
</html>
<?php
  echo "<center>";
  if(isset($_POST['t_f_submit']))
  {
    if(strlen($_POST['q1'])==0||strlen($_POST['q2'])==0||strlen($_POST['q3'])==0||strlen($_POST['q4'])==0||strlen($_POST['q5'])==0)
    {
      echo "<div id='d1'>attempt all questions";
    }
    else
    {
      echo "<div id='d1'>";
      $sum=0;
      $q=array(0,0,0,0,0);
      if($_POST['q1']=='1947')
      {
        $q[0]=1;
      }
      if($_POST['q2']=='Aryabhata'||$_POST['q2']=='aryabhata')
      {
        $q[1]=1;
      }
      if($_POST['q3']=='ISRO'||$_POST['q3']=='isro'||$_POST['q3']=='Isro')
      {
        $q[2]=1;
      }
      if($_POST['q4']=='Tiger'||$_POST['q4']=='tiger'||$_POST['q4']=='TIGER')
      {
        $q[3]=1;
      }
      /*if($_POST['q5']=='64'||$_POST['q5']=='sixty-four'||$_POST['q5']=='sixty four'||$_POST['q5']=='sixtyfour')
      {
        $q[4]=1;
      }*/
      if($_POST['q5']==$_POST['q5ans'])
      {
        $q[4]=1;
      }
      foreach($q as $i)
      {
        $sum+=$i;
      }
      echo "<br>You scored $sum/5 marks.";
      if($sum!=5)
      {
        echo "<br>Your wrong answer(s): ";
        for($i=0;$i<5;$i++)
        {
          if($q[$i]==0)
          {
            $qnum="q";
            $i++;
            $qnum.="$i";
            echo "<br>$_POST[$qnum] is wrong.";
            $i--;
          }
        }
      }
    }
    /*echo $var3;
    echo "lol1".$_POST['varr1'];
    echo "lol2".$_POST['varr2'];
    echo "lol2".$_POST['q5ans'];*/
    echo "</div>";
  }
  echo "</center>";

?>
