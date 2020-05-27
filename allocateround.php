<?php
//error_reporting(0);

if(isset($_COOKIE['sid']))
{
  include 'api/db.php';
  //hii by AD
  $cursor = $db->session->findOne(array("sid" => $_COOKIE['sid']));
  
  if($cursor)
  {
    $cursor = $db->users->findOne(array("uid" => $cursor['uid']));
    $designation = $cursor['dsg'];
    
    if($designation == "hr" || $designation == "ceo" || $designation == "hod" || $designation == "rghead" )
    {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" media="screen" href="public/css/materialize.css">
    <link rel="stylesheet" type="text/css" media="screen" href="public/css/materialize.min.css">

        <!-- for sidenav -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" type="text/css" media="screen" href="public/css/common.css">

    <script src="public/jquery-3.2.1.min.js"></script>

    <script src="public/js/materialize.js"></script>
    <script src="public/js/materialize.min.js"></script>

</head>
<script>
function abort_round()
{
  var confr = confirm("This Rouncd Will Be Removed From The Process \n Are You Sure ?");
  if(confr)
  {
 
    $.ajax({
  url:"http://localhost/hrms/api/abortround.php",
type:"POST",
data: {
  "digit13" :  id_round
},
success:function(para){
console.log(para)
if(para=="success")
{
  document.location.reload();
  }
else
{
  console.log("something went wrong")
}
} 

})
 
  }
}
</script>
<body>

<div id="sidenn" class="w3-sidebar blue w3-bar-block sidemenu" style="border: 5px solid white;z-index: 1000">

  <h3 class="w3-bar-item white"> <center><a href="/hrms/">Home</a>
  <i id="remin" class="material-icons" style="float: right;cursor: pointer;">close</i></center>   
  </a></h3> <br><br>

  <a href="/hrms/csvupload.php" class="w3-bar-item w3-button">Create new Department and PRF</a> <br>
  <a href="/hrms/hrnew.php" class="w3-bar-item w3-button">Create New Instance</a> <br>
  <a href="/hrms/initiateround.php" class="w3-bar-item w3-button">Initiate rounds for instances</a> <br>
  <a href="/hrms/allocateround.php" class="w3-bar-item w3-button">On going rounds</a> <br>
  <a href="/hrms/history.php" class="w3-bar-item w3-button">See History  </a> <br>
  <a href="/hrms/allocateround2.php" class="w3-bar-item w3-button">Rescheduling</a> <br>
  <a href="/hrms/interview.php" class="w3-bar-item w3-button">Update Interviews</a> <br>
  <a href="/hrms/offerletter.php" class="w3-bar-item w3-button">Offer Letter</a> <br>
  <a href="#" id="logoutuser" class="w3-bar-item w3-button">Logout</a> <br>

</div>

<div id="remin">
<nav> 
    <div class="nav-wrapper blue darken-1">
      <a href="#!" class="brand-logo left" style="margin-left: 2%;"><i id="showsidenbutton" class="material-icons">menu</i>
    </a>
    <a href="/hrms/" class="brand-logo center">thyssenkrupp</a>
    </div>
</nav>
<br><br>
<!-- nav and side menu ended -->
    
                  <div class="row">
                    <div class="col s12 m12">
                      <div class="card  white">
                        <div class="card-content blue-text">
                            <table class="striped">
                                <thead>
                                  <tr>
                                      <th>Completed Rounds</th>
                                      <th>Create Next Round</th>
                                      
                                  </tr>
                                </thead>
                                <tbody id="addtr">
                                  
                                </tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <center>
                  <b><p id="waiting" style="color:red">Updating Details Please Wait...</p></b>
                  </center>
                  <div class="row" id="allocatingcandidate" >
                    <div class="col s12 m12">
                      <div class="card  white">
                        <div class="card-content blue-text">
                          <p id='rid'><b></b></p>
                          <div class="row" id="allocation" >
                            <div class="col s12 m12" style="border: solid 5p">
                              <div class="card white">
                                <div class="card-content blue-text">
                                  <div class="row">
                                
                                  <div class="input-field col s3 m3 " >
                                      <input id="iname" type="text" class="text">
                                      <label class="active" for="iname" id="iname" required>Interviewer Name</label>
                                    </div>  

                                    <div class="input-field col s3 m3 white-text" >
                                      <input id="imail" type="text" >
                                      <label class="active" for="iname" required>Interwiever Mail ID</label>
                                    </div>

                                    <div class="input-field col s3 m3 white-text" >
                                      <input id="iloc" type="text" >
                                      <label class="active" for="iloc" required>Interview Location</label>
                                    </div>

                                    <div class="input-field col s3 m3 white-text" >
                                      <input id="iperson" type="text" >
                                      <label class="active" for="iperson" required>Contact Person</label>
                                    </div>        
                                  </div>
                                    
                                    <div class="row">
                                        <div class="input-field col s3 m3">
                                          <input id="idate" type="text" class="datepicker" required>
                                          <label  for="idate">Date</label>
                                        </div>
                                        <div class="input-field col s3 m3 " >
                                          <input id="itime" type="text" class="timepicker" required>
                                          <label class="active" for="itime">Time</label>
                                        </div>
                                        <div class="input-field col s3 m3 " >
                                          <input id="idept" type="text" class="text">
                                          <label class="active" for="idept" id="idept" required>Interviewer Department</label>
                                        </div>                                    
                                        <div class="input-field col s3 m3 " >
                                          <input id="idesg" type="text" class="text">
                                          <label class="active" for="idesg" id="idesg" required>Interviewer Designation</label>
                                        </div>
                                    </div>          
                                  

                                  <div class="row">
                                    <button class="btn waves-effect blue darken-1 col m3 s3 offset-m4" type="submit" id='allocatesubmit'>Submit
                                    <i class="material-icons right">send</i>
                                    </button>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                          <table class="striped">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Mail ID</th>
                                <th>Select</th>
                                <th class="btn blue darken-1" id="submit" disabled>Assign Interviewer</th>
                                <th class="btn red" style="margin-left: 25px;" id="abort" onclick="abort_round()"> Abort</th>

                              </tr>
                            </thead>
                            <tbody id="adddetail">
                              <tr>
                              </tr>
                            </tbody>
                            
                            </table>
                            <br>
                            <div id="noselect">
                            </div>
                            <a class="waves-effect red btn" disabled  id="completeprocess"  onclick="terminateround(this.id)" >Complete Interview Process</a>

                        </div>          
                      </div>
                    </div>
                  </div>
                  </div>
                  <div class="row" >
      <center>
      <p style="color: green" id="sendingmail">Sending Mail to the candidate...Please Wait !  </p>
      <p style="color: green" id="sentsuccess">Mail sent successfully </p>
      <p style="color: red" id="fail">Unable to send mail </p>
      </center>
  </div>

<center>
<p id="nodata"><b style="color:red;margin-left:12%;">No Data Available..!</b></p>
</center>                          
<script src="public/js/common.js"></script>

<script>
$('#sentsuccess').hide()
$('#fail').hide()
$('#noselected').hide()
$('#sendingmail').hide()
var selectedmail = []
var allmail = []
$(document).ready(function(){
  $('#nodata').hide()
  $('.datepicker').datepicker
  ({
      minDate:new Date(),
  })
  $('.timepicker').timepicker();



$("#waiting").hide();
$.ajax(
  {
    url:'http://localhost/hrms/api/allocateround.php',
    type:'GET',
    success:function(para){
      if(para=='no data')
      {
        $('#nodata').fadeIn(600)
      }
      else
      {
        var arr = JSON.parse(para)
        console.log(para)
        var oldarr = []



        for(let i =0;i<arr.length;i++)
        {
            if(oldarr.indexOf(arr[i]) == -1)
            {
              oldarr.push(arr[i])
              var s1='<tr id="'+arr[i]+'row">'
            var s2='<td>'
            var s3='<p class="btn waves-effect blue darken-1" >'+arr[i]+'</p></td><td>'
            var s4='<button class="waves-effect green  btn"  id='+arr[i]+' onclick="createnextround(this.id)">See Members</button></td></tr>'
            var str=s1+s2+s3+s4
            $('#addtr').append(str)
            }
        }
      }
      
  }

})


$('#allocation').hide();
$('#allocatingcandidate').hide();


$('#submit').click(function()
{
  if(selectedmail.length <= 0)
    {
      alert("Please Select Atleast 1 Member")
    }
    else
    {
  for(let i=0;i<selectedmail.length;i++)
  {
    console.log(selectedmail[i])
  }

$('#allocation').show(600);

    }                      
})

$('#allocatesubmit').click(function()
{
  $("#waiting").fadeIn(600);
  var groupid=window.groupid
  var iname = $('#iname').val();
  var idate = $('#idate').val();
  var itime = $('#itime').val();
  var idept = $('#idept').val();
  var idesg = $('#idesg').val();
  var imail = $('#imail').val();
  var iloc = $('#iloc').val();
  var iperson = $('#iperson').val();

  $('#allocation').hide(600);
  $.ajax({
  url:'http://localhost/hrms/api/interviewerongoing.php',
  type:'POST',
  data:{
        "emails":selectedmail,
        "iname":iname,
        "intvmail":imail,
        "date":idate,
        "time":itime,
        "prf":groupid,
        "iloc":iloc,
        "iperson":iperson,
        "idesg":idesg,
        "dept":idept
      },
  success:function(para){
    console.log(para);
   
    $('#sentsuccess').fadeIn(600)
    for(let i=0;i<selectedmail.length;i++)
    {
      var ml = selectedmail[i];
      var id = allmail.indexOf(ml) 
      var str='#check'+id+'row';
      $(str).remove();
      $("#waiting").hide();
    }
    selectedmail = []

  }
  })

 })
})   

var ctr=0
function selection(x)
{
  $('#submit').attr('disabled',false)
  $('#completeprocess').attr('disabled',false)


  var b = '#'+x
  var y ='#'+x+'mail'  
  if($(b).prop("checked") == true)
  {
    selectedmail.push($(y).text())
  }
  else
  {                                               
    for( var i = 0; i < selectedmail.length; i++)
    { 
      if ( selectedmail[i] === $(y).text()) 
      {
        selectedmail.splice(i, 1); 
        i--;
      }
    }

  }
}

var id_round
function createnextround(id)
{
  $('#adddetail').text('')
  // alert(id)
  id_round = id
  window.groupid=id_round;
  $('#allocatingcandidate').fadeIn(600);
  var p1='<b>ID:'+id_round+'<b>'
  $('#rid').replaceWith(p1)
  console.log("prffalkjsdf;lakjsfd = ",id_round)
  $.ajax({
    url:'http://localhost/hrms/api/nextround.php',
    type:'POST',
    data:{
          "prf" : id_round
         },
         
    success:function(para)
    {
      // alert(para)  
      para = JSON.parse(para)
      
      window.allmembers = para

      console.log("Array = ",para)
      if(para=="")
      {
        var s5='<b style="color: red;font-size:15px;" id="noselected"> There are no candidates selected for this process. Please complete this process to know about the candidates which are on hold and rejected</b><br><br>'
        $('#noselect').append(s5);
        counter=0;
        $('#completeprocess').attr('disabled',false)
        
        // alert("Empty")
      }
      else
      {
        var arr2 = []
        arr = para
        for(let i =0;i<para.length;i++)
        {
          allmail[i] = arr[i]
          var s1='<tr id="check'+i+'row"><td><a href="http://localhost/hrms/documentcheck.php?aid='+arr[i][1]+'" target="_blank" "><p >'+arr[i][0]+'</p></a></td><td><a href="http://localhost/hrms/documentcheck.php?aid='+arr[i][1]+'" target="_blank" "><p id="check'+i+'mail">'+arr[i][1]+'</p></a></td><td><label>'
          var s2='<input type="checkbox" class="filled-in" id="check'+i+'" onclick="selection(this.id)"/>'
          var s3='<span class="blue-text darken-1" ></span></label></td><td></td></tr>'
          var str=s1+s2+s3
          $('#adddetail').append(str)
        }
      }
      // alert(para.length)
      // para=['shoaibshaikh@mitaoe.ac.in','Atharva@mitaoe.ac.in','tanny@mitaoe.ac.in']
      
    }
  })
  $(document).scrollTop($(document).height());

}
counter=1;
function terminateround()
{
  if(selectedmail.length <= 0 && counter == 1)
    {

      alert("Please Select Atleast 1 Member")
    }
    else
    {
      counter=1;
      var confrm = confirm("Interview Process Will Be Completed \n You Can See These Memebers in Your History \n Are You sure ? ");
      console.log(selectedmail)
      var groupid=window.groupid
      console.log(groupid)
      if(confrm)
      {
        $('#sendingmail').fadeIn(600)
        $("#allocatingcandidate").hide()
        // id_round = id
        // var str = "#"+id_round+"row";
        // alert(selectedmail.length);
        if(selectedmail.length==0)
        {
          selectedmail="nomail";
        }
        // alert(selectedmail);
        $.ajax({
        url:'http://localhost/hrms/api/terminateround.php',
        type:'POST',
        data:{
          'prf':groupid,
          "emails":selectedmail,
          "allmembers":window.allmembers
          },
        success:function(para)
        {
          console.log("This is : ",para)
          if(para == "nomails")
          {
            alert("Complete")
            window.setTimeout(function(){location.reload()},1000)
          }
          if(para=="sent")
          {
            $('#sentsuccess').fadeIn(600)
            $('#sendingmail').hide()
            window.setTimeout(function(){location.reload()},1000)

          }
          else
          {
            alert("Mail was not sent.")
            $('#sendingmail').hide()

          }
          console.log((para))
          $(str).remove();

       }
    
    
                  
      })
    }
}
}

$('#logoutuser').click(function(){

$.ajax({
url:"http://localhost/hrms/api/logout.php",
type:"POST",
success:function(para){

if(para=="success")
{
$("#row").hide()
$("#logout").show()
document.location.replace("http://localhost/hrms/index.php")
}
else
{
$("#notlogout").show()
document.location.replace("/hrms/")
}
} 

})

});

</script>
</body>
</html>


<?php
            }
            else
            {
                header("refresh:0;url=notfound.html");
            }
        }
        else
        {
            header("refresh:0;url=notfound.html");
        }
    }
    else
    {
        header("refresh:0;url=notfound.html");
    }  
?>
