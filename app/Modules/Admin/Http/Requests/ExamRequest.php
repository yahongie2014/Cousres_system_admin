<?php
namespace App\Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'module' => 'required',
			'title' => 'required',
			'duration' => 'required|numeric',
			'scq_count' => 'required|numeric',
			'mcq_count' => 'required|numeric',
			'essay_count' => 'required|numeric',
			'scq_mark' => 'required|numeric',
			'mcq_mark' => 'required|numeric',
			'essay_mark' => 'required|numeric',
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
