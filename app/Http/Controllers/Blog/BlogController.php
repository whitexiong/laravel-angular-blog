<?php


namespace App\Http\Controllers\Blog;


use App\CodeResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BlogController extends Controller
{
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