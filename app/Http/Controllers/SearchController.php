<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $data = $request->get('name');
        $output = '';

        if (!empty($data)) {
            $val = Country::where('country_name', 'like', $data.'%')->get();

            if (count($val) > 0) {
                $output = '<ul class="list-group">';
                foreach ($val as $row) {
                    $output .= '<li class="list-group-item" style="width: 20%;">' . $row->country_name . '</li>';
                }
                $output .= '</ul>';
            } else {
                $output = '<ul><li class="list-group-item" style="width: 20%;>Data Not Found</li></ul>';
            }
        } else {
            $output = '<ul></ul>';
        }

        return $output;
    }
}
