@extends('layout.user')
@section('title1', '我的收藏')
@section('title2', '我的收藏')

@section('content')
<div class="ht_right">
                   <div class="order">
                       <div class="uc_title m_10">
                           <label class="current">
                               <span>
                                   我的收藏
                               </span>
                           </label>
                       </div>
                       <ul class="collection" style="display:none;">
                           <li>
                               您还未收藏过商品哦，快去
                               <a href="/tpl/txkt/">
                                   <u>
                                       首页
                                   </u>
                               </a>
                               看看吧。
                           </li>
                       </ul>
                       <form action="#" method="post" id="favorite" name="favorite">
                           <table class="border_table" width="100%" cellpadding="0" cellspacing="0">
                               <col width='15px' style="border-right:1px solid #e0e0e0;" />
                               <col style="border-right:1px solid #e0e0e0;" />
                               <col width='120px' style="border-right:1px solid #e0e0e0;" />
                               <col width='120px' style="border-right:1px solid #e0e0e0;" />
                               <col width='120px' />
                               <thead>
                                   <tr>
                                       <td>
                                           <input type="checkbox" onclick="selectAll('id[]');" />
                                       </td>
                                       <td align="center">
                                           商品名称
                                       </td>
                                       <td align="center">
                                           收藏时间
                                       </td>
                                       <td align="center">
                                           价格
                                       </td>
                                       <td align="center">
                                           操作
                                       </td>
                                   </tr>
                               </thead>
                               <tbody>
                                 @foreach($favorite as $k=>$v)
                               <tr>
                                   <td>
                                       <input type="checkbox" onclick="selectAll('id[]');" />
                                   </td>
                                   <td align="center">
                                      {{$v->title}}
                                   </td>
                                   <td align="center">
                                       {{$v->date}}
                                   </td>
                                   <td align="center">
                                       {{$v->price}}
                                   </td>
                                   <td align="center">
                                       <a href="/user/nofavorite?id={{$v->id}}">取消收藏</a></td>
                                   </td>
                               </tr>
                                @endforeach
                               </tbody>
                               <tfoot>
                                   <tr>
                                       <td colspan="5">
                                           
                                           <label style="float:left; margin-top:3px; margin-right:10px;">
                                               <input class="radio" type="checkbox" onclick="selectAll('id[]');" />
                                               全选
                                           </label>
                                           <input type="button" class="btn_gray_s" onclick="$('#favorite').attr('action','/tpl/txkt/ucenter/favorite_del');delModel({msg:'是否取消收藏？',form:'favorite'});"
                                           value="取消收藏" />
                                           </span>
                                       </td>
                                   </tr>
                               </tfoot>
                           </table>
                       </form>
                   </div>
               </div>
               <script>
                   $("#nav_4").attr("class", "cta");
               </script>
               <!--选择货品添加购物车模板 开始-->
       <script type='text/html' id='selectProductTemplate'>
       <table width="100%">
         <col />
         <col width="80px" />
         <col width="60px" />
         <%for(var item in productData){%>
         <%item = productData[item]%>
         <tr>
           <td align="left">
             <%for(var spectName in item['specData']){%>
             <%var spectValue = item['specData'][spectName]%>
               <%=spectName%>：<%=spectValue%> &nbsp&nbsp
             <%}%>
           </td>
           <td align="center"><span class="bold red2">￥<%=item['sell_price']%></span></td>
           <td align="right"><label class="btn_gray_s"><input type="button" onclick="joinCart_ajax('<%=item['id']%>','product');" value="购买"></label></td>
         </tr>
         <%}%>
         <tr>
           <td colspan='3' align="left"><a href="/tpl/txkt/site/products/id/<%=item['goods_id']%>">查看更多</a></td>
         </tr>
       </table>
       </script>
               <!--选择货品添加购物车模板 结束-->
               <script type='text/javascript'>
                   //修改备注信息
                   function edit_summary(idVal) {
                       var summary = $("#summary_val_" + idVal).val();
                       if ($.trim(summary)) {
                           $.getJSON('/tpl/txkt/ucenter/edit_summary', {
                               id: idVal,
                               summary: summary
                           },
                           function(content) {
                               if (content.isError == false) {
                                   $('#summary_show_' + idVal).html(summary);
                                   $("#summary_box_" + idVal).hide();
                                   $("#summary_button_box_" + idVal).show();
                                   $('#summary_val_' + idVal).val('');
                               } else {
                                   alert(content.message);
                               }
                           });
                       } else {
                           alert('请填写备注信息');
                       }
                   }

                   //统计总数
                   $('#favoriteSum').html('0');

                   //[ajax]加入购物车
                   function joinCart_ajax(id, type) {
                       $.getJSON('/tpl/txkt/simple/joinCart', {
                           goods_id: id,
                           type: type
                       },
                       function(content) {
                           if (content.isError == false) {
                               var count = parseInt($('[name="mycart_count"]').html()) + 1;
                               $('[name="mycart_count"]').html(count);
                               $('.msgbox').hide();
                               alert(content.message);
                           } else {
                               alert(content.message);
                           }
                       });
                   }

                   //列表页加入购物车统一接口
                   function joinCart_list(id) {
                       $.getJSON('/tpl/txkt/simple/getProducts', {
                           "id": id
                       },
                       function(content) {
                           if (!content) {
                               joinCart_ajax(id, 'goods');
                           } else {
                               var selectProductTemplate = template.render('selectProductTemplate', {
                                   'productData': content
                               });
                               $('#product_box_' + id).html(selectProductTemplate);
                               $('#product_box_' + id).parent().show();
                           }
                       });
                   }
               </script>
           </div>
       </div>
@endsection
