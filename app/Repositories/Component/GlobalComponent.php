<?php

namespace App\Repositories\Component;

use App\Models\Patient;
use Auth;

class GlobalComponent
{
	public static function PrintHeader()
	{
		return '
			<table class="table-header" width="100%">
				<tr>
					<td rowspan="5" width="20%" style="padding: 10px;">
						<img src="/images/setting/' . Auth::user()->setting()->logo . '" alt="IMG">
					</td>
					<td class="text-center" style="padding: 5px 0;">
						<h6 class="KHOSMoulLight" style="font-size: 19px;">' . Auth::user()->setting()->clinic_name_kh . '</h6>
					</td>
				</tr>
				<tr>
					<td class="text-center" style="padding: 2px 0;">
						<h6 class="roboto_b" style="font-size: 19px;">' . Auth::user()->setting()->clinic_name_en . '</h6>
					</td>
				</tr>
				<tr>
					<td class="text-center" style="padding: 1px 0;">
						<div>' . Auth::user()->setting()->description . '</div>
					</td>
				</tr>
				<tr>
					<td class="text-center" style="padding: 1px 0;">
						<div>' . Auth::user()->setting()->address . '</div>
					</td>
				</tr>
				<tr>
					<td class="text-center" style="padding-bottom: 5px;">
						<div>លេខទូរស័ព្ទ: ' . Auth::user()->setting()->phone . '</div>
					</td>
				</tr>
			</table>
		';
	}

	public static function DoctorSignature($doctor_name = '', $title_signature = 'គ្រូពេទ្យព្យាបាល')
	{
		return "
			<div class='text-center' style='position: absolute; right: 70px; bottom: 70px;'>
				<div><strong>$title_signature</strong></div>
				<div class='sign_box'></div>
				<div><span class='KHOSMoulLight'>" . ($doctor_name ?: Auth::user()->setting()->sign_name_kh) . "</span></div>
			</div>
		";
	}

	public static function FooterComeBackText($text = '', $color = 'red')
	{
		return "
			<div style='color: $color; text-align: center; text-decoration: underline; position: absolute; bottom: 25px; left: 50%; transform: translateX(-50%);'>
				" . ($text ?: 'សូមយកវេជ្ជបញ្ជាមកវិញពេលមកពិនិត្យលើក្រោយ') . "
			</div>
		";
	}

	public static function GetPatientIdOrCreate($request)
	{	
		$patient_id = 0;	
		$patient_name = trim($request->pt_name);
		if (!empty($patient_name)) {
			$patient = Patient::where('name', $patient_name)->first();

			if ($patient != null) {
				$patient_id = $patient->id;
			} else {
				$created_patient = Patient::create([
					'name' => $patient_name,
					'age' => $request->pt_age ?? '0',
					'gender' => (($request->pt_gender == 'ប្រុស' || strtolower(trim($request->pt_gender)) == 'male') ? '1' : '2'),
					'phone' => $request->pt_phone ?? '',
					'address_village' => $request->pt_village ?? '',
					'address_commune' => $request->pt_commune ?? '',
					'address_district_id' => $request->pt_district_id ?? '',
					'address_province_id' => $request->pt_province_id ?? '',
					'created_by' => Auth::user()->id,
					'updated_by' => Auth::user()->id,
				]);
				$patient_id = $created_patient->id;
			}
		}
		
		return $patient_id;		
	}
}

/*
	How to use : 
		use App\Repositories\Component\GlobalComponent as GComponent;
		GComponent::FooterComeBackText('សូមយកលទ្ធផលពិនិត្យឈាមនេះមកវិញពេលមកពិនិត្យលើក្រោយ')
		GComponent::DoctorSignature()
*/