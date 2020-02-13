<?php

namespace App\Http\Controllers;

use App\Surebet;
use App\Bookie;
use App\Country;
use App\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Sport;

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

        $sport = $request->sport;
        $country = $request->country;
        $league = $request->league;
        echo " DEporte: " . $sport;
        echo "Pais: " . $country;
        echo "Liga: " . $league;
        $sportId = 0;
        $countryId = 0;
        $leagueId = 0;
        $sportCount = Sport::where('name', $sport)->count();
        echo "<br> --------------------------------------------";
        echo "COUNT SPORT " . $sportCount;
        if ($sportCount == 0) {
            $sportCreate = new Sport();
            $sportCreate->name = $sport;
            $sportCreate->save();
            $a = Sport::where('name', $sport)->first();
            $sportId = $a->id;
        } else {
            $a = Sport::where('name', $sport)->first();
            $sportId = $a->id;
        }

        $countryCount = Country::where('name', $country)->count();
        if ($countryCount == 0) {
            $countryCreate = new Country();
            $countryCreate->name = $country;
            $countryCreate->save();
            $a = Country::where('name', $country)->first();
            $countryId = $a->id;
        } else {
            $a = Country::where('name', $country)->first();
            $countryId = $a->id;
        }

        $leagueCount = League::where('name', $league)->where('country_id', $countryId)->where('sport_id', $sportId)->count();

        echo "LIGA COUNT------------------------" . $leagueCount;
        if ($leagueCount == 0) {
            $leagueCreate = new League();
            $leagueCreate->name = $league;
            $leagueCreate->sport_id = $sportId;
            $leagueCreate->country_id = $countryId;
            $leagueCreate->save();
            $a = League::where('name', $league)->where('country_id', $countryId)->where('sport_id', $sportId)->first();
            $leagueId = $a->id;
        } else {
            $a = League::where('name', $league)->where('country_id', $countryId)->where('sport_id', $sportId)->first();


            $leagueId = $a->id;
        }





        if ($request->sport == "futbol") {
            $select = Surebet::where('match', $request->match)->where('sport_id', $sportId)->where('country_id', $countryId)->where('league_id', $leagueId)->where('team1', $request->team1)->where('team2', $request->team2)->count();
            if ($select == 0) {
                $bookie1 = Bookie::where('name', $request->bookie1)->first();
                $bookie2 = Bookie::where('name', $request->bookie2)->first();
                $bookie3 = Bookie::where('name', $request->bookie3)->first();
                $surebet = new Surebet();
                $surebet->date = $request->date;
                $surebet->country_id = $countryId;
                $surebet->sport_id = $sportId;
                $surebet->league_id = $leagueId;
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
            } else {
                $surebet = Surebet::where('match', $request->match)->where('sport_id', $sportId)->where('country_id', $countryId)->where('league_id', $leagueId)->where('team1', $request->team1)->where('team2', $request->team2)->first();
                if ($request->odd1 != $surebet->odd1 || $request->odd2 != $surebet->odd2 || $request->odd3 != $surebet->odd3) {
                    $bookie1 = Bookie::where('name', $request->bookie1)->first();
                    $bookie2 = Bookie::where('name', $request->bookie2)->first();
                    $bookie3 = Bookie::where('name', $request->bookie3)->first();
                    $surebet->odd1 = $request->odd1;
                    $surebet->odd2 = $request->odd2;
                    $surebet->odd3 = $request->odd3;
                    $surebet->bookie1_id = $bookie1->id;
                    $surebet->bookie2_id = $bookie2->id;
                    $surebet->bookie3_id = $bookie3->id;
                    $surebet->save();
                }
            }
        } else {
            $select = Surebet::where('match', $request->match)->where('sport_id', $sportId)->where('country_id', $countryId)->where('league_id', $leagueId)->where('team1', $request->team1)->where('team2', $request->team2)->count();
            if ($select == 0) {
                $bookie1 = Bookie::where('name', $request->bookie1)->first();
                $bookie2 = Bookie::where('name', $request->bookie2)->first();

                $surebet = new Surebet();
                $surebet->date = $request->date;
                $surebet->country_id = $countryId;
                $surebet->sport_id = $sportId;
                $surebet->league_id = $leagueId;
                $surebet->match = $request->match;
                $surebet->team1 = $request->team1;
                $surebet->team2 = $request->team2;
                $surebet->odd1 = $request->odd1;
                $surebet->odd2 = $request->odd2;


                $surebet->bookie1_id = $bookie1->id;
                $surebet->bookie2_id = $bookie2->id;

                $surebet->percentage = $request->percentage;
                $surebet->save();
            }else{
                $surebet = Surebet::where('match', $request->match)->where('sport_id', $sportId)->where('country_id', $countryId)->where('league_id', $leagueId)->where('team1', $request->team1)->where('team2', $request->team2)->first();
                if ($request->odd1 != $surebet->odd1 || $request->odd2 != $surebet->odd2) {
                    $bookie1 = Bookie::where('name', $request->bookie1)->first();
                    $bookie2 = Bookie::where('name', $request->bookie2)->first();
                    $surebet->odd1 = $request->odd1;
                    $surebet->odd2 = $request->odd2;
                    $surebet->bookie1_id = $bookie1->id;
                    $surebet->bookie2_id = $bookie2->id;
                    $surebet->save();
                }
            }
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
        $bookie = Bookie::where('name', $surebets_id)->get();
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
