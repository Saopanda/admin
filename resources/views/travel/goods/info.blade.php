@extends('travel.layouts.index')
@section('style')
.banner {
position: relative;
height: 250px;
}

.banner img {
width: 100%;
height: 100%;
object-fit: cover;
}

.banner .shadow {
width: 100%;
position: absolute;
bottom: 0;
height: 40%;
background: #000;
opacity: .5;
}

.banner .detail {
position: absolute;
color: #fff;
left: 20px;
bottom: 20px;
}

.detail strong {
display: block;
font-size: 20px;
font-weight: 500;
margin-bottom: 10px;
}

/* main */
.main {
height: 76%;
}

/* 每日行程 */
.everyDayTravel {
padding: 20px 0 20px 20px;
}

.everyDayTravel button {
margin-right: 20px;
}

.everyDayTravel li {
margin-top: 20px;
}

.everyDayTravel p {
font-size: 13px;
margin-bottom: 10px;
}

.everyDayTravel p img {
display: inline-block;
width: 120px;
height: 90px;
margin-right: 10px;
border-radius: 7px;
}

.everyDayTravel li .titleName {
font-weight: 500;
font-size: 17px;
color: #170B01;
}

.everyDayTravel li .pl32 {
padding-left: 32px;
}



.everyDayTravel p .class-icon {
width: 22px;
height: 22px;
border-radius: 50%;
margin-right: 10px;
margin-bottom: -5px;
}


.remarks {
padding-left: 32px;
}

.remarks h5 {
padding: 7px 0;
font-weight: 400;
color: #000000;
font-size: 16px;
}

.remarks p {
margin-bottom: 15px;
font-size: 13px;
color: #696664;
}

.remarks .price {
padding-top: 20px;
padding-bottom: 20px;
font-size: 18px;
}

.price h4 {
display: inline-block;
font-weight: 500;
color: #7D7D7D;
}

.btns {
padding-left: 32px;
padding-right: 30px;
padding-top: 30px;
}
/* 新增 按钮 */
/* 指导价 购买须知 */
.edit-a {
display: inline-block;
margin-left: 21px;
background: url(/images/TravelRepository/icon/编辑-带圈.png) no-repeat;
padding-left: 24px;
font-size: 13px;
color: #696664;
}

.delete-a {
display: inline-block;
margin-left: 21px;
background: url(/images/TravelRepository/icon/删除.png) no-repeat;
padding-left: 24px;
font-size: 13px;
color: #696664;
}

/* banner 修改 */
.banner-price{
position: absolute;
bottom: 24px;
right: 300px;
}
.banner-price strong{
color: #fff;
font-size: 13px;
font-weight: 100;
}
.banner-edit {
width: 30px;
position: absolute;
bottom: 20px;
left: 150px;
display: block;
border: solid 1px #fff;
color: #fff;
padding: 4px 7px 4px 27px;
border-radius: 10px;
background: url(/images/TravelRepository/icon/编辑.png) no-repeat;
font-size: 14px;
background-position: 8px 6px;
}

.xcyt {
padding-left: 110px;
height: 90px;
line-height: 90px;
}
.small-site{
margin-left: 25px;
font-size: 14px;
color: #888;
}
.everyDayTravel .blue-btn{
font-size: 18px;
}
/*酒店安排 */
.hotel-ap{
    padding-top:20px;
    padding-left:20px;
}
.hotel-ap-li{
    margin-top:10px;
}
.hotel-ap .titleName{
    display: inline-block;
    margin-right: 300px;
}
.hotel-ap-li a{
    display:inline-block;
    min-width:300px;
    color:#17A9FF;
    font-size:18px;
}
.hotel-ap-li span{
    display:inline-block;
    margin:0 12px;
    color:#999;
    font-size:16px;
}
.hotel-ap-li input{
    width:94px;
    height:40px;
    margin-left:30px;
    text-align:center;
    color:#333;
    font-size:18px;
}
@endsection

@section('toplist')
<li><a href="/goods">行程列表</a></li>
<li class="closeLi">
    <a class="active">行程详情</a>
    <a class="closePage" href="/goods">×</a>
</li>
@endsection
@section('main')
<div class="main fl clearfloat">
    <!-- banner -->
    <div class="banner">
        <img src="{{$rs->banner}}" alt="">
        <div class="shadow"></div>
        <div class="detail">
            <p><strong>{{$rs->name}} </strong></p>
            <p><span>游玩时长：{{$rs->days}} <i style="display:inline-block;width: 60px;"></i> {{$rs->start_date}} 出发</span>
            </p>
        </div>
        <div class="banner-price">
            <strong>成本价: </strong><span class="color-blue"> {{$rs->price}}</span>
            <i style="display:inline-block;width: 20%;"></i>
            <br>
            <strong>指导价: </strong> <span class="color-yellow"> {{$rs->price_sel}}</span>
            <a href="/goods/{{$rs->id}}/edit" class="banner-edit">
                编辑
            </a>
        </div>
    </div>
    <!-- 酒店安排 -->
{{--    <div class='hotel-ap'>--}}
{{--        <div>--}}
{{--            <strong class="titleName">酒店安排</strong>--}}
{{--            <a href="/goods/{{$rs->id}}/edit" class="edit-a"> 编辑</a>--}}
{{--            <ul>--}}
{{--                <li class='hotel-ap-li'>--}}
{{--                    <a href="">楠大极福福发酒店</a>--}}
{{--                    <span>泰国 </span>--}}
{{--                    <span>500</span> --}}
{{--                    <input type="text" value="12" disabled>--}}
{{--                    <span>天</span>--}}
{{--                    <input type="text" value="12" disabled>--}}
{{--                    <span>元</span>--}}
{{--                </li>--}}
{{--                <li class='hotel-ap-li'>--}}
{{--                    <a href="">楠大极福福发酒店</a>--}}
{{--                    <span>泰国 </span>--}}
{{--                    <span>500</span> --}}
{{--                    <input type="text" value="12" disabled>--}}
{{--                    <span>天</span>--}}
{{--                    <input type="text" value="12" disabled>--}}
{{--                    <span>元</span>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}


    <!-- 每日行程 -->
    @foreach($rs->good_days as $k=>$v)
    <div class="everyDayTravel">
        <div>
            <button class="blue-btn">第{{++$k}}天：{{$v->comment}}</button>
            <a href="/goods_poi/{{$v->id}}/edit" class="edit-a"> 编辑</a>
            <form action="/goods_poi/{{$v->id}}" method="post" style="display: inline-block;">
                {{csrf_field()}}
                {{method_field('delete')}}
                <button class="delete-a" style="border: 0;"> 删除</button>
            </form>
        </div>
        <ul>
            @foreach($v->day_resource as $kk =>$vv)
            <li>
                @if(isset($vv->resource_info))
                <p><img class="class-icon" src="/images/TravelRepository/icon/{{$vv->resource_info->classinfo->icon}}">
                    <strong class="titleName" style="font-weight: 600">{{$vv->resource_info->classinfo->name}}</strong>
                </p>
                <p class="pl32"> <strong class="titleName">{{$vv->resource_info->name}}</strong>
                    @if($vv->resource_info->classid != 4)
                    <span class="small-site">位置：{{$vv->resource_info->site}}</span>
                    @endif
                </p>
                @if(!is_null($vv->resource_info->imgs))
                <p class="pl32">
                    @if($vv->resource_info->classid != 4)
                    @foreach(json_decode($vv->resource_info->imgs) as $k1=>$v1)
                    <img src="{{$v1}}">
                    @endforeach
                    @endif
                </p>
                @endif
                <p class="color-gray pl32">{{$vv->resource_info->des}}
                </p>
                @else
                <h3>资源已失效, 请重新编辑</h3>
                @endif
            </li>
            @endforeach
            <li>
                @if(isset($v->dess))
                <p><span>备注：</span></p>
                <p class="pl32">{{$v->dess}}</p>
                @endif
            </li>
        </ul>

    </div>
    @endforeach
    <div class="xcyt">
        <a href="/goods_poi/{{$rs->id}}/create" class="yellow-btn">新增一天</a>
    </div>
    <div class="remarks">
        <h5>行程备注</h5>
        <p>{{$rs->comment}}</p>
        <h5>价格包含</h5>
        <p>
            @foreach($data['res'] as $k3 => $v3)
            @if(isset($v3->resource_info))
            {{$v3->resource_info->lxinfo->name}} ：{{$v3->resource_info->name}}<br>
            @else
            资源已失效 <br>
            @endif
            @endforeach
        </p>
        <h5>购买须知 <a href="/goods_poi/{{$rs->id}}/last" class="edit-a"> 编辑</a></h5>
        <p>{{$rs->des}}</p>

    </div>

</div>
<div class="btns clearfloat">
    <div class="fl">

        <form action="/goods/{{$rs->id}}" method="post" style="display: inline-block">
            {{csrf_field()}}
            {{method_field('delete')}}
            <button class="red-btn">删除</button>
            <a href='http://travel.huiur.com/goods' class="blue-btn">完成</a>
        </form>
    </div>
    <div class="fr">
        <button class="yellow-btn">链接分享</button>
        <button class="yellow-btn">二维码分享</button>
        <button class="blue-btn">下载文档</button>
    </div>
</div>
@endsection
@section('script')
$('#goods').addClass('active');
@endsection