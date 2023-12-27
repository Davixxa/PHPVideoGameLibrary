<?php

// app/Http/Controllers/Api/GameController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *      title="Your API Title",
 *      version="1.0.0",
 *      description="Your API description",
 * )
 */
class GameController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/games",
     *      operationId="getGamesList",
     *      tags={"Games"},
     *      summary="Get list of games",
     *      description="Returns list of games",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Game"),
     *      ),
     * )
     */
    public function index()
    {
        $games = Game::all();
        return response()->json($games, Response::HTTP_OK);
    }

    /**
     * @OA\Schema(
     *      schema="Game",
     *      @OA\Property(property="id", type="integer"),
     *      @OA\Property(property="name", type="string"),
     *      @OA\Property(property="description", type="string"),
     *      @OA\Property(property="publishing_date", type="string", format="date"),
     *      @OA\Property(property="category", type="string"),
     * )
     */
    public function show($id)
    {
        $game = Game::find($id);

        if (!$game) {
            return response()->json(['error' => 'Game not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($game, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'publishing_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        $game = Game::create($request->all());

        return response()->json($game, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $game = Game::find($id);

        if (!$game) {
            return response()->json(['error' => 'Game not found'], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'publishing_date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ]);

        $game->update($request->all());

        return response()->json($game, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $game = Game::find($id);

        if (!$game) {
            return response()->json(['error' => 'Game not found'], Response::HTTP_NOT_FOUND);
        }

        $game->delete();

        return response()->json(['message' => 'Game deleted successfully'], Response::HTTP_OK);
    }
}
