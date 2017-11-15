<?php namespace Bhasunjaya\Envkey;

/**
*  A sample class
*
*  Use this section to define what this class is doing, the PHPDocumentator will use this
*  to automatically generate an API documentation using this information.
*
*  @author yourname
*/
class Envkey
{
 
    /**
    * Sample method
    *
    * Always create a corresponding docblock for each method, describing what it is for,
    * this helps the phpdocumentator to properly generator the documentation
    *
    * @param string $param1 A string containing the parameter, do this for each parameter to the function, make sure to make it descriptive
    *
    * @return string
    */
    public function parse()
    {
        if (isset($_SERVER['argv'][1])) {
            $project = $_SERVER['argv'][1];
        }

        $curl = curl_init();
        curl_setopt_array($curl, [
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_URL => 'http://localhost:8000/api/test?project='.$project,
        ]);
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);

        $env = json_decode($resp);
        $string =  file_get_contents('.env.example');
        
        foreach ($env as $k => $v) {
            $string = str_replace($k, $v, $string);
        }
        file_put_contents('.env', $string);
        return $string;
    }
}
