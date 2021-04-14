
//resett();
function likeIt(a,b,c){
  
    $('#middle').load('likes.php',{
    postId: a,
    likes: b,
    second:c
      })
  
  }

  function likeIt2(a,b,c){
    $('#putNewLikes').load('likes2.php',{
    postId: a,
    likes: b,
    second:c
      })
  
  }


  
  
  function resett(){
    setInterval(function(){
     $('#middle').load('/path/to/server/source');
  }, 5000)
  
  }
  
  function comment(a){

    document.getElementById('cmtBack').style.visibility='visible';
    document.getElementById('coverPage').style.visibility='visible';
    document.getElementById('sendPost').value = a;

    
    $('#putPostHere').load('loadPostComment.php',{
    postId: a
      })
      
  }
  
  function viewPost(a){
  
    
   document.getElementById('postValue'+a.toString()).submit();
  }
  
  
  
  
  function viewConvo(a){
  
  document.getElementById('hideMsg').style.visibility="hidden";
  document.getElementById("show"+a).style.visibility = 'visible';
  document.getElementById('goBArr').style.visibility ='visible';
  
  
  $('.convoNames').hide();
  
  setInterval(function(){ 
    $('#showMsgHere').load('loadMessages.php',{
    userMsg: a
      })
    ; }
  , 1000)
  
  }
  
  function upScroll(){
  
    var element = document.getElementById("showMsgHere");
      element.scrollTop = element.scrollHeight;
      
  }
  
  function startMsg(a){

    document.getElementById('sendFirstMsg').value = a;
    document.getElementById('cmtBack2').style.visibility='visible';
    document.getElementById('coverPage2').style.visibility='visible';
    
    
  }
  function insertMsg(a){
  
    var input= document.getElementById("sendMsg"+a).value;
    
   $('#showMsgHere').load('sendMsg.php',{
    userMsg: a,
    contents : input
      })

      var input= document.getElementById("sendMsg"+a).value="";

    
  }
  
  
  
  function logThis(a){
    alert(typeof(a));
  }
  
  function goBack(){
   location.reload();
  }
  
  function popToggle(a){
  
    if(a=='a'){
      document.getElementById('msgPop').style.height='500px';
   document.getElementById('listNames').style.visibility="visible";
   document.getElementById('upArrow').style.visibility="hidden";
   document.getElementById('downArrow').style.visibility="visible";
   document.getElementById('showMsgHere').style.visibility="visible";
  
   if(document.getElementById('hideMsg').style.visibility=="visible"){
    document.getElementById('hideMsg').style.visibility="hidden";
    document.getElementById('goBArr').style.visibility="visible";
   }
    }else{
      document.getElementById('downArrow').style.visibility="hidden";
   document.getElementById('msgPop').style.height='60px';
   document.getElementById('upArrow').style.visibility="visible";
   document.getElementById('downArrow').style.visibility="hidden";
   document.getElementById('listNames').style.visibility="hidden";
   document.getElementById('showMsgHere').style.visibility="hidden";
   document.getElementById('goBArr').style.visibility="hidden";
   document.getElementById('hideMsg').style.visibility="visible";
   
    }
   
  }
  
  function showLine(){
    document.getElementById('lineUnder').style.visibility="visible";
    document.getElementById('middle2').style.height="170px";
    document.getElementById('middle').style.top="35%";
  }
  
  function showColor(){
  var lengthy=document.getElementById('thePost').value.length;
  
  if(lengthy>=0){
    document.getElementById('postBtn').style.color="#FFFFFF";
    document.getElementById('postBtn').style.backgroundColor="#1EA2F1";
    document.getElementById('postBtn').style.cursor="pointer";
  }
  
  var KeyID = event.keyCode;
     switch(KeyID)
     {
        case 8:
          if(lengthy<=1){
    document.getElementById('postBtn').style.color="#8A8F94";
    document.getElementById('postBtn').style.backgroundColor="#20608E";
    document.getElementById('postBtn').style.cursor="default";
  }
     }
  
    
  }
  
  
  function showColor2(){
  var lengthy=document.getElementById('sendComment').value.length;
  
  if(lengthy>=0){
    document.getElementById('replyBtn').style.color="#FFFFFF";
    document.getElementById('replyBtn').style.backgroundColor="#1EA2F1";
    document.getElementById('replyBtn').style.cursor="pointer";
  }
  
  var KeyID = event.keyCode;
     switch(KeyID)
     {
        case 8:
          if(lengthy<=1){
    document.getElementById('replyBtn').style.color="#8A8F94";
    document.getElementById('replyBtn').style.backgroundColor="#20608E";
    document.getElementById('replyBtn').style.cursor="default";
  }
     }
  
    
  }
  
  function xCmt(){
    document.getElementById('cmtBack').style.visibility='hidden';
    document.getElementById('coverPage').style.visibility='hidden';
    document.getElementById('sendComment').value = "";
  
  }
  
  function xCmtt(){
    document.getElementById('cmtBack2').style.visibility='hidden';
    document.getElementById('coverPage2').style.visibility='hidden';
    document.getElementById('sendMsg').value = "";
  }
  
  function follow(a){
    $('#space').load('loadStatus.php',{
    following: a
      })
  
  }

  function submitForm(a){
    document.getElementById(a).submit();
}

  function rt(a){
 $('#middle').load('rt.php',{
      postId: a
        })
  }

 