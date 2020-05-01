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
          
          echo '</br>themes : '.$themes.'</br>';                   
        } 
        else 
        {
          echo '</br>themes : no themes found </br>';
        }
   
        if(preg_match_all('/wp-content\/plugins\/(.*?)\//', $output, $match)) 
        {
          $plugin = array_unique($match[1]);
          $plugins= $plugin[0];
          unset($plugin[0]);
          
          foreach($plugin as $p){
            $plugins .= ', '.$p;
          }           
          
          echo 'plugins : '.$plugins.'</br>';
        } 
        else 
        {
          echo 'plugins : no plugins found</br>';
        }
        
        if(preg_match('/adsbygoogle.js/', $output, $match)) 
        {
          $ad = $match[0];                  
          echo 'Found '.$ad.'</br>';
        } 
        else 
        {
          echo 'Google adsense not found</br>';
        }
    }else{
        echo 'URL not reachable!';// Throw message when URL not be called
    }
    
    # URL Check
    function url_check($url) {
        $headers = @get_headers($url);
        return is_array($headers) ? preg_match('/^HTTP\\/\\d+\\.\\d+\\s+2\\d\\d\\s+.*$/',$headers[0]) : false;
    };
    
?>