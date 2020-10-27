<?php

echo "Hello World";
echo "what is your name";
?>
function arclab_Submit()
{
if(strtolower($_SERVER['REQUEST_METHOD'])!=='post')arclab_SubmitDone('E001 (NOPOST)');
$ID52='';if(isset($_POST['ID52']))$ID52=arclab_InputUTF8($_POST['ID52']);$recaptcha=arclab_GetURL("https://www.google.com/recaptcha/api/siteverify?secret=6Ldtc9sZAAAAAC_4JnAL3Na_gyf0RXplXS1qtZfA&response=$ID52");
$recaptcha=json_decode($recaptcha,true);if($recaptcha['success']!==true)arclab_SubmitDone('E006 (RECAPTCHAFAIL)');
$ID42='';if(isset($_POST['ID42']))$ID42=arclab_InputUTF8($_POST['ID42']);
$ID46='';if(isset($_POST['ID46']))$ID46=arclab_InputUTF8($_POST['ID46']);
if(!empty($ID46)){if(!arclab_isEmail($ID46))arclab_SubmitDone('E004 (NOVALIDEMAIL) ID46');}
$ID49='';if(isset($_POST['ID49']))$ID49=arclab_InputUTF8($_POST['ID49']);
$ID57='';if(isset($_POST['ID57']))$ID57=arclab_InputUTF8($_POST['ID57']);
// SA/0 ---
$ok=true;
$h_from=arclab_EncodeHeaderEmail("","cmscorpion911@antlergroup.com");
$h_replyto=arclab_EncodeHeaderEmail("",$ID46);
$h_to=arclab_EncodeHeaderEmail("","chamal.m13@gmail.com");
$h_cc='';
$h_bcc='';
$h_subject=arclab_EncodeHeader(arclab_FilterHeader("Web Form Message"));
$b_html="<html>\r\n<head>\r\n<meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\">\r\n<meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">\r\n<meta content=\"IE=edge\" http-equiv=\"X-UA-Compatible\">\r\n<style>\r\n* {-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}\r\ndiv,table,th,tr,td,tbody {margin:0;padding:0;}\r\nbody {-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;}\r\ntable,td {border-collapse:collapse;}\r\ntable {mso-table-lspace:0pt;mso-table-rspace:0pt;}\r\nbody {background-color:white;}\r\n.t-b {width:700px;background-color:white;}\r\n.t-t {width:100%;}\r\n.t-l {width:30%;color:dimgray;font-family:Calibri,Arial,sans-serif;font-size:12pt;font-weight:normal;padding:5px 0;vertical-align:top;}\r\n.t-r {width:70%;color:black;font-family:Calibri,Arial,sans-serif;font-size:12pt;font-weight:normal;padding:5px 0;vertical-align:top;}\r\n.t-h {background-color:white;color:black;font-family:Calibri,Arial,sans-serif;font-size:12pt;font-weight:normal;padding:5px 0;}\r\n</style>\r\n</head>\r\n<body>\r\n<table class=\"t-b\"><tr><td>\r\n<table class=\"t-t\"><tr><td class=\"t-h\">\r\nThe following information was submitted on ".arclab_VarToHTML(date('m/d/Y H:i:s')).".<br><br>\r\n</td></tr></table>\r\n<table class=\"t-t\"><tr><td class=\"t-l\">name:</td><td class=\"t-r\">".arclab_VarToHTML($ID42)."</td></tr></table>\r\n<table class=\"t-t\"><tr><td class=\"t-l\">email:</td><td class=\"t-r\">".arclab_VarToHTML($ID46)."</td></tr></table>\r\n<table class=\"t-t\"><tr><td class=\"t-l\">message:</td><td class=\"t-r\">".arclab_VarToHTML($ID49)."</td></tr></table>\r\n<table class=\"t-t\"><tr><td class=\"t-l\">phone:</td><td class=\"t-r\">".arclab_VarToHTML($ID57)."</td></tr></table>\r\n</td></tr></table>\r\n</body>\r\n</html>\r\n";
$b_txt=arclab_H2T($b_html);
$b_mix='--=AWFB_M_'.md5(time());
$b_alt='--=AWFB_A_'.md5(time());
$h_content='';
$mime='';
$b_plain=false;
$na=0;
$h_add_cte='';
if($na>0)
{
$h_content="multipart/mixed;\r\n boundary=\"$b_mix\"";
$mime.="--$b_mix\r\n";
if(empty($b_html)&&!empty($b_txt))
{
$mime.="Content-Type: text/plain; charset=utf-8\r\n";
$mime.=arclab_EncodeBody($b_txt,$b_plain);
}
if(!empty($b_html)&&empty($b_txt))
{
$mime.="Content-Type: text/html; charset=utf-8\r\n";
$mime.=arclab_EncodeBody($b_html,$b_plain);
}
if(!empty($b_html)&&!empty($b_txt))
{
$mime.="Content-Type: multipart/alternative;\r\n boundary=\"$b_alt\"\r\n\r\n";
$mime.="This is a multi-part message in MIME format.\r\n\r\n--$b_alt\r\nContent-Type: text/plain; charset=utf-8\r\n";
$mime.=arclab_EncodeBody($b_txt,$b_plain);
$mime.="\r\n--$b_alt\r\nContent-Type: text/html; charset=utf-8\r\n";
$mime.=arclab_EncodeBody($b_html,$b_plain);
$mime.="\r\n--$b_alt--\r\n";
}
$mime.="\r\n--$b_mix--";
}
else
{
if(empty($b_html)&&!empty($b_txt))
{
$h_content="text/plain; charset=utf-8";	
if($b_plain){$mime.=$b_txt; $h_add_cte.="8bit";}else{$mime.=arclab_Split(base64_encode($b_txt));$h_add_cte.="base64";}
}
if(!empty($b_html)&&empty($b_txt))
{
$h_content="text/html; charset=utf-8";
if($b_plain){$mime.=$b_html; $h_add_cte.="8bit";}else{$mime.=arclab_Split(base64_encode($b_html));$h_add_cte.="base64";}
}
if(!empty($b_html)&&!empty($b_txt))
{
$h_content="multipart/alternative;\r\n boundary=\"$b_alt\"";
$h_add_cte='';
$mime.="This is a multi-part message in MIME format.\r\n\r\n--$b_alt\r\nContent-Type: text/plain; charset=utf-8\r\n";
$mime.=arclab_EncodeBody($b_txt,$b_plain);
$mime.="\r\n--$b_alt\r\nContent-Type: text/html; charset=utf-8\r\n";
$mime.=arclab_EncodeBody($b_html,$b_plain);
$mime.="\r\n--$b_alt--\r\n";
}
}
$header='';
if(!empty($h_bcc))$header.="Bcc: $h_bcc\r\n";
if(!empty($h_cc))$header.="Cc: $h_cc\r\n";
$header.="From: $h_from\r\n";
if(!empty($h_replyto))$header.="Reply-To: $h_replyto\r\n";
$header.="MIME-Version: 1.0\r\n";
$header.="Content-Type: $h_content\r\n";
if(!empty($h_add_cte))$header.="Content-Transfer-Encoding: $h_add_cte\r\n";
if(PHP_EOL!="\r\n"){$header=str_replace("\r\n",PHP_EOL,$header);}
if(empty($h_to))$ok=false;
if(!$ok)arclab_SubmitDone('E102 (NORECIPIENT) Task:1');
if($ok)$ok=mail($h_to,$h_subject,$mime,$header);
if($ok!==true)arclab_SubmitDone('E100 (PHPMAILFAIL) Task:1');
arclab_SubmitDone();
}

function arclab_SubmitDone($err='')
{
arclab_NoCache();
header('Content-Type: text/html; charset=utf-8');
if($err==='')echo "OK";else echo($err);
exit();
}

?>
