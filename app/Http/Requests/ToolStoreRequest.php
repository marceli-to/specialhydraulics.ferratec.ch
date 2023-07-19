<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ToolStoreRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'article_no' => 'required',
    ];
  }

  /**
   * Custom message for validation
   *
   * @return array
   */
  public function messages()
  {
    return [
      'article_no.required' => [
        'field' => 'article_no',
        'error' => 'Artikelnummer wird benötigt!'
      ],
    ];
  }
}
