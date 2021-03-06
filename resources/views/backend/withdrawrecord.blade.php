@extends("backend.layout.layout")
@section("content")
    <script type="text/javascript" src="<?php echo asset( "/resources/views/backend/js/include/withdraw.js?ver=1.0"); ?>"></script>
    <section class="Hui-article-box">
        <div class="Hui-article">
            <input type="hidden" id="hid_tid" value="0" />
            <article class="cl pd-20">

                <div class="text-c">
                    <form id="frm_admin" action="/backend/money/withdraw" method="post" >
                        {{csrf_field()}}
                        <input type="text" class="input-text" style="width:250px" placeholder="输入站长" id="member" name="member" value="">
                        <button type="submit" class="btn btn-success radius" id="btn_seach" name="btn_seach">
                            <i class="Hui-iconfont">&#xe665;</i> 搜
                        </button>
                    </form>
                </div>

                <div class="mt-20">
                    <table class="table table-border table-bordered table-hover table-bg table-sort">
                        <thead>
                        <tr class="text-c">
                            <th width="10">ID</th>
                            <th width="50">站长</th>
                            <th width="50">提款金额</th>
                            <th width="50">订单号</th>
                            <th width="100">提款帐号信息</th>
                            <th width="50">支付IP</th>
                            <th width="50">状态</th>
                            <th width="100">备注</th>
                            <th width="30">创建时间</th>
                            <th width="30">处理时间</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($WithdrawArray as $data)
                            <tr class="text-c">
                                <td>{{$data['withdraw_id']}}</td>
                                <td>{{$data['name']}}</td>
                                <td>{{$data['money']}}</td>
                                <td>{{$data['order_no']}}</td>
                                <td>{{$data['bank_name']}}-{{$data['account_name']}}-{{$data['bank_number']}}</td>
                                <td>{{$data['apply_withdraw_ip']}}</td>
                                <td>@if($data['status']==1)提款成功@elseif($data['status']==2)提示订单关闭@endif</td>
                                <td>{{$data['remark']}}</td>
                                <td>{{$data['created_at']}}</td>
                                <td>{{$data['updated_at']}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="ml-12" style="text-align: center;">
                    {{ $WithdrawArray->links() }}
                </div>


            </article>
        </div>

        <hr />

    </section>
    <script>

    </script>



@endsection