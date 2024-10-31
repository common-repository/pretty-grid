<?php
/**
 * Pretty_Grid_Twitter_Job Class
 *
 * @since  1.0.0
 * @package Pretty Grid
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if ( ! class_exists( 'Pretty_Grid_Twitter_Job' ) ) :

    class Pretty_Grid_Twitter_Job{

        /**
         * API data
         *
         * @var array
         */
        public $api_data = array();

        /**
         * Pretty_Grid_Twitter_Job constructor.
         *
         * @since 1.0.0
         */
        public function __construct() {
        }

        /**
         * feed data
         *
         * @return array
         */
        public function feed_data($username) {

            $access_token = 'AAAAAAAAAAAAAAAAAAAAANgrEAEAAAAAF7Yl8VxqWEdEsDNhcPTGGwg02zE%3DNSX8gmNRalyagrWHuSrDJu0CITZPZqIqfKgYdhRahox6luhZVn';

            // start fetch tweets use http bearer authentication
            $header = array(
                'Authorization' => 'Bearer ' . $access_token
            );

            $user_data = $this->get_id_by_name($username);

            $url='https://api.twitter.com/2/users/'.$user_data->id.'/tweets?expansions=author_id,attachments.media_keys&media.fields=url,preview_image_url&max_results=100';


            // fetch url json data
            $return_data  = $this->fetch_stream( $url, $header );

            //var_dump($return_data);

            $result = json_decode($return_data);

            $tweets = array();
            foreach($result->data as $key => $value) {
                $tweets[$key]['text'] = $value->text;
                $tweets[$key]['id'] = $value->id;
                // Retrive image url
                $media_key = $value->attachments->media_keys[0];
                foreach($result->includes->media as $item) {
                    if($media_key == $item->media_key){
                        $tweets[$key]['image_url'] = $item->url;
                    }
                }

            }

            $final_data = array(
                'feeds' => $tweets,
                'user'   => $user_data
            );

            //var_dump($final_data);

            return $final_data;
        }

        /**
         * Get ID by user name
         *
         * @return int
         */
        public function get_id_by_name($username) {

            $access_token = 'AAAAAAAAAAAAAAAAAAAAANgrEAEAAAAAF7Yl8VxqWEdEsDNhcPTGGwg02zE%3DNSX8gmNRalyagrWHuSrDJu0CITZPZqIqfKgYdhRahox6luhZVn';

            // start fetch tweets use http bearer authentication
            $header = array(
                'Authorization' => 'Bearer ' . $access_token
            );

            $url='https://api.twitter.com/2/users/by/username/'.$username.'?user.fields=description,id,name,profile_image_url,url,username,verified';

            // fetch url json data
            $return_data  = $this->fetch_stream( $url, $header );

            $result = json_decode($return_data);

            return $result->data;

        }

        /**
        * Fetch stream bt HTTP GET Method
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

        /**
         * Fetch stream bt HTTP POST Method
         *
         * @param  string $url
         * @return string
         */
        public function fetch_post( $url, $headers = array(), $body = array()) {
            // build http request args
            $args = array(
                'headers' => $headers,
                'body'    => $body,
                'method'  => 'POST',
                'timeout' => 45,
            );

            $request = wp_remote_post( $url, $args );

            // retrieve the body from the raw response
            $json_posts = wp_remote_retrieve_body( $request );

            // log error messages
            if ( is_wp_error( $request ) ) {
                return $request;
            }

            if ( $request['response']['code'] != 200 ) {
                return false;
            }

            return $json_posts;
        }
    }

endif;
