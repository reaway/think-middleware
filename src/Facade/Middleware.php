<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2021 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
declare (strict_types = 1);

namespace Think\Component\Middleware\Facade;

use Throwable;
use Think\Component\Facade\Facade;
use Think\Component\Middleware\Pipeline;
use Think\Component\Http\Request;
use Think\Component\Http\Response;

/**
 * @see \Think\Component\Middleware\Middleware
 * @package think\facade
 * @mixin \Think\Component\Middleware\Middleware
 * @method static void import(array $middlewares = [], string $type = 'global') 导入中间件
 * @method static void add(mixed $middleware, string $type = 'global') 注册中间件
 * @method static void route(mixed $middleware) 注册路由中间件
 * @method static void controller(mixed $middleware) 注册控制器中间件
 * @method static mixed unshift(mixed $middleware, string $type = 'global') 注册中间件到开始位置
 * @method static array all(string $type = 'global') 获取注册的中间件
 * @method static Pipeline pipeline(string $type = 'global') 调度管道
 * @method static mixed end(Response $response) 结束调度
 * @method static Response handleException(Request $passable, Throwable $e) 异常处理
 */
class Middleware extends Facade
{
    /**
     * 获取当前Facade对应类名（或者已经绑定的容器对象标识）
     * @access protected
     * @return string
     */
    protected static function getFacadeClass()
    {
        return 'Think\Component\Middleware\Middleware';
    }
}
