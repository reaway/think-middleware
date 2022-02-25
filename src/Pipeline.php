<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2021 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------
namespace Think\Component\Middleware;

use Closure;
use Exception;
use Throwable;

class Pipeline
{
    protected $passable;

    protected $pipes = [];

    /**
     * 初始数据
     * @param $passable
     * @return $this
     */
    public function send($passable)
    {
        $this->passable = $passable;
        return $this;
    }

    /**
     * 调用栈
     * @param $pipes
     * @return $this
     */
    public function through($pipes)
    {
        $this->pipes = is_array($pipes) ? $pipes : func_get_args();
        return $this;
    }

    /**
     * 执行
     * @param Closure $destination
     * @return mixed
     */
    public function then(Closure $destination)
    {
        $pipeline = array_reduce(
            array_reverse($this->pipes),
            $this->carry(),
            function ($passable) use ($destination) {
                return $destination($passable);
            }
        );

        return $pipeline($this->passable);
    }

    protected function carry()
    {
        return function ($stack, $pipe) {
            return function ($passable) use ($stack, $pipe) {
                return $pipe($passable, $stack);
            };
        };
    }
}
