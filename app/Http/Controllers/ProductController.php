<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;  // Usar el modelo Product

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los productos y ordenar por categoría y nombre
        $products = Product::select('codigo', 'nombre', 'descripcion', 'categoria', 'precio', 'stock')
            ->orderBy('categoria')
            ->orderBy('nombre')
            ->get();
        
        return response()->json(['status' => 'success', 'data' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Crear un nuevo producto
            $product = Product::create($request->all());

            return response()->json([
                'status' => 'success', 
                'message' => 'Producto creado exitosamente', 
                'data' => $product
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $codigo)
    {
        try {
            // Buscar un producto por su código (clave primaria)
            $product = Product::where('codigo', $codigo)->firstOrFail();

            return response()->json([
                'status' => 'success', 
                'data' => $product
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Producto no encontrado']);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $codigo)
    {
        try {
            // Buscar el producto por el campo 'codigo'
            $product = Product::where('codigo', $codigo)->firstOrFail();
    
            // Actualizar el producto con todos los datos recibidos
            $product->update($request->all());
    
            return response()->json([
                'status' => 'success', 
                'message' => 'Producto actualizado exitosamente', 
                'data' => $product
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error', 
                'message' => 'Producto no encontrado'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error', 
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $codigo)
    {
        try {
            // Buscar el producto por el campo 'codigo'
            $product = Product::where('codigo', $codigo)->firstOrFail();
    
            // Eliminar el producto
            $product->delete();
    
            return response()->json([
                'status' => 'success', 
                'message' => 'Producto eliminado exitosamente'
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error', 
                'message' => 'Producto no encontrado'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error', 
                'message' => $e->getMessage()
            ]);
        }
    }
}
