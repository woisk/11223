@extends('layout.home')
@section('title', '列表')

@section('content')
<?php
    $cates = getCates(1);
 ?>
<div class="position">
    <span>
        您当前的位置：
    </span>
    <a href="/">
        首页
    </a>
    »
    <a href="/tpl/txkt/site/pro_list/cat/1">
        IT培训
    </a>
</div>
<div class="main autoM clearfix">
    <div class="main-left" style="float:left;">
        <div class="sort-menu-con" id="auto-test-1">
            <div class="sort-menu-border1">
                <dl class="sort-menu sort-menu1 clearfix">
                    <dt>
                        学习方向
                    </dt>

                      <dd class="">
                          <label>
                          </label>
                          <a href="/tpl/txkt/site/pro_list/cat/7">
                              编程开发
                          </a>
                      </dd>
                      <dd class="">
                          <label>
                          </label>
                          <a href="/tpl/txkt/site/pro_list/cat/7">
                              编程开发
                          </a>
                      </dd>
                </dl>
            </div>
            <div class="sort-menu-border2">
                <div class="js-sort-menu-activity js-label-row">
                </div>
            </div>
            <div class="sort-menu-border2">
                <div class="js-sort-menu-activity js-label-row">
                    <dl class="sort-menu sort-menu2 clearfix">
                        <dt>
                            主题:
                        </dt>
                        <dd id='attr_dd_1'>
                            <a class="nolimit current" href="?">
                                不限
                            </a>
                            <a class="flags-item-unselected js-tag" href="?&attr[1]=创业" id="attr_1_a57fd81fa09d8220205e06059a45e8bc">
                                <span class="js-label">
                                    创业
                                </span>
                                <i class="flags-close js-close">
                                </i>
                            </a>
                            <a class="flags-item-unselected js-tag" href="?&attr[1]=独家精品课" id="attr_1_2ebebbba93b1bc877139418eb229e5e8">
                                <span class="js-label">
                                    独家精品课
                                </span>
                                <i class="flags-close js-close">
                                </i>
                            </a>
                        </dd>
                    </dl>
                </div>
            </div>
            <div class="sort-menu-border2">
                <div class="js-sort-menu-activity js-label-row">
                    <dl class="sort-menu sort-menu2 clearfix">
                        <dt>
                            价格:
                        </dt>
                        <dd id='price_dd'>
                            <p class="f_r">
                                <input type="text" class="mini" name="min_price" value="" onchange="checkPrice(this);">
                                至
                                <input type="text" class="mini" name="max_price" onchange="checkPrice(this);"
                                value="">
                                元
                                <label class="btn_gray_s">
                                    <input type="button" onclick="priceLink();" value="确定">
                                </label>
                            </p>
                            <a class="nolimit current" href="?&min_price=&max_price=">
                                不限
                            </a>
                            <a class="flags-item-unselected js-tag" href="?&min_price=0&max_price=1"
                            id="0-1">
                                0-1
                            </a>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
        <div class="sort-nav sort-nav-sml clearfix">
            <dl class="sort-nav-order sort-nav-order-my">
                <dd class="">
                    <a href="?&order=sale" class="">
                        销量
                    </a>
                </dd>
                <dd class="">
                    <a href="?&order=cpoint" class="">
                        评分
                    </a>
                </dd>
                <dd class="">
                    <a href="?&order=price" class="price-item-my">
                        价格
                    </a>
                </dd>
                <dd class="current">
                    <a href="?&order=new" class="">
                        最新上架
                    </a>
                </dd>
            </dl>
        </div>
        <div class="market-bd market-bd-6 course-list course-card-list-multi-wrap">
            <ul class="course-card-list">
            @foreach($res as $k=>$v)
                <li class="course-card-item">
                    <a href="/course/{{$v->id}}" target="_blank" class="item-img-link">

                        <img src="{{$v->path}}" alt="PS特效技巧制作"
                        title="PS特效技巧制作" class="item-img" height="124" width="220" />

                    </a>
                    <h4 class="item-tt">
                        <a href="/course/{{$v->id}}" target="_blank" class="item-tt-link"
                        title="PS特效技巧制作">

                            {{$v->title}}
                        </a>
                    </h4>
                    <div class="item-line">
                        <span class="line-cell item-price free">
                            ¥{{$v->price}}
                        </span>
                    </div>
                </li>
            @endforeach
            </ul>
        </div>
        <div class="clear">
        </div>

    </div>
    <div class="main-right">
        <div class="main-right-top">
            热门推荐
        </div>
        <div class="course-card-list-aside-wrap">
            <ul class="course-card-list">
                <li class="course-card-item">
                    <a href="/tpl/txkt/site/products/id/39" target="_blank" class="item-img-link">
                        <img src="/homes/picture/e4928da25ebb47bfa9f5f5c5be015c57.gif" alt="PHP从零基础到项目实战高薪入职课【潭州学院】"
                        title="PHP从零基础到项目实战高薪入职课【潭州学院】" class="item-img" height="124" width="220"
                        />
                    </a>
                    <h4 class="item-tt">
                        <a href="/tpl/txkt/site/products/id/39" target="_blank" class="item-tt-link"
                        title="PHP从零基础到项目实战高薪入职课【潭州学院】">
                            PHP从零基础到项目实战高薪入职课【潭州学院】
                        </a>
                    </h4>
                    <div class="item-line">
                        <span class="line-cell item-price free">
                            ¥0.00
                        </span>
                    </div>
                </li>
                <li class="course-card-item">
                    <a href="/tpl/txkt/site/products/id/37" target="_blank" class="item-img-link">
                        <img src="/homes/picture/4721534728e7413b81217c837f659d37.gif" alt="Android开发工程师极客项目实战技术"
                        title="Android开发工程师极客项目实战技术" class="item-img" height="124" width="220"
                        />
                    </a>
                    <h4 class="item-tt">
                        <a href="/tpl/txkt/site/products/id/37" target="_blank" class="item-tt-link"
                        title="Android开发工程师极客项目实战技术">
                            Android开发工程师极客项目实战技术
                        </a>
                    </h4>
                    <div class="item-line">
                        <span class="line-cell item-price free">
                            ¥0.00
                        </span>
                    </div>
                </li>
                <li class="course-card-item">
                    <a href="/tpl/txkt/site/products/id/10" target="_blank" class="item-img-link">
                        <img src="/homes/picture/074e7b4a4fd149f982e3e9000c6a6dac.gif" alt="游戏UI设计公开课"
                        title="游戏UI设计公开课" class="item-img" height="124" width="220" />
                    </a>
                    <h4 class="item-tt">
                        <a href="/tpl/txkt/site/products/id/10" target="_blank" class="item-tt-link"
                        title="游戏UI设计公开课">
                            游戏UI设计公开课
                        </a>
                    </h4>
                    <div class="item-line">
                        <span class="line-cell item-price free">
                            ¥0.00
                        </span>
                    </div>
                </li>
                <li class="course-card-item">
                    <a href="/tpl/txkt/site/products/id/9" target="_blank" class="item-img-link">
                        <img src="/homes/picture/f4b3325d1b6c40ebafaa3c747bbe117f.gif" alt="【限时特惠】Java For Android开发编程精华特辑"
                        title="【限时特惠】Java For Android开发编程精华特辑" class="item-img" height="124" width="220"
                        />
                    </a>
                    <h4 class="item-tt">
                        <a href="/tpl/txkt/site/products/id/9" target="_blank" class="item-tt-link"
                        title="【限时特惠】Java For Android开发编程精华特辑">
                            【限时特惠】Java For Android开发编程精华特辑
                        </a>
                    </h4>
                    <div class="item-line">
                        <span class="line-cell item-price free">
                            ¥1.00
                        </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="main-below">
    <div class="main-below-con">
        <div class="main-below-top">
            浏览历史
        </div>
        <div class="course-card-list-9-wrap">
            <ul class="course-card-list">
                <li class="course-card-item">
                    <a href="/tpl/txkt/site/products/id/59" target="_blank" class="item-img-link">
                        <img src="/homes/picture/f3477b8dbfdd4e80933f1c2114570c73.gif" alt="初升高物理衔接课"
                        title="初升高物理衔接课" class="item-img" height="124" width="220" />
                        <i class="icon-font i-lu">
                        </i>
                    </a>
                    <h4 class="item-tt">
                        <a href="/tpl/txkt/site/products/id/59" target="_blank" class="item-tt-link"
                        title="初升高物理衔接课">
                            初升高物理衔接课
                        </a>
                    </h4>
                    <div class="item-line">
                        <span class="line-cell item-price free">
                            ¥0.00
                        </span>
                    </div>
                </li>
                <li class="course-card-item">
                    <a href="/tpl/txkt/site/products/id/49" target="_blank" class="item-img-link">
                        <img src="/homes/picture/a32c4c0b23a944b196112e8cdee11164.gif" alt="股市精讲研究直播"
                        title="股市精讲研究直播" class="item-img" height="124" width="220" />
                        <i class="icon-font i-lu">
                        </i>
                    </a>
                    <h4 class="item-tt">
                        <a href="/tpl/txkt/site/products/id/49" target="_blank" class="item-tt-link"
                        title="股市精讲研究直播">
                            股市精讲研究直播
                        </a>
                    </h4>
                    <div class="item-line">
                        <span class="line-cell item-price free">
                            ¥0.00
                        </span>
                    </div>
                </li>
                <li class="course-card-item">
                    <a href="/tpl/txkt/site/products/id/39" target="_blank" class="item-img-link">
                        <img src="/homes/picture/e4928da25ebb47bfa9f5f5c5be015c57.gif" alt="PHP从零基础到项目实战高薪入职课【潭州学院】"
                        title="PHP从零基础到项目实战高薪入职课【潭州学院】" class="item-img" height="124" width="220"
                        />
                        <i class="icon-font i-lu">
                        </i>
                    </a>
                    <h4 class="item-tt">
                        <a href="/tpl/txkt/site/products/id/39" target="_blank" class="item-tt-link"
                        title="PHP从零基础到项目实战高薪入职课【潭州学院】">
                            PHP从零基础到项目实战高薪入职课【潭州学院】
                        </a>
                    </h4>
                    <div class="item-line">
                        <span class="line-cell item-price free">
                            ¥0.00
                        </span>
                    </div>
                </li>
                <li class="course-card-item">
                    <a href="/tpl/txkt/site/products/id/36" target="_blank" class="item-img-link">
                        <img src="/homes/picture/8f07f0c231a04091b8481ad6b23bf621.gif" alt="7-平面设计入门"
                        title="7-平面设计入门" class="item-img" height="124" width="220" />
                        <i class="icon-font i-lu">
                        </i>
                    </a>
                    <h4 class="item-tt">
                        <a href="/tpl/txkt/site/products/id/36" target="_blank" class="item-tt-link"
                        title="7-平面设计入门">
                            7-平面设计入门
                        </a>
                    </h4>
                    <div class="item-line">
                        <span class="line-cell item-price free">
                            ¥0.00
                        </span>
                    </div>
                </li>
                <li class="course-card-item">
                    <a href="/tpl/txkt/site/products/id/35" target="_blank" class="item-img-link">
                        <img src="/homes/picture/733b995dedf545e6a8b8f2b11546b302.gif" alt="3Dmax建模（快速搞定入门)【云中帆教育】"
                        title="3Dmax建模（快速搞定入门)【云中帆教育】" class="item-img" height="124" width="220"
                        />
                        <i class="icon-font i-lu">
                        </i>
                    </a>
                    <h4 class="item-tt">
                        <a href="/tpl/txkt/site/products/id/35" target="_blank" class="item-tt-link"
                        title="3Dmax建模（快速搞定入门)【云中帆教育】">
                            3Dmax建模（快速搞定入门)【云中帆教育】
                        </a>
                    </h4>
                    <div class="item-line">
                        <span class="line-cell item-price free">
                            ¥0.00
                        </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<script type='text/javascript'>
    //价格跳转
    function priceLink() {
        var minVal = $('[name="min_price"]').val();
        var maxVal = $('[name="max_price"]').val();
        if (isNaN(minVal) || isNaN(maxVal)) {
            alert('价格填写不正确');
            return '';
        }
        var urlVal = "?";
        window.location.href = urlVal + '&min_price=' + minVal + '&max_price=' + maxVal;
    }

    //价格检查
    function checkPrice(obj) {
        if (isNaN(obj.value)) {
            obj.value = '';
        }
    }

    //筛选条件按钮高亮
    jQuery(function() {

});
</script>
@endsection
