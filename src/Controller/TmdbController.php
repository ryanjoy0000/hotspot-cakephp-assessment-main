<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Client;

/**
 * Tmdb Controller
 *
 */
class TmdbController extends AppController
{
    public function search()
    {
        $results = [];
        // ?q=Tom
        $query = trim($this->request->getQuery('q'));
        // check for query
        if($query){
            // get api key
            $apiKey = env('TMDB_API_KEY');
            if(!apiKey){
                // check for api key
                $this->Flash->error('TMDB API Key error');
            }else{
                // http client
                $http = new Client(['timeout'=>10]);
                try{
                    // GET request Http
                    $http->get(
                        'https://api/themoviedb.org/3/search/person',
                        [
                            'api_key' => $apiKey,
                            'query' => $query
                        ]
                    );
                    // check if response is OK
                    if($response->isOk()){
                        $json = $response->getJson();
                        $results = $json['results'] ?? [];
                    }else{
                        // error
                        $this->Flash->error('TMDb API error', $response->getStatusCode());
                    }
                } catch(\Exception $e){
                    $this->Flash->error('Network error', h($e->getMessage()));
                }
            }
        }
        $this->set(compact('results', 'query'));
    }
    
}
