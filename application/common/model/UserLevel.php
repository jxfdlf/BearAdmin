<?php
/**
 * 前台用户等级类
 * @author yupoxiong<i@yufuping.com>
 */

namespace app\common\model;

use traits\model\SoftDelete;

class UserLevel extends Model
{
    use SoftDelete;
    protected $name = 'user_level';
    protected $autoWriteTimestamp = true;

    public function user()
    {
        return $this->hasMany('User','level_id','id');
    }
}
