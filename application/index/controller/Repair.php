<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;

class Repair extends Base
{

    /**
     * @显示报修页面
     */
    public function show_list()
    {
        $this->head();

        //获取服务器aid
        $aid_users = json_decode(session('aid_users', '', 'base_'), true);

        //如果级联服务器的表不存在，则终止
        if (!$this->check_db($aid_users[0])) {
            return '没有数据';
        }

        //通过aid服务器表，获取楼栋的下拉框
        $addr_select = db($aid_users[0])
            ->field('addr')
            ->group('addr')
            ->select();

        //侧栏的树形展示
        $aside_data = "{id:'所有设备', pId:0, name:'所有设备', open:true},";
        foreach ($addr_select as $v) {
            $aside_data .= "{id:'$v[addr]', pId:'所有设备', name:'$v[addr]'},";
        }

        //下拉框选中
        $selected = input('get.selected');
        //用提取的字段
        $field = 'id,name,addr,use_nub,use_time,state_net,state_dev,dev_en,dev1,dev2,dev3,dev4,dev5,police,ip,mac,aid,version,note_info';

        //如果get获取的selected值为‘所有设备’或为空，则获取所有设备信息
        //否则，就获取selected值的楼栋设备信息
        if ($selected == '所有设备' || $selected == '') {
            $device_info = db($aid_users[0])
                ->field($field)
                ->select();
        } else {
            $device_info = db($aid_users[0])
                ->field($field)
                ->where('addr', $selected)
                ->select();

        }

        $this->assign([
            'selected' => $selected,
            'addr_select' => $addr_select,
            'aside_data' => $aside_data,
            'device_info' => $device_info
        ]);
        return view('show_list');
    }


    /**
     * @编辑 -- 报修页面
     */
    public function edit()
    {
        //获取提交（get/post）的终端id。
        $id = input('param.id');

        if (request()->isAjax()) {
            //获取向UDP服务器传递的值
            $code = input('post.code');
            //设置当台终端的id。主要用于edit_listen的监听操作是否成功
            session('repair_edit_listen_id', $id);

            //UDP服务器的ip和port
            $ip = IP;
            $port = PORT;

            //向UDP服务器发送数据
            $handle = stream_socket_client("udp://{$ip}:{$port}", $errno, $errstr);
            if (!$handle) {
                die("ERROR: {$errno} - {$errstr}\n");
            }
            fwrite($handle, $code);  // 逐组数据发送
            fclose($handle);        //关闭

            return ['state' => $code];

        }

        $this->assign([
            'id' => $id
        ]);
        return view('edit');
    }


    /**
     * @sse监听 -- 报修页面
     */
    public function edit_listen()
    {
        //设置头
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');

        //打开的当条数据的id
        $edit_listen_id = session('repair_edit_listen_id');
        //服务器的aid
        $aid_users = json_decode(session('aid_users', '', 'base_'), true);

        //查看向UDP发送数据是否有回应，如果成功，则向web前台传递
        $result = db($aid_users[0])
            ->field('listen_state')
            ->where('id', $edit_listen_id)
            ->find();

        if ($result['listen_state'] == 'success') {
            db($aid_users[0])
                ->where('id', $edit_listen_id)
                ->update(['listen_state' => 'error']);
            echo "data: success\n\n";
        } else {
            echo "data: \n\n";
        }

        //ob_flush()和flush()的区别
        //前者是把数据从PHP的缓冲中释放出来,后者是把不在缓冲中的或者说是被释放出来的数据发送到浏览器
        //所以当缓冲存在的时候，我们必须ob_flush()和flush()同时使用
        ob_flush();
        flush();

    }


    //当点击iframe的关闭时，更新当条数据
    public function edit_change()
    {

        if (request()->isAjax()) {
            //获取ajax提交的当条数据id
            $id = input('post.id');
            //获取服务器aid
            $aid_users = json_decode(session('aid_users', '', 'base_'), true);
            //要获取的字段
            $field = 'state_net,dev_en,use_time,use_nub,police';
            //获取当条数据
            $result = db($aid_users[0])
                ->field($field)
                ->where('id', $id)
                ->find();

            return ['result' => $result];
        }
    }


}
