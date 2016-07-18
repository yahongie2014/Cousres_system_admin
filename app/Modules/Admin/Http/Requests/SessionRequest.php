<?php
namespace App\Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'course' => 'required',
			'title' => 'required',
			'img' => 'image',
			'start_date' => 'required|date_format:Y-m-d',
			'video' => 'required|url',
			'video_stop' => 'required|date_format:H:i:s',
			'question' => 'required',
			'choice1' => 'required',
			'choice2' => 'required',
			'choice3' => 'required',
			'correct_answer' => 'required',
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
