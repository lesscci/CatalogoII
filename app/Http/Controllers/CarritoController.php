<?php
namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $unidades = $request->input('unidades');

        $apiUrl = 'https://quirky-mahavira.217-76-154-49.plesk.page/api/carts/add';
        $client = new Client([
            'verify' => false, // Deshabilitar la verificación del certificado SSL
        ]);

        try {
            $response = $client->post($apiUrl, [
                'json' => [
                    'product_id' => $productId,
                    'unidades' => $unidades,
                ],
            ]);

            if ($response->getStatusCode() === 200) {
                $responseData = json_decode($response->getBody(), true);
                $message = $responseData['message'];
                return response()->json(['message' => $message], 200);
            } else {
                return response()->json(['message' => 'Error adding product to cart'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error adding product to cart: ' . $e->getMessage()], 500);
        }
    }
}
