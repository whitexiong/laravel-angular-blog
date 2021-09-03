<?php


namespace App\Http\Controllers\Blog;


use App\CodeResponse;
use App\Http\Controllers\Controller;
use App\VerifyRequestInput;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    use VerifyRequestInput;

    //只允许那些接口进行权限严重
    protected $only;

    //排除那些不需要权限验证
    protected $except;


    public function __construct()
    {

        $option = [];
        if (!is_null($this->only)) {
            $option['only'] = $this->only;
        }

        if (!is_null($this->except)) {
            $option['except'] = $this->except;
        }

        $this->middleware('auth:blog', $option);
    }

    /**
     *
     * @return Authenticatable|null
     */
    public function user()
    {
        return Auth::guard('wx')->user();
    }

    public function isLogin()
    {
        return !is_null($this->user());
    }

    public function userId()
    {
        return $this->user()->getAuthIdentifier();//返回主键
    }

    /**
     * @param $page
     * @param  null  $list
     * @return JsonResponse
     */
    protected function successPaginate($page, $list = null)
    {
        return $this->success($this->paginate($page, $list));
    }

    /**
     * @param $page
     * @param  null  $list
     * @return array|mixed
     */
    protected function paginate($page, $list = null)
    {
        if ($page instanceof LengthAwarePaginator) {
            $total = $page->total();
            return [
                'total' => $page->total(),  //总数量
                'page' => $total == 0 ? 0 : $page->currentPage(),  //现在的页面
                'limit' => $page->perPage(), //每页多少
                'pages' => $total == 0 ? 0 : $page->lastPage(), //一共多少页
                'list' => $list ?? $page->items(),
            ];
        }

        if ($page instanceof Collection) {
            $page = $page->toArray();
        }

        if (!is_array($page)) {
            return $page;
        }
        $total = count($page);
        return [
            'total' => $total,  //总数量
            'page' => $total == 0 ? 0 : 1,  //现在的页面
            'limit' => $total, //每页多少
            'pages' => $total == 0 ? 0 : 1, //一共多少页
            'list' => $page,
        ];
    }

    /**
     * @param  array  $codeResponse
     * @param  null  $data
     * @param  string  $info
     * @return JsonResponse
     */
    protected function codeReturn(array $codeResponse, $data = null, $info = '')
    {
        list($errno, $errmsg) = $codeResponse;
        $ret = ['errno' => $errno, 'errmsg' => $info ?: $errmsg];
        if (!is_null($data)) {
            if(is_array($data)){
                $data = array_filter($data, function ($item){
                    return $item !== null;
                });
            }
            $ret['data'] = $data;
        }
        return response()->json($ret);
    }

    /**
     * @param  null  $data
     * @return JsonResponse
     */
    protected function success($data = null)
    {
        return $this->codeReturn(CodeResponse::SUCCESS, $data);
    }

    /**
     * @param  array  $codeResponse
     * @param  string  $info
     * @return JsonResponse
     */
    protected function fail(array $codeResponse = CodeResponse::FAIL, $info = '')
    {
        return $this->codeReturn($codeResponse, null, $info);
    }

    /**
     * @param $isSuccess
     * @param  array  $codeResponse
     * @param  null  $data
     * @param  string  $info
     * @return JsonResponse
     */
    protected function failOrSuccess(
        $isSuccess,
        array $codeResponse = CodeResponse::FAIL,
        $data = null,
        $info = ''
    ) {
        if($isSuccess){
            return $this->success($data);
        }

        return $this->fail($codeResponse, $info);
    }
}