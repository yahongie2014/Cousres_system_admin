<?php
namespace App\Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'title' => 'required',
			'course' => 'required',
			'question' => 'required',
			'mark' => 'required|numeric',
			'file' => 'image',
			'start_date' => 'required|date_format:Y-m-d',
			'end_date' => 'required|date_format:Y-m-d',
		];

		if ($this->_method && $this->remove == 0) {
			$rules['file'] = 'image';
		}
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
