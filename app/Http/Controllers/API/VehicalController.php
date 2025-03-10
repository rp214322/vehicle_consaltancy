<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Vehical;
use Illuminate\Http\Request;

class VehicalController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 items per page
        $vehicals = Vehical::with(['brand', 'vehical_model', 'category', 'gallery'])
            ->orderBy('created_at', 'desc') // Order by latest first
            ->paginate($perPage);

        $response = $vehicals->map(function ($vehical) {
            return $this->formatVehicalResponse($vehical);
        });

        return response()->json([
            'success' => true,
            'data' => $response,
            'pagination' => [
                'current_page' => $vehicals->currentPage(),
                'total_pages' => $vehicals->lastPage(),
                'per_page' => $vehicals->perPage(),
                'total_items' => $vehicals->total(),
                'next_page_url' => $vehicals->nextPageUrl(),
                'prev_page_url' => $vehicals->previousPageUrl()
            ]
        ]);
    }

    /**
     * Get a specific vehicle with brand, model, category, and gallery.
     */
    public function show($identifier)
    {
        $vehical = Vehical::with(['brand', 'vehical_model', 'category', 'gallery'])
            ->where('id', $identifier) // Check by ID
            ->orWhere('slug', $identifier) // Check by Slug
            ->first();

        if (!$vehical) {
            return response()->json(['error' => 'Vehicle not found'], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $this->formatVehicalResponse($vehical)
        ]);
    }

    /**
     * Format the vehicle response.
     */
    private function formatVehicalResponse($vehical)
    {
        return [
            'id' => $vehical->id,
            'slug' => $vehical->slug,
            'title' => $vehical->title,
            'year' => $vehical->year,
            'fuel' => $vehical->fuel,
            'color' => $vehical->color,
            'price' => $vehical->price,
            'description' => $vehical->description,
            'status' => $vehical->status,
            'brand' => [
                'id' => $vehical->brand->id ?? null,
                'name' => $vehical->brand->name ?? null,
            ],
            'model' => [
                'id' => $vehical->vehical_model->id ?? null,
                'name' => $vehical->vehical_model->name ?? null,
            ],
            'category' => [
                'id' => $vehical->category->id ?? null,
                'name' => $vehical->category->name ?? null,
            ],
            'gallery' => $vehical->gallery->map(function ($image) {
                return [
                    'url' => asset('storage/' . $image->file), // Generates full URL
                    'is_featured' => $image->is_featured, // Include featured status
                ];
            })
        ];
    }
}
