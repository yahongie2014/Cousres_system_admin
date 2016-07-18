<?php
namespace App\Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModuleRequest extends FormRequest
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
			'attendance' => 'required|numeric',
			'assignment' => 'required|numeric',
			'exam' => 'required|numeric',
			'pass' => 'required|numeric',
			'start_date' => 'required|date_format:Y-m-d',
			'end_date' => 'required|date_format:Y-m-d',
		];

		$total = $this->attendance + $this->assignment + $this->exam;

		if ($total > 100 || $total < 100) {
			$rules['exam'] = 'digits:100';
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
