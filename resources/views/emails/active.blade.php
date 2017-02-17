<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>用户激活邮件</title>
  </head>
  <body>
尊敬的会员<b>{{$data['username']}}</b>  ：
<br>
<br>
请激活您的账号!链接:<a href="http://www.160.com/active?id={{$id}}&token={{$data['token']}}">激活</a>
<br>
<br>
非常感谢您对腾讯课堂的大力支持！为了更好的服务于腾讯课堂会员，特向您颁发腾讯课堂终身会员号:{{$id}}.会员编号将作为参与腾讯课堂各种活动的依据，请您妥善保管。
<br>
<br>
腾讯课堂发展至今，一直秉承引入、吸收、创新的宗旨；能够为大家的学习、工作带来帮助，将是给我们最大收获
  </body>
</html>
