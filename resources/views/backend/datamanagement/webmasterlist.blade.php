@extends("backend.layout.layout")
@section("content")
    <section class="Hui-article-box">
        <div class="Hui-article">
            <input type="hidden" id="hid_tid" value="0" />
            <article class="cl pd-20">

                <div class="text-c">
                    <form id="frm_admin" action="/backend/today/webmasterlist" method="post" >
                        {{csrf_field()}}
                        日期范围：
                        <input type="text" name="stime" value="{{$stime}}" id="stime" class="input-text" style="width:100px">
                        至
                        <input type="text" name="etime" value="{{$etime}}" id="etime" class="input-text" style="width:100px">
                        &nbsp;
                        <input type="text" class="input-text" style="width:200px" placeholder="输入站长ID" id="webmasterid" name="webmasterid" value="{{$webmasterid}}">

                        <button type="submit" class="btn btn-success radius" id="btn_seach" name="btn_seach">
                            <i class="Hui-iconfont">&#xe665;</i> 搜
                        </button>
                    </form>
                </div>

                <div class="mt-20">
                    <table class="table table-border table-bordered table-hover table-bg table-sort">
                        <thead>
                        <tr class="text-c">
                            <th width="20">站长ID</th>
                            <th width="50">站长帐号</th>
                            <th width="50">请求数</th>
                            <th width="50">展示数(PV)</th>
                            <th width="50">IP数</th>
                            <th width="50">总点击数</th>
                            <th width="50">点击IP</th>
                            <th width="50">点击率</th>
                            <th width="50">实际成交金额</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($webmasterEarnArray as $data)
                            <tr class="text-c">
                                <td>{{$data['webmaster_id']}}</td>
                                <td>{{$data['name']}}</td>
                                <td>{{$data['totalPv']}}</td>
                                <td>{{$data['totalView']}}</td>
                                <td>{{$data['totalIp']}}</td>
                                <td>{{$data['totalClick']}}</td>
                                <td>{{$data['totalClickIp']}}</td>
                                <td>{{empty($data['totalView'])?0:round($data['totalIp']/$data['totalView'],5)}}</td>
                                <td>{{$data['totalEarn']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="ml-12" style="text-align: center;">
                    {!! $webmasterEarnArray->appends(array('stime'=>$stime,'etime'=>$etime))->render() !!}
                </div>

            </article>
        </div>

        <hr />

    </section>
    <script src="<?php echo asset( "/resources/views/backend/js/laydate/laydate.js") ?>" type="text/javascript"></script>
    <script src="<?php echo asset( "/resources/views/backend/js/baseCheck.js?ver=1.0") ?>" type="text/javascript"></script>

    <script>
        laydate.render({
            elem: '#stime'
        });
        laydate.render({
            elem: '#etime'
        });
    </script>



@endsection