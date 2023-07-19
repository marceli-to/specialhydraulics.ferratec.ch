<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class TrainingFormRequest extends FormRequest
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
      'name' => 'required',
      'firstname' => 'required',
      'company' => 'required',
      'phone' => 'required',
      'headcount' => 'required',
      'email' => 'required|string|email',
      'date' => 'required',
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
      'name.required' => 'Name muss ausgefüllt sein.',
      'firstname.required' => 'Vorname muss ausgefüllt sein.',
      'company.required' => 'Firma muss ausgefüllt sein.',
      'street.required' => 'Strasse muss ausgefüllt sein.',
      'phone.required' => 'Telefon muss ausgefüllt sein.',
      'headcount.required' => 'Anzahl Teilnehmer muss ausgefüllt sein.',
      'email.required' => 'E-Mail muss ausgefüllt sein.',
      'email.email' => 'E-Mail ist ungültig.',
      'email.string' => 'E-Mail ist ungültig.',
    ];
  }
}
