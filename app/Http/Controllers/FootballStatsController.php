<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\GuzzleException; 
use Exception;

class FootballStatsController extends Controller
{
    /**
     * Fetching football data
     * populated / tranforming
     * include error checking
     */
    public function getFootballData()
    {
        $client = new Client();
        $footBallApiKey = config('api.football_api_key');
        $footBallApiUrl = config('api.football_api_url');
        if ($getCompetition = true) {
            $footBallApiUrl = $this->getFootBallCompetitions($footBallApiUrl);
        }
        $apiOption = [
            'headers' => [
                'x-Auth-Token' => $footBallApiKey,
            ]
        ];

        try {
            $response = $client->request('GET', $footBallApiUrl, $apiOption);
            $result = json_decode($response->getBody()->getContents(), true);

        } catch (GuzzleException $e) {
            //internal logginig query/functionality here Log::Error("issue error type")
            return response()->json(['error'=> 'API Request failed'], 404);
            
        }

        //add to the view / fontend / tranform the data further
        return view('football-stats', ['competitions' => $result['competitions']]);
    }

    /**
     * get competitions by appending to the end of the url
     * https://api.football-data.org/v4/competitions
     */
    public function getFootBallCompetitions($data)
    {
        return sprintf('%scompetitions', $data);
    }

     /**
     * get teams by appending to the end of the url
     * https://api.football-data.org/v4/teams
     */
    public function getFootballTeams($data)
    {
        return sprintf('%steams', $data);
    }

     /**
     * get matches by appending to the end of the url
     * https://api.football-data.org/v4/matches
     */
    public function getFootballMatches($data)
    {
        return sprintf('%smatches', $data);
    }
}
