<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'name' => 'required',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6|confirmed',
			'fullname' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'university_id' => 'required',
			'major' => 'required',
			'academic_year' => 'required',
			'birth_date' => 'required|date',
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
