<?php
    $url = $_POST['url'];
    
    if(url_check($url)){
        $output = file_get_contents($url);
        
        // preg_match returns true or false.
        if(preg_match('/wp-content\/themes\/(.*?)\//', $output, $match)) 
        {
          echo $match[1];            
        } 
        else 
        {
          echo "We found no match.";
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