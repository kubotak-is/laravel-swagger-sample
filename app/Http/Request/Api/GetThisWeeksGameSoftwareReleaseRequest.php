<?php
declare(strict_types=1);

namespace App\Http\Request\Api;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class GetThisWeeksGameSoftwareReleaseRequest
 * @package App\Http\Request\Api
 */
class GetThisWeeksGameSoftwareReleaseRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
    
    /**
     * @return array
     * @SWG\Parameter(
     *     parameter="GetThisWeeksGameSoftwareReleaseRequest_limit",
     *     name="limit",
     *     description="取得件数",
     *     in="query",
     *     required=false,
     *     type="integer",
     *     format="int32"
     * )
     * @SWG\Parameter(
     *     parameter="GetThisWeeksGameSoftwareReleaseRequest_offset",
     *     name="offset",
     *     description="取得位置",
     *     in="query",
     *     required=false,
     *     type="integer",
     *     format="int32"
     * )
     */
    public function rules(): array
    {
        return [
            'limit'  => 'integer|min:1',
            'offset' => 'integer|min:0',
        ];
    }
}
