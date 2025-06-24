<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Http\Client;
use Cake\Core\Configure;

/**
 * Tmdb Controller
 *
 */
class TmdbController extends AppController
{
    public function index()
    {
        $results = [];
        // ?q=Tom
        $q = $this->request->getQuery('q');
        // check for query
        if($q){
            $query = trim($q);
            // $apiKey = Configure::read('tmdb.api_key');
            $apiKey = '439145a999940d0a57f54e223d0ab80a';
            if(!apiKey){
                // check for api key
                $this->Flash->error('TMDB API Key error');
            }else{
                // http client
                $http = new Client(['timeout'=>10]);
                try{
                    // GET request Http
                    $response = $http->get(
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
        $this->set(compact('results', 'q'));
    }
    
}
