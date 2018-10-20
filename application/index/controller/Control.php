<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\index\controller\Base;

class Control extends Base
{


    /**
     * @显示中控页面
     */
    public function show_list()
    {
        $this->head();

        //获取提交过来的页码数，如果没有，则设置为1。（主要用于表格第一列的序号）
        $page = input('get.page') ? input('get.page') : 1;

        //获取要排序的列和排序方式
        $item = input('get.item');
        $sort = input('get.sort') ? input('get.sort') : 'asc';

        $search = input('get.search') ? input('get.search') : '';

        //如果排序的列值为空，则默认id排序
        if ($item == '') {
            $order = 'id asc';
        } else {
            //用于升降序切换
            if ($sort == 'asc') {
                $sort = 'desc';
            } else {
                $sort = 'asc';
            }
            $order = $item . ' ' . $sort;
        }

        //判断是否模糊查询
        if ($search == '') {
            $whereOr = '';
        } else {
            //模糊查询的字段
            $whereOr = [
                'addr|name|use_nub|use_time' => ['like', "%$search%"],
            ];
        }

        //权限控制，用于可读权限级别
        $auth_display = 'block';

        //获取服务器aid
        $aid_users = json_decode(session('aid_users', '', 'base_'), true);
        //获取权限级别
        $auth_level = session('auth_level', '', 'base_');

        //如果级联服务器的表不存在，则终止
        if (!$this->check_db($aid_users[0])) {
            return '页面错误...';
        }

        //1,3权限级别为全部，2,4权限级别为部分
        if ($auth_level == '1' || $auth_level == '3') {
            //通过aid服务器表，获取楼栋的下拉框
            $addr_select = db($aid_users[0])
                ->field('addr')
                ->group('addr')
                ->select();
        } elseif ($auth_level == '2' || $auth_level == '4') {
            //获取mac_users（权限级别为部分用户所能管理的终端mac）
            $mac_users = json_decode(session('mac_users', '', 'base_'), true);
            //通过aid服务器表，获取楼栋的下拉框
            $addr_select = db($aid_users[0])
                ->field('addr')
                ->whereIn('mac', $mac_users)
                ->group('addr')
                ->select();
        }

        //侧栏的树形展示
        // $aside_data = "{id:'所有设备', pId:0, name:'所有设备', open:true},";
        // foreach ($addr_select as $v) {
        //     $aside_data .= "{id:'$v[addr]', pId:'所有设备', name:'$v[addr]'},";
        // }

        //左侧栏的跳转（单击了哪个）
        $selected = input('get.selected');
        //要提取的字段
        $field = 'id,name,addr,use_nub,use_time,state_net,state_dev,dev_en,teacher,vga_state,video_state,hdmi_state,pro_state,io_state,ip,mac,aid,version,note_info';

        //1,3权限级别为全部，2,4权限级别为部分
        if ($auth_level == '1' || $auth_level == '3') {
            //如果get获取的selected值为‘所有设备’或为空，则获取所有设备信息
            //否则，就获取selected值的楼栋设备信息
            if ($selected == '所有设备' || $selected == '') {
                $device_info = db($aid_users[0])
                    ->field($field)
                    ->whereOr($whereOr)
                    ->order($order)
                    ->paginate(10);
            } else {
                if ($whereOr == '') {
                    //所有所有
                    $device_info = db($aid_users[0])
                        ->field($field)
                        ->where('addr', $selected)
                        ->order($order)
                        ->paginate(10);
                } else {
                    //模糊查询
                    $device_info = db($aid_users[0])
                        ->field($field)
                        ->where('addr', $selected)
                        ->where($whereOr)
                        ->order($order)
                        ->paginate(10);
                }

            }

        } elseif ($auth_level == '2' || $auth_level == '4') {
            //如果get获取的selected值为‘所有设备’或为空，则获取所有设备信息
            //否则，就获取selected值的楼栋设备信息
            if ($selected == '所有设备' || $selected == '') {
                $device_info = db($aid_users[0])
                    ->field($field)
                    ->whereIn('mac', $mac_users)
                    ->whereOr($whereOr)
                    ->order($order)
                    ->paginate(10);
            } else {
                if ($whereOr == '') {
                    //所有所有
                    $device_info = db($aid_users[0])
                        ->field($field)
                        ->where('addr', $selected)
                        ->whereIn('mac', $mac_users)
                        ->order($order)
                        ->paginate(10);
                } else {
                    //模糊查询
                    $device_info = db($aid_users[0])
                        ->field($field)
                        ->where('addr', $selected)
                        ->where($whereOr)
                        ->whereIn('mac', $mac_users)
                        ->order($order)
                        ->paginate(10);
                }
            }
        }

        //如果权限级别为可读时，则隐藏控制按钮
        if ($auth_level == '3' || $auth_level == '4') {
            $auth_display = 'none';
        }

        //防止sort排序字段不能显示
        $sort = urlencode($sort);

        $this->assign([
            'page' => $page,
            'selected' => $selected,
            'sort' => $sort,
            'search' => $search,
            'auth_display' => $auth_display,
            // 'addr_select' => $addr_select,
            // 'aside_data' => $aside_data,
            // 'device_info' => $device_info
        ]);
        return view('show_list');
    }

    /**
     * @编辑 -- 中控页面
     */
    public function edit()
    {
        //获取级联服务器aid
        $aid_users = json_decode(session('aid_users', '', 'base_'), true);
        //获取用户的权限级别
        $auth_level = session('auth_level', '', 'base_');

        //因为session对exit()的影响，会乱码，所以这里编码为utf-8
        header("Content-Type: text/html; charset=utf-8");

        //以下情况不能进入此页面
        if ($auth_level == '3' || $auth_level == '4') {   //权限为可读的用户，不能进入此页面
            exit('没有权限');
        } elseif (!$this->check_db($aid_users[0])) { //aid_users的aid所指的表不存在
            exit('没有权限');
        }

        //获取提交（get/post）的终端id和mac。
        $id = input('param.id');
        $mac = input('param.mac');

        $field = 'state_net,dev_en,use_time,use_nub,pro_state,vga_state,video_state,hdmi_state';
        $device_info = db($aid_users[0])
            ->field($field)
            ->where('id', $id)
            ->find();

        if (request()->isAjax()) {
            //获取向UDP服务器传递的值
            $code = input('post.code');
            //设置当台终端的id。主要用于edit_listen的监听操作是否成功
            session('control_edit_listen_id', $id);

            //权限级别为全部用户
            if ($auth_level == '1') {
                //获取级联服务器所有终端的mac
                $server = db($aid_users['0'])->field('mac')->select();

                //防止（通过Burpsuite或curl模拟）恶意向UDP服务器乱发不存在终端mac的指令
                //判断提交过来的mac是否在aid所指的表中
                foreach ($server as $v) {
                    $device_mac[] = $v['mac'];
                }
                if (!in_array($mac, $device_mac)) {
                    exit('没有权限');
                }

                //权限级别为部分用户
            } elseif ($auth_level == '2') {
                //获取能管理的部分终端mac
                $mac_users = json_decode(session('mac_users', '', 'base_'), true);
                //防止（通过Burpsuite或curl模拟）恶意向UDP服务器乱发不存在终端mac的指令
                //防止越权，去控制不在用户能管理的终端（只能控制权限内的终端）
                if (!in_array($mac, $mac_users)) {
                    exit('没有权限');
                }
            }

            //UDP服务器的ip和port
            $ip = IP;
            $port = PORT;
            //连接UDP服务器
            $handle = stream_socket_client("udp://{$ip}:{$port}", $errno, $errstr);
            //如果连接失败则打印错误信息
            if (!$handle) {
                die("ERROR: {$errno} - {$errstr}\n");
            }
            //向UDP服务器发送指令
            fwrite($handle, $code);
            //关闭连接
            fclose($handle);

            return ['state' => $code];
        }

        $this->assign([
            'id' => $id,
            'mac' => $mac,
            'device_info' => $device_info
        ]);
        return view('edit');
    }


    /**
     * @sse监听 -- 中控页面
     */
    public function edit_listen()
    {
        //设置头
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');

        //打开的当条数据的id
        $edit_listen_id = session('control_edit_listen_id');
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


    /**
     * @sse监听 -- 中控页面
     */
    public function show_list_listen()
    {
        //设置头
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');

        //获取是哪一栋（左侧点击了哪个）
        $selected = input('get.selected');

        //获取用户的权限类
        $auth_level = session('auth_level', '', 'base_');
        //服务器的aid
        $aid_users = json_decode(session('aid_users', '', 'base_'), true);

        //如果级联服务器的表不存在，则终止
        if (!$this->check_db($aid_users[0])) {
            echo "data: \n\n";
        }else{
            if ($auth_level == '1' || $auth_level == '3') { //权限类为1/3,查询整个表
                //获取所有向UDP服务器发送的指令终端修改成功后的所有id
                if($selected == '所有设备' || $selected == ''){
                    $result = db($aid_users[0])
                        ->field('id')
                        ->where('listen_state', 'success')
                        ->select();
                } else {
                    $result = db($aid_users[0])
                        ->field('id')
                        ->where('addr', $selected)
                        ->where('listen_state', 'success')
                        ->select();
                }
            }elseif ($auth_level == '2' || $auth_level == '4') {   //权限类为2/4，查询能管理的mac终端
                //获取mac列表
                $mac_users = json_decode(session('mac_users', '', 'base_'), true);
                //获取所有向UDP服务器发送的指令终端修改成功后的所有id
                if ($selected == '所有设备' || $selected == '') {
                    $result = db($aid_users[0])
                        ->field('id')
                        ->where('listen_state', 'success')
                        ->whereIn('mac', $mac_users)
                        ->select();
                } else {
                    $result = db($aid_users[0])
                        ->field('id')
                        ->where('listen_state', 'success')
                        ->where('addr', $selected)
                        ->whereIn('mac', $mac_users)
                        ->select();
                }
            }

            if($result){
                //将id集合转为一维数组
                foreach ($result as $v){
                    $ids[] = $v['id'];
                }
                //将更新的监听指令恢复为error
                db($aid_users[0])
                    ->whereIn('id', $ids)
                    ->update(['listen_state' => 'error']);
                $ids = implode(',',$ids);
                echo "data: {$ids}\n\n";
            }else{
                echo "data: \n\n";
            }
        }

        //ob_flush()和flush()的区别
        //前者是把数据从PHP的缓冲中释放出来,后者是把不在缓冲中的或者说是被释放出来的数据发送到浏览器
        //所以当缓冲存在的时候，我们必须ob_flush()和flush()同时使用
        ob_flush();
        flush();

    }

    public function qwe(){
        //获取用户的权限类
        $auth_class = session('auth_class', '', 'base_');
        dump($auth_class);
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
            $field = 'state_net,dev_en,use_time,use_nub,pro_state,vga_state,video_state,hdmi_state';
            //获取当条数据
            $result = db($aid_users[0])
                ->field($field)
                ->where('id', $id)
                ->find();

            return ['result' => $result];
        }
    }


    public function all_open()
    {

        if (request()->isAjax()) {

            $state = '';

            //获取服务器aid
            $aid_users = json_decode(session('aid_users', '', 'base_'), true);


            return ['state' => $state];
        }

    }


    public function all_down()
    {

        if (request()->isAjax()) {

            $state = '';


            return ['state' => $state];
        }
    }


    public function qwer(){
        $id = '54545';
        $en = passport_encrypt($id);
        echo '加密:'.$en;
        echo '<br/>';
        echo '解密:'.passport_decrypt($en);
    }


}
