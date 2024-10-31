<?php
/**
 * Pretty_Grid_Youtube_Job Class
 *
 * @since  1.0.0
 * @package Pretty Grid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Youtube_Job' ) ) :

    class Pretty_Grid_Youtube_Job{

        /**
         * API data
         *
         * @var array
         */
        public $api_data = array();

        /**
         * Pretty_Grid_Job constructor.
         *
         * @since 1.0.0
         */
        public function __construct() {
            $this->api_data = array(
                'api_key' => 'AIzaSyCz3fWIrDcWRvghZ2wCOini5-mr-GsyqT0',
            );
        }

        /**
        * Feed data
        *
        * @return array
        */
        public function feed_data($type, $source) {

            // Start fetch data from youtube api
            $api_key = $this->api_data['api_key'];
            $limit = 20;

            switch ( $type ) {
                    case 'playlist':
                        $url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&type=video&';
                        $req_params = [
                            'key'  => $api_key,
                            'playlistId' => $source,
                            'maxResults' => $limit,
                        ];
                        break;
                    case 'channel':
                        $url = 'https://www.googleapis.com/youtube/v3/channels?part=contentDetails,snippet&';
                        $req_params = [
                            'id' => $source,
                            'key' => $api_key,
                        ];
                        $url .= http_build_query($req_params);
                        // Get playlist ID by channel
                        $return_data  = $this->fetch_stream( $url );
                        $video_list = json_decode($return_data);
                        $playlistId = $video_list->items[0]->contentDetails->relatedPlaylists->uploads;

                        $url = 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&type=video&';
                        $req_params = [
                            'key'  => $api_key,
                            'playlistId' => $playlistId,
                            'maxResults' => $limit,
                        ];
                        break;
                    default:
                        break;
            }

            $url .= http_build_query($req_params);

            // fetch url json data
            $return_data  = $this->fetch_stream( $url );

            // Check if return data is an empty array
            if(empty($return_data)){
                return null;
            }

            $result = json_decode($return_data);

            // Final search results
            $search_results = array();

            foreach($result->items as $key => $video){
                if($type === 'playlist' || $type === 'channel'){
                    $videoKey = $video->snippet->resourceId->videoId;
                }else{
                    $videoKey = $video->id->videoId;
                }

                $search_results[$key]['title'] = $video->snippet->title;
                $search_results[$key]['url'] = 'https://www.youtube.com/watch?v='.$videoKey;
                $search_results[$key]['description'] = substr($video->snippet->description, 0, 40) . '...';
                $search_results[$key]['date'] = $video->snippet->publishedAt;
                $search_results[$key]['embed'] = '<iframe width="360" height="250" src="//www.youtube.com/embed/'.$videoKey.'" frameborder="0" allowfullscreen></iframe>';

                if(isset($video->snippet->thumbnails->medium)){
                    $search_results[$key]['image'] = $video->snippet->thumbnails->medium->url;
                }

                $search_results[$key]['duration'] = $this->getSingleVideoDuration($videoKey);
                $statistics = $this->getSingleVideoStatistics($videoKey);

                $search_results[$key]['comments'] = $statistics->commentCount;
                $search_results[$key]['views'] = $statistics->viewCount;
                $search_results[$key]['likes'] = $statistics->likeCount;
                $search_results[$key]['dislikes'] = $statistics->dislikeCount;
                $search_results[$key]['favorites'] = $statistics->favoriteCount;
            }

            return $search_results;
        }

        /**
         * Get single video duration
         *
         * @return string
         */
        private function getSingleVideoDuration($id) {

            $api_data = $this->api_data;
            $api_key = $api_data['api_key'];

            $url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet,contentDetails&';

            $req_params = [
                'id' => $id,
                'key' => $api_key,
            ];

            $url .= http_build_query($req_params);

            // fetch url json data
            $return_data  = $this->fetch_stream( $url );

            $result = json_decode($return_data);

            return $result->items[0]->contentDetails->duration;
        }

        private function getSingleVideoStatistics($id) {

            $api_data = $this->api_data;
            $api_key = $api_data['api_key'];

            $url = 'https://www.googleapis.com/youtube/v3/videos?part=statistics&';

            $req_params = [
                'id' => $id,
                'key' => $api_key
            ];

            $url .= http_build_query($req_params);

            // fetch url json data
            $return_data  = $this->fetch_stream( $url );
            $result = json_decode($return_data);
            return $result->items[0]->statistics;
        }

        /**
        * Fetch stream HTTP GET Method
        *
        * @param  string $url
        * @return string
        */
        public function fetch_stream( $url, $headers = array()) {
            // build http request args
            $args = array(
                'headers' => $headers,
                'timeout'     => '20'
            );

            $request = wp_remote_get( $url, $args );

            // return an empty array when error happen on remote get
            $empty_response = array();
            // retrieve the body from the raw response
            $json_posts = wp_remote_retrieve_body( $request );



            // log error messages
            if ( is_wp_error( $request ) ) {
                return $empty_response;
            }

            if ( $request['response']['code'] != 200 ) {
                return $empty_response;
            }

            return $json_posts;
          }

    }

endif;
