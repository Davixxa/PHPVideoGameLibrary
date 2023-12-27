<?php

// app/Http/Controllers/Api/GameController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * @OA\Info(
 *      title="GamesX API",
 *      version="1.0.0",
 *      description="GamesX API for game information operation",
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
     * @OA\Schema(
     *      schema="Game",
     *      @OA\Property(property="id", type="integer"),
     *      @OA\Property(property="name", type="string"),
     *      @OA\Property(property="description", type="string"),
     *      @OA\Property(property="publishing_date", type="string", format="date"),
     *      @OA\Property(property="category", type="string"),
     * )
     * @OA\Schema(
     *       schema="Error",
     *       type="object",
     *       properties={
     *           @OA\Property(property="error", type="string", description="A brief description of the error"),
     *       },
     *  )
     *
     * @OA\Get(
     *       path="/api/games/{id}",
     *       operationId="getGameById",
     *       tags={"Games"},
     *       summary="Get a game by ID",
     *       description="Returns a single game by ID",
     *       @OA\Parameter(
     *           name="id",
     *           in="path",
     *           required=true,
     *           description="ID of the game",
     *           @OA\Schema(type="integer"),
     *       ),
     *       @OA\Response(
     *           response=200,
     *           description="Successful operation",
     *           @OA\JsonContent(
     *               type="object",
     *               ref="#/components/schemas/Game",
     *           ),
     *       ),
     *       @OA\Response(
     *           response=404,
     *           description="Game not found",
     *           @OA\JsonContent(
     *               type="object",
     *               ref="#/components/schemas/Error",
     *           ),
     *       ),
     *  )
     * @OA\Put(
     *       path="/api/games/{id}",
     *       operationId="updateGame",
     *       tags={"Games"},
     *       summary="Update an existing game",
     *       description="Updates an existing game",
     *       @OA\Parameter(
     *           name="id",
     *           in="path",
     *           required=true,
     *           description="ID of the game",
     *           @OA\Schema(type="integer"),
     *       ),
     *       @OA\RequestBody(
     *           required=true,
     *           @OA\JsonContent(
     *               ref="#/components/schemas/Game",
     *           ),
     *       ),
     *       @OA\Response(
     *           response=200,
     *           description="Game updated successfully",
     *           @OA\JsonContent(
     *               type="object",
     *               ref="#/components/schemas/Game",
     *           ),
     *       ),
     *       @OA\Response(
     *           response=404,
     *           description="Game not found",
     *           @OA\JsonContent(
     *               type="object",
     *               ref="#/components/schemas/Error",
     *           ),
     *       ),
     *  )
     * @OA\Post(
     *       path="/api/games",
     *       operationId="createGame",
     *       tags={"Games"},
     *       summary="Create a new game",
     *       description="Creates a new game",
     *       @OA\RequestBody(
     *           required=true,
     *           @OA\JsonContent(
     *               ref="#/components/schemas/Game",
     *           ),
     *       ),
     *       @OA\Response(
     *           response=201,
     *           description="Game created successfully",
     *           @OA\JsonContent(
     *               type="object",
     *               ref="#/components/schemas/Game",
     *           ),
     *       ),
     *  )
     * @OA\Delete(
     *       path="/api/games/{id}",
     *       operationId="deleteGame",
     *       tags={"Games"},
     *       summary="Delete a game by ID",
     *       description="Deletes a game by ID",
     *       @OA\Parameter(
     *           name="id",
     *           in="path",
     *           required=true,
     *           description="ID of the game",
     *           @OA\Schema(type="integer"),
     *       ),
     *      @OA\Response(
     *          response=204,
     *          description="Game deleted successfully",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Game not found",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="error",
     *                  type="string",
     *                  example="Game not found",
     *              ),
     *          ),
     *      ),
     * )
     */
    public function index()
    {
        $cacheKey = 'games_index';
        if (Cache::has($cacheKey)) {
            return response()->json(Cache::get($cacheKey));
        }
        $games = Game::all();
        Cache::put($cacheKey, $games, 600);

        return response()->json($games, 200);
    }


    public function show($id)
    {
        $cacheKey = "game_by_id_{$id}";
        if (Cache::has($cacheKey)) {
            return response()->json(Cache::get($cacheKey));
        }

        $game = Game::find($id);
        if (!$game) {
            return response()->json(['error' => 'Game not found'], 404);
        }

        Cache::put($cacheKey, $game, 600);

        return response()->json($game, 200);
    }


    public function store(Request $request)
    {
        Cache::forget('games_index');

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'publishing_date' => 'required|date',
            'category' => 'required|string',
        ]);

        $game = Game::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'publishing_date' => $request->input('publishing_date'),
            'category' => $request->input('category'),
        ]);

        return response()->json($game, 201);
    }

    public function update(Request $request, $id)
    {
        Cache::forget('games_index');

        $game = Game::find($id);

        if (!$game) {
            return response()->json(['error' => 'Game not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'publishing_date' => 'required|date',
            'category' => 'required|string',
        ]);

        $game->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'publishing_date' => $request->input('publishing_date'),
            'category' => $request->input('category'),
        ]);

        return response()->json($game, 200);
    }

    public function destroy($id)
    {
        Cache::forget('games_index');
        $game = Game::find($id);

        if (!$game) {
            return response()->json(['error' => 'Game not found'], 404);
        }

        $game->delete();

        return response()->json(null, 204);
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
}
