<?php

namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // search function start here
    public function search(Request $request)
    {
        $data = $request->get('name');
        $output = '';

        // Check if the search query is not empty
        if (!empty($data)) {
            $val = Country::where('country_name', 'like', '%'. $data.'%')->get();

            if (count($val) > 0) {
                // Generate a list of matching countries as HTML list items
                $output = '<ul class="list-group">';
                foreach ($val as $row) {
                    $output .= '<li class="list-group-item" style="width: 20%; " value="'.$row->id.'">' . $row->country_name . '</li>';
                }
                $output .= '</ul>';
            } else {
                // Display a message when no matching data is found
                $output = '<ul><li class="list-group-item" style="width: 20%;">Data Not Found</li></ul>';
            }
        } else {
            $output = '<ul></ul>';
        }
        return $output;
    }
}
