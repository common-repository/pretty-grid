<?php
/**
 * Pretty_Grid_Vimeo_Job Class
 *
 * @since  1.0.0
 * @package Auto Robot
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Vimeo_Job' ) ) :

    class Pretty_Grid_Vimeo_Job{

        /**
         * Keyword
         *
         * @var string
         */
        public $keyword = '';

        /**
         * Pretty_Grid_Vimeo_Job constructor.
         *
         * @since 1.0.0
         */
        public function __construct($keyword) {
            $this->keyword = $keyword;
        }

        /**
        * fetch_data
        *
        * @return array
        */
        public function feed_data() {
            $access_token = 'bd48c5db4e2c184a8aac6ca3e67c47b6';

            $url = 'https://api.vimeo.com/videos?';

            $req_params = [
                'query' => urlencode($this->keyword),
                'page'  => 1,
                'per_page' => 50,
                'sort'  => 'relevant',
                'direction' => 'desc'
            ];

            $url .= http_build_query($req_params);

            // vimeo api need http bearer authentication
            $header = array(
                'Authorization' => 'Bearer ' . $access_token
            );

            // fetch url json data
            $return_data  = $this->fetch_stream( $url, $header );

            $result = json_decode($return_data, true);

            $data = $result['data'];

            $output = array_slice($data, 0, 20);

            $videos = array();
            foreach($output as $key => $value){
                $videos[$key]['title'] = $value['name'];
                $videos[$key]['created_time'] = $value['created_time'];
                $videos[$key]['link'] = $value['link'];
                $videos[$key]['embed'] = $value['embed']['html'];
                $videos[$key]['image'] = $value['pictures']['sizes'][1]['link'];
                $videos[$key]['picture'] = $value['pictures']['sizes'][1]['link_with_play_button'];
            }

            return $videos;
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
