<?php
namespace App\Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'exam' => 'required',
			'question' => 'required',
		];
		
		if ($this->question_type == 1) {
			$rules['choices'] = 'required';
		}
		
		if ($this->question_type == 2) {
			$rules['correct_choices'] = 'required';
		}
		
		if ($this->question_type == 3) {
			$rules['file'] = 'image';
			$rules['file_answer'] = 'image';
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
