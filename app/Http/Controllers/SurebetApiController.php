<?php

namespace App\Http\Controllers;

use App\Surebet;
use App\Bookie;
use Illuminate\Http\Request;

class SurebetApiController extends Controller
{
    /**
     * @OA\Info(title="API Usuarios", version="1.0")
     *
     * @OA\Server(url="http://127.0.0.1:8000/")
     */
     /**
     * /**
     * @OA\Get(
     *     path="/api/surebet",
     *     summary="Index surebets",
     *     @OA\Response(
     *         response=200,
     *         description="Index surebets"
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Error Ocurred"
     *     )
     * )
     * 
     * @OA\Get(
     *     path="/api/surebet/{surebet_id}",
    
     *     summary="Mostrar Surebet",
   
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     ),
     *    @OA\Parameter(
     *          name="surebet_id",
     *          in="path",
     *         required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),   
     *      @OA\Response(
     *          response=200,
     *          description="Success"
     *      ),
     * )
     *
     * @OA\Post(
     *     path="/api/surebet",
     *     summary="Insert Surebet",
     *     @OA\Response(
     *         response=200,
     *         description="Insert Surebet."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Error Ocurred"
     *     ),
     *    @OA\Parameter(
     *          name="date",
     *          in="query",
     *         required=true,
     *          @OA\Schema(
     *              type="date"
     *          )
     *      ),  
     *    @OA\Parameter(
     *          name="match",
     *          in="query",
     *         required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ), 
     *    @OA\Parameter(
     *          name="team1",
     *          in="query",
     *         required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ), 
     *    @OA\Parameter(
     *          name="team2",
     *          in="query",
     *         required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ), 
     *    @OA\Parameter(
     *          name="odd1",
     *          in="query",
     *         required=true,
     *          @OA\Schema(
     *              type="float"
     *          )
     *      ),    
     *    @OA\Parameter(
     *          name="odd2",
     *          in="query",
     *         required=true,
     *          @OA\Schema(
     *              type="float"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="odd2",
     *          in="query",
     *         required=true,
     *          @OA\Schema(
     *              type="float"
     *          )
     *      ), 
     *      @OA\Parameter(
     *          name="odd3",
     *          in="query",
     *         required=true,
     *          @OA\Schema(
     *              type="float"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="bookie1",
     *          in="query",
     *         required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),         
     *    @OA\Parameter(
     *          name="bookie2",
     *          in="query",
     *         required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),  
     *     @OA\Parameter(
     *          name="bookie3",
     *          in="query",
     *         required=true,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ), 
     *     @OA\Parameter(
     *          name="percentage",
     *          in="query",
     *         required=true,
     *          @OA\Schema(
     *              type="float"
     *          )
     *      ),                                                            
     * )
     */



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surebets = Surebet::all();
        return $surebets;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $select = Surebet::where('match', $request->match)->count();
        if ($select == 0) {
            $bookie1=Bookie::where('name',$request->bookie1)->first();
            $bookie2=Bookie::where('name',$request->bookie2)->first();
            $bookie3=Bookie::where('name',$request->bookie3)->first();
            $surebet = new Surebet();
            $surebet->date = $request->date;
            $surebet->match = $request->match;
            $surebet->team1 = $request->team1;
            $surebet->team2 = $request->team2;
            $surebet->odd1 = $request->odd1;
            $surebet->odd2 = $request->odd2;
            $surebet->odd3 = $request->odd3;
            $surebet->bookie1_id = $bookie1->id;
            $surebet->bookie2_id = $bookie2->id;
            $surebet->bookie3_id = $bookie3->id;
            $surebet->percentage = $request->percentage;
            $surebet->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($surebets_id)
    {
        $bookie=Bookie::where('name',$surebets_id)->get();
        return $bookie;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
