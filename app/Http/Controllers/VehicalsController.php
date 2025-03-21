<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\VehicalModel;
use Illuminate\Http\Request;
use App\Models\Vehical;
use App\Models\Inquiry;
use App\Models\FavouriteVehical;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VehicalsController extends Controller
{
    /**
     * Vehical List page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $perPage = $request->get('per_page', 9);
        $sortBy = $request->get('sort_by', 'desc');

        $query = Vehical::query();

        // Convert category slug to ID
        if ($request->has('category') && $request->category) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Convert brand slug to ID
        if ($request->has('brand') && $request->brand) {
            $brand = Brand::where('slug', $request->brand)->first();
            if ($brand) {
                $query->where('brand_id', $brand->id);
            }
        }

        // Convert model slug to ID
        if ($request->has('model') && $request->model) {
            $model = VehicalModel::where('slug', $request->model)->first();
            if ($model) {
                $query->where('model_id', $model->id);
            }
        }

        // Filter by year
        if ($request->has('year') && $request->year) {
            $query->where('year', $request->year);
        }

        // Filter by Fuel
        if ($request->has('fuel') && $request->fuel) {
            $query->where('fuel', $request->fuel);
        }

        // Filter by price range
        if ($request->has('price') && $request->price) {
            // Extract numerical values from price range
            preg_match_all('/\d+/', str_replace("₹", "", $request->price), $matches);
            $prices = $matches[0];

            if (count($prices) == 2) {
                $query->whereBetween('price', [$prices[0], $prices[1]]);
            }
        }

        // Get paginated results
        $vehicals = $query->orderBy('price', $sortBy)->paginate($perPage);

        // Fetch favorite vehicles if the user is logged in
        $favourite_vehicals = Auth::check() ? Auth::user()->favourite_vehicals()->pluck('vehical_id')->toArray() : [];

        return view('vehicals.index', compact('request', 'vehicals', 'favourite_vehicals'));
    }

    /**
     * Vehical Details page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Request $request, $slug)
    {
        $vehical = Vehical::where('slug', $slug)->latest()->first();
        return view('vehicals.show', compact('request', 'vehical'));
    }
    public function FavouriteVehical($id)
    {
        try {
            $fav_vehical = FavouriteVehical::where('user_id', Auth::user()->id)->where('vehical_id', $id)->first();
            if ($fav_vehical) {
                $fav_vehical->delete();
                return response()->json(['success', 'Vehical removed from favourite list.'], 200);
            } else {
                $fav_vehical = new FavouriteVehical;
                $fav_vehical->user_id = Auth::user()->id;
                $fav_vehical->vehical_id = $id;
                $fav_vehical->save();
                return response()->json(['success', 'Vehical added from favourite list.'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['error', $e->getMessage()], 500);
        }
    }
}
