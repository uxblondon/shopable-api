<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Requests\StoreProductVariantRequest;
use App\Http\Requests\UpdateProductVariantRequest;

class ProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductVariantRequest $request, $product_id)
    {
        try {
            $product_variant_data = array(
                'product_id' => $product_id,
                'sku' => $request->get('sku'),
                'price' => $request->get('price'),
                'weight' => $request->get('weight'),
                'dimensions' => $request->get('dimensions'),
                'shipping_cost' => $request->get('shipping_cost'),
                'variant_1_id' => $request->get('variant_1_id'),
                'variant_1_value' => $request->get('variant_1_value'),
                'variant_2_id' => $request->get('variant_2_id'),
                'variant_2_value' => $request->get('variant_2_value'),
                'variant_3_id' => $request->get('variant_3_id'),
                'variant_3_value' => $request->get('variant_3_value'),
                'created_by' => auth()->user()->id,
            );
    
            $product_variant = ProductVariant::create($product_variant_data);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'e' => $e->getMessage(), 'message' => 'Failed to add product variant.']);
        }
        
        return response()->json(['status' => 'success', 'message' => 'Product variant successfully added.', 'data' => $product_variant]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductVariantRequest $request, $product_id, $variant_id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id, $variant_id)
    {
        //
    }
}
