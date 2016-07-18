<?php
namespace App\Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$rules = [
			'session' => 'required',
			'title' => 'required',
			'type' => 'required',
			'url_link' => 'required_if:type,link|url',
			'url_file' => 'required_if:type,file|mimes:pdf',
		];
		if ($this->_method) {
			$rules['url_file'] = 'mimes:pdf';
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
