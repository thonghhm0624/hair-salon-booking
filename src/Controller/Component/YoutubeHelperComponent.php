<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Network\Http\Client;

/**
 * YoutubeHelper component
 */
class YoutubeHelperComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
	const URL_FETCHDATA     = 'http://www.youtube.com/get_video_info?&video_id=[video_id]&asv=3&el=detailpage&hl=nl_BE';
	const URL_GOOGLEAPI		= 'https://www.googleapis.com/youtube/v3/videos?key=[api_key]&part=snippet&id=[video_id]';
	public function initialize(array $config)
    {
        $this->config = empty($config) ? $this->_defaultConfig :$config;
    }
	public function get_video_urls($video_id)
    {
		$url_video_info = self::URL_FETCHDATA;
		$url_video_info = str_replace('[video_id]',$video_id,$url_video_info);
	   
		$http = new Client();
		$response = $http->get($url_video_info);
		if($response->isOk())
		{
			$my_video_info = $response->body();
			parse_str($my_video_info);
			$avail_formats = [];
			
			if(isset($url_encoded_fmt_stream_map)) {
				/* Now get the url_encoded_fmt_stream_map, and explode on comma */
				$my_formats_array = explode(',',$url_encoded_fmt_stream_map);
			} else {
				echo '<p>No encoded format stream found.</p>';
				echo '<p>Here is what we got from YouTube:</p>';
				echo $my_video_info;
			}
			if (count($my_formats_array) == 0) {
				echo '<p>No format stream map found - was the video id correct?</p>';
				exit;
			}
			
			
			$i = 0;
			$ipbits = $ip = $itag = $sig = $quality = '';
			$expire = time(); 
			
			foreach($my_formats_array as $format) {
				parse_str($format);
				$avail_formats[$i]['itag'] = $itag;
				$avail_formats[$i]['quality'] = $quality;
				$type = explode(';',$type);
				$avail_formats[$i]['type'] = $type[0];
				$avail_formats[$i]['url'] = urldecode($url) . '&signature=' . $sig;
				parse_str(urldecode($url));
				$avail_formats[$i]['expires'] = date("G:i:s T", $expire);
				$avail_formats[$i]['ipbits'] = $ipbits;
				$avail_formats[$i]['ip'] = $ip;
				$i++;
			}
			return $avail_formats;
		}
		else
		{
			return [];
		}
    }
	public function get_video_urls_formated($video_id,$filter_quality = '',$filter_type='')//quality : hd720,medium,small    type: video/mp4 video/webm  video/3gpp
    {
		$result = [];
		$format_urls = $this->get_video_urls($video_id);
		if(!empty($format_urls) && is_array($format_urls))
		{
			
			foreach($format_urls as $url_OBJ)
			{
				$video_quality = $url_OBJ['quality'];
				$video_type  = $url_OBJ['type'];
				$type = str_replace('video/','',$video_type);
				$video_url = $url_OBJ['url'];
				if(!empty($filter_quality))
				{
					if($filter_quality != $video_quality)
					{
						continue;
					}
					
				}
				if(!empty($filter_type))
				{
					if($filter_type != $video_type)
					{
						continue;
					}
					
				}
				
				$result[$video_quality][$type] = $video_url;
			}
		}
		return $result;

	}

	public function get_video_image($video_url = ''){
		$api_key = $this->config['api_key'];
		$url_video_info = self::URL_GOOGLEAPI;
		$video_id = $this->get_youtube_id($video_url);
		$url_video_info = str_replace('[video_id]',$video_id,$url_video_info);
		$url_video_info = str_replace('[api_key]',$api_key,$url_video_info);

		$http = new Client();
		$response = $http->get($url_video_info);
		$video_image = '';
		if($response->isOk())
		{
			$my_video_info = $response->body();
			parse_str($my_video_info);
			$arr_my_video_info = json_decode($my_video_info, true);
			if(!empty($arr_my_video_info['items']) && isset($arr_my_video_info['items'][0]['snippet']['thumbnails'])){
				$thumbnails = $arr_my_video_info['items'][0]['snippet']['thumbnails'];
				foreach($thumbnails as $key => $value){
					$video_image = $value['url'];
					if($key == 'standard') break;
				}
			}

		}
		return $video_image;
	}

	public function get_youtube_id($url)
	{
		preg_match_all("#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#", $url, $matches);
		//pr($matches);
		return !empty($matches[0][0]) ? $matches[0][0] : '';
	}
}
/* Usage
$this->loadComponent('YoutubeHelper',[]);
$youtube_id = "Vnt7MB9KGCk";
$url_play_video = $this->YoutubeHelper->get_video_urls_formated($youtube_id,''); //medium		
*/
