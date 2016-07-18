<?php
namespace App\Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6|confirmed',
			'fullname' => 'required',
			'img' => 'image',
		];
		if ($this->_method) {
			$rules['email'] = 'required|email|unique:users,email,'.$this->user_id;
			$rules['password'] = 'min:6|confirmed';
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
