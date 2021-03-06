<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link href="<?php echo asset( "/resources/views/backend/static/h-ui/css/H-ui.min.css") ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset( "/resources/views/backend/static/h-ui.admin/css/H-ui.login.css") ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset( "/resources/views/backend/static/h-ui.admin/css/style.css") ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo asset( "/resources/views/backend/static/Hui-iconfont/1.0.8/iconfont.css") ?>" rel="stylesheet" type="text/css" />

    <title>处理广告商存款</title>
    <meta name="keywords" content="处理广告商存款">
    <meta name="description" content="处理广告商存款">
</head>
<body>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/jquery.min.1.9.1.js") ?>"></script>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/My97DatePicker/4.8/WdatePicker.js"); ?>"></script>
<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/layer/layer.js") ?>"></script>

<script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/include/deposit.js?ver=1.0"); ?>"></script>
<div id="frm_account" class="col-xs-12" style="text-align: center;">
    <form class="form form-horizontal" id="form1">
        {{csrf_field()}}
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">广告主：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                {{$DepositDetail[0]['name']}}
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">充值金额：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                {{$DepositDetail[0]['money']}}
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">订单号：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                {{$DepositDetail[0]['order_no']}}
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">支付类型：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                @if($DepositDetail[0]['type']==1)银行转帐@elseif($DepositDetail[0]['type']==2)支付宝转帐@else微信转帐@endif
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">收款银行：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                {{$DepositDetail[0]['bank']}}
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">收款帐号：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                {{$DepositDetail[0]['account_number']}}
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">收款人：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                {{$DepositDetail[0]['account_name']}}
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">付款人：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                {{$DepositDetail[0]['payer_account_name']}}
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">支付IP：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                {{$DepositDetail[0]['pay_ip']}}
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3" style="color: red;">状态*：</label>
            <div class="col-xs-9 col-sm-9">
                <select name="status" style="float:left;" id="status">
                    {{--<option value="0" >未处理</option>--}}
                    <option value="1" >处理成功</option>
                    <option value="2" >用户未充值</option>
                    <option value="3" >关闭该订单</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3" style="color: red;">备注*：</label>
            <div class="col-xs-9 col-sm-9">
                <textarea rows="5" cols="63" name="remark" id="remark">{{$DepositDetail[0]['remark']}}</textarea>
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">创建时间：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                {{$DepositDetail[0]['created_at']}}
            </div>
        </div>
        <div class="col-xs-12 row cl">
            <label class="form-label col-xs-3 col-sm-3">更新时间：</label>
            <div class="col-xs-9 col-sm-9" style="text-align: left;">
                {{$DepositDetail[0]['updated_at']}}
            </div>
        </div>

        <div class="col-xs-12 row cl" style="text-align: center;">
            <div class="formControls col-xs-12 col-sm-12">
                <input type="button" onclick="updatedepositorder('{{$DepositDetail[0]['deposit_id']}}','{{$DepositDetail[0]['member_id']}}')" class="btn btn-primary" value="更新充值订单" id="btn_add_ok" />
            </div>
        </div>

    </form>
</div>

<script>


</script>



</body>
</html>
