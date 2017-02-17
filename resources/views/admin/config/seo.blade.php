@extends('layout.admin')

@section('title_1','SEO信息 - 腾讯课堂后台管理系统')
@section('title_2','SEO信息')

@section('content')
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> 网站SEO综合信息
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body col-lg-6">
            <div class="list-group">
                <a href="https://www.baidu.com/s?wd=site:160.com" class="list-group-item">
                    <i class="fa fa-bug fa-fw"></i> 百度收录
                    <span class="pull-right text-muted small"><em>{{baidu("160.com")}}</em>
                    </span>
                </a>
                <a href="http://www.sogou.com/web?query=site:160.com" class="list-group-item">
                    <i class="fa fa-bug fa-fw"></i> 搜狗收录
                    <span class="pull-right text-muted small"><em>{{sogou("160.com")}}</em>
                    </span>
                </a>
                <a href="https://www.so.com/s?q=site:160.com" class="list-group-item">
                    <i class="fa fa-bug fa-fw"></i> 360收录
                    <span class="pull-right text-muted small"><em>{{a306("160.com")}}</em>
                    </span>
                </a>
                <a href="#" class="list-group-item">
                    <i class="fa fa-bug fa-fw"></i> 谷歌收录
                    <span class="pull-right text-muted small"><em>3,290,482</em>
                    </span>
                </a>
                <a href="#" class="list-group-item">
                    <i class="fa fa-mail-reply-all fa-fw"></i> 百度反链
                    <span class="pull-right text-muted small"><em>超时,请重试</em>
                    </span>
                </a>
                <a href="#" class="list-group-item">
                    <i class="fa fa-mail-reply-all fa-fw"></i> 搜狗反链
                    <span class="pull-right text-muted small"><em>超时,请重试</em>
                    </span>
                </a>
                <a href="#" class="list-group-item">
                    <i class="fa fa-mail-reply-all fa-fw"></i> 360反链
                    <span class="pull-right text-muted small"><em>超时,请重试</em>
                    </span>
                </a>
                <a href="#" class="list-group-item">
                    <i class="fa fa-mail-reply-all fa-fw"></i> 谷歌反链
                    <span class="pull-right text-muted small"><em>超时,请重试</em>
                    </span>
                </a>
                <a href="#" class="list-group-item">
                    <i class="fa fa-warning fa-fw"></i> 域名过期时间
                    <span class="pull-right text-muted small"><em>2017-11-10</em>
                    </span>
                </a>
            </div>
            <!-- /.list-group -->
            <a href="http://seo.chinaz.com/?q=http://www.160.com/" class="btn btn-default btn-block">点击查看详细信息</a>
        </div>


        <div class="panel-body col-lg-6">
        <div id="morris-donut-chart"><svg  style="margin-left:100px" height="357" version="1.1" width="294" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.1.2</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#0b62a4" d="M147,272.3333333333333A91.33333333333333,91.33333333333333,0,0,0,233.35180688739524,210.75135669275903" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#0b62a4" stroke="#ffffff" d="M147,275.3333333333333A94.33333333333333,94.33333333333333,0,0,0,236.1881801063243,211.72859103668176L271.8004216328778,223.99831113260063A132,132,0,0,1,147,313Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#3980b5" d="M233.35180688739524,210.75135669275903A91.33333333333333,91.33333333333333,0,0,0,65.0802706076015,140.61515489624878" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#3980b5" stroke="#ffffff" d="M236.1881801063243,211.72859103668176A94.33333333333333,94.33333333333333,0,0,0,62.38947657646432,139.28864538554163L28.60506262996421,122.63358152888509A132,132,0,0,1,271.8004216328778,223.99831113260063Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#679dc6" d="M65.0802706076015,140.61515489624878A91.33333333333333,91.33333333333333,0,0,0,146.97130678756912,272.33332882621403" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#679dc6" stroke="#ffffff" d="M62.38947657646432,139.28864538554163A94.33333333333333,94.33333333333333,0,0,0,146.97036430978855,275.33332867816995L146.95696018135368,317.99999323932104A137,137,0,0,1,24.120405911402244,120.42273234437317Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="147" y="171" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(1.2178,0,0,1.2178,-32.0133,-39.6356)" stroke-width="0.8211678832116788"><tspan dy="6" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">SEO综合评测</tspan></text><text x="147" y="191" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(1.9028,0,0,1.9028,-132.7083,-165.2083)" stroke-width="0.5255474452554745"><tspan dy="5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">良好</tspan></text></svg></div>

        </div>
                        <!-- /.panel-body -->
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->


</div>

@endsection
