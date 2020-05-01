<?php
    $url = $_POST['url'];
    
    if(url_check($url)){
        $output = file_get_contents($url);
    
        // preg_match returns true or false.
        if(preg_match_all('/wp-content\/themes\/(.*?)\//', $output, $match)) 
        {
          $theme = array_unique($match[1]);
          $themes= $theme[0];
          unset($theme[0]);
          
          foreach($theme as $t){
            $themes .= ', '.$t;
          }   
          
          echo '</br>Theme : '.$themes.'</br>';                   
        } 
        else 
        {
          echo '</br>Theme : No themes found! May be this site is not using wordpress. </br>';
        }
   
        if(preg_match_all('/wp-content\/plugins\/(.*?)\//', $output, $match)) 
        {
          $plugin = array_unique($match[1]);
          $plugins= $plugin[0];
          unset($plugin[0]);
          
          foreach($plugin as $p){
            $plugins .= ', '.$p;
          }           
          
          echo 'Plugins : '.$plugins.'</br>';
        } 
	if(preg_match('*This site is optimized with the Yoast SEO plugin*', $output, $match)) 
        {
          $ad = $match[0];                  
          echo '<br/>Seo Plugin: Yoast SEO</br>';
        } 
	if(preg_match('*Performance optimized by W3 Total Cache*', $output, $match)) 
        {
          $ad = $match[0];                  
          echo '<br/>Caching Plugin: W3 Total Cache</br>';
        } 
        else 
        {
          echo 'Other Plugins : No Results!</br>';
        }
        
        if(preg_match('/adsbygoogle.js/', $output, $match)) 
        {
          $ad = $match[0];                  
          echo 'Adsense Found! This Site is using google adsense for monitizing the content.</br>';
        } 
        else 
        {
          echo 'This site is not using Google adsense</br>';
        }
    }else{
        echo 'Please Enter Url including (Https/Http)';// Throw message when URL not be called
    }
    
    # URL Check
    function url_check($url) {
        $headers = @get_headers($url);
        return is_array($headers) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$headers[0]) : false;
    };
    
?>
