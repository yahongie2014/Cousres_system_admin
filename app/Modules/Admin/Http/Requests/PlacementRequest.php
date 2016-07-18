<?php
namespace App\Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlacementRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'place' => 'required',
			'date' => 'required|date_format:Y-m-d',
			'time' => 'required',
			'message' => 'required',
		];
		return $rules;
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}
}
