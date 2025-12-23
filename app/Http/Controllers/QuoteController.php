<?php

namespace App\Http\Controllers;

use App\Models\Quote;

class QuoteController extends Controller
{
    public function getAll()
    {
        $quotes = Quote::all();

        return response()->json($quotes, 200);
    }

    public function getById($id)
    {
        $quote = Quote::find($id);

        if (!$quote) {
            return response()->json(["error" => "Quote not found"], 404);
        }

        return response()->json($quote);
    }

    public function addOne()
    {
        $validated_request = request()->validate([
            "client_name" => "required|string",
            "car_plate" => "required|string",
            "insurer_name" => "required|string",
            "price" => "required|numeric"
        ]);

        $quote = Quote::create($validated_request);

        return response()->json($quote, 201);
    }

    public function deleteById($id)
    {
        $result = Quote::destroy($id);

        if ($result > 0) {
            return response()->json(["OK" => "Quote deleted successfully"], 200);
        }

        return response()->json(["error" => "Quote not found"], 404);
    }

    public function updateById($id)
    {
        $validated_request = request()->validate([
            "client_name" => "string",
            "car_plate" => "string",
            "insurer_name" => "string",
            "price" => "numeric"
        ]);

        $quote_to_update = Quote::find($id);

        if (!$quote_to_update) {
            return response()->json(["error" => "Quote not found"], 404);
        }

        $quote_to_update->update($validated_request);

        return response()->json($quote_to_update, 200);
    }
}
