<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssetStepTwoRequest extends FormRequest
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


        $rules = [];
        //$rules['plot_length'] = 'sometimes|required';
        // Size/Area
        if (in_array($this->template_id, config('template.sections.size'))) {
            $rules['size.plot_length'] = 'sometimes|numeric|nullable';
            $rules['size.plot_breadth'] = 'sometimes|numeric|nullable';
            $rules['size.area_type'] = 'sometimes|required|in:carpet,builtup,super_builtup';
            $rules['size.area'] = 'sometimes|required|numeric';
            $rules['size.unit'] = 'sometimes|required';
            $rules['size.loft_area'] = 'numeric|nullable';
            $rules['size.loft_area_type'] = 'in:carpet,builtup,super_builtup|nullable';
            $rules['size.loft_unit'] = 'sometimes|nullable';
            $rules['size.terrace_unit'] = 'nullable';
            $rules['size.no_of_pillars'] = 'numeric|nullable';

            $rules['size.basement_construction'] = 'nullable';
            $rules['size.basement_construction_area'] = 'numeric|nullable';
            $rules['size.basement_area_type'] = 'in:carpet,builtup,super_builtup|nullable';
            $rules['size.basement_unit'] = 'nullable';

            // $rules['building.no_of_floors_in_building'] = 'sometimes|digits_between:1,5|nullable';
        }

        if (in_array($this->template_id, config('template.sections.building'))) {

           $rules['building.building_completion_year'] = 'sometimes|numeric|nullable';
           $rules['building.no_of_floors_in_building'] = 'sometimes|digits_between:1,5|nullable';
           $rules['building.residual_life_of_building'] = 'sometimes|numeric|nullable';
        }



        // Configuration
        if (in_array($this->template_id, config('template.sections.configuration'))) {
            $rules['configuration.configuration'] = 'sometimes|required';
            $rules['configuration.no_of_servant_rooms'] = 'digits_between:0,4|nullable';
            $rules['configuration.no_of_servant_toilets'] = 'digits_between:0,4|nullable';
            $rules['configuration.no_of_terraces'] = 'digits_between:0,8|nullable';

            $rules['configuration.no_of_toilets'] = 'sometimes|digits_between:1,8|nullable';

            $rules['configuration.no_of_floor_in_unit'] = 'sometimes|digits_between:1,100|nullable';

            $rules['no_of_cabins'] = 'sometimes|numeric|nullable';
            $rules['no_of_conference_rooms'] = 'sometimes|numeric|nullable';
            $rules['no_of_seats'] = 'sometimes|numeric|nullable';
            $rules['other_rooms'] = 'sometimes|numeric|nullable';

            $rules['no_of_rooms'] = 'sometimes|numeric|nullable';
        }




        if (in_array($this->template_id, config('template.sections.vehicle'))) {

            $rules['vehicle.vehicle_location'] = 'sometimes|required';
            $rules['vehicle.rto_regn_no'] = 'sometimes|required';
            $rules['vehicle.rto_region'] = 'sometimes|required';
            $rules['vehicle.vehicle_type'] = 'sometimes|required';
            $rules['vehicle.manufacturer'] = 'sometimes|required';
            $rules['vehicle.model'] = 'sometimes|required';
            $rules['vehicle.seating_capacity'] = 'numeric|nullable';
            $rules['vehicle.spare_tyres'] = 'numeric|nullable';
            $rules['vehicle.displacement'] = 'numeric|nullable';
            $rules['vehicle.horsepower'] = 'numeric|nullable';
            $rules['vehicle.lifting_capacity'] = 'numeric|nullable';
            $rules['vehicle.odo_meter_reading'] = 'numeric|nullable';
            $rules['vehicle.residual_life'] = 'sometimes|nullable|numeric';
            $rules['vehicle.month_year_mfg'] = 'sometimes|nullable|numeric|digits:2|between:1,12';
            $rules['vehicle.year_mfg'] = 'sometimes|nullable|numeric|digits:4|min:1900|max:2099';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'vehicle.vehicle_location.required' => 'Location of vehicle is required',
            'vehicle.rto_regn_no.required' => 'Rto region no. is required',
            'vehicle.rto_region.required' => 'Rto region is required',
            'vehicle.vehicle_type.required' => 'Type of vehicle is required',
            'vehicle.manufacturer.required' => 'Manufacturer is required',
            'vehicle.model.required' => 'Model is required',
            'vehicle.seating_capacity.numeric' => 'Seating capacity should be numeric',
            'vehicle.spare_tyres.numeric' => 'Spare tyres should be numeric',
            'vehicle.displacement.numeric' => 'Displacement should be numeric',
            'vehicle.horsepower.numeric' => 'Horsepower should be numeric',
            'vehicle.lifting_capacity.numeric' => 'Lifting capacity should be numeric',
            'vehicle.odo_meter_reading.numeric' => 'Odo meter reading should be numeric',
            'vehicle.residual_life.numeric' => 'Residual life should be numeric',
            'size.area_type.required' => 'Size of Area type is required',
            'size.unit.required' => 'Unit size is required',
            'configuration.no_of_servant_rooms.digits_between' => 'No. of servants rooms are invalid',
            'configuration.no_of_servant_toilets.digits_between' => 'No. of servant toilets are invalid',
            'configuration.no_of_terraces.digits_between' => 'No. of terraces are invalid',
            'configuration.no_of_toilets.digits_between' => 'No. of toilets are invalid',
            'configuration.no_of_floor_in_unit.digits_between' => 'No. of floors in the unit are invalid',
            'building.building_completion_year.numeric' => 'Year should be numeric',
            'size.plot_length.numeric' => 'Length of plot should be numeric',
            'size.plot_breadth.numeric' => 'Breadth of plot should be numeric',
            'size.loft_area.numeric' => 'Loft Area should be numeric',
            'size.no_of_pillars.numeric' => 'No. of pillars should be numeric',
            'size.basement_construction_area' => 'Basement Construction Area should be numeric',
            'building.no_of_floors_in_building.digits_between' => 'No. of floors are invalid',
            'required_if' => 'The :attribute field is required',
            'required_unless' => 'The :attribute field is required',
        ];
    }
}
