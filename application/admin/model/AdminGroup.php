<?php
/**
 * 后台管理员角色模型
 * @author yupoxiong<i@yufuping.com>
 */

namespace app\admin\model;

class AdminGroup extends Admin
{
    protected $name = 'admin_group';

    //关联用户&用户组表
    public function adminGroupAccess(){
        return $this->hasMany('AdminGroupAccess','group_id','id');
    }

    //状态获取器
    public function getStatusTextAttr($value,$data)
    {
        $text = [0=>'否',1=>'是'];
        return $text[$data['status']];
    }
}
