function getCookie(cname)
{
  var name = cname + "=";
  var ca = document.cookie.split(';');
  for(var i=0; i<ca.length; i++) 
  {
    var c = ca[i].trim();
    if (c.indexOf(name)==0) return c.substring(name.length,c.length);
  }
  return "";
}
function setCookie(cname,cvalue,sec)
{
  var d = new Date();
  d.setTime(d.getTime()+(sec*999));
  var expires = "Expires="+d.toGMTString();
  // alert(cname + "=" + cvalue + ";Path=/; " + expires);
  document.cookie = cname + "=" + cvalue + ";Path=/; " + expires;
}
function delCookie(name)
{
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval=getCookie(name);
    if(cval!=null)
    document.cookie= name + "="+cval+";Path=/;expires="+exp.toGMTString();
}
function getRootPath(){ 
  var strFullPath=window.document.location.href; 
  var strPath=window.document.location.pathname; 
  var pos=strFullPath.indexOf(strPath); 
  var prePath=strFullPath.substring(0,pos); 
  var postPath=strPath.substring(0,strPath.substr(1).indexOf('/')+1); 
  return(prePath+postPath); 
} 
window.onload=function(e){
  setInterval('time()',5000);
}
function time(){
  token=getCookie('token');
  if(token){
      var viewtime=getCookie('viewtime');
      if(viewtime){
        if(parseInt(viewtime)>90){
        //如果viewtime等于120则发请求给服务器
          setCookie('viewtime','0','100');
          url=getRootPath()+"/index.php/Index/person/viewtime";
          $.ajax({
            url:url,
            data:{'token':token},
            type:'post',
              datatype:'json',
              success:function(event){
                // if(event.status=='1'){
                //  alert('上报成功');
                // }else{
                //  alert('上报失败');
                // }
              }
          })
        }else{
          setCookie('viewtime',parseInt(viewtime)+5,'100');
        }
      }else{
        setCookie('viewtime','0','100');
        // alert('初始化cookie');
      }
    }
}