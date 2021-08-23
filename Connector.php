<?php

        

        require_once("./config.inc");

        
     $Connector = new mysqli($Conn_data['dbhost'],$Conn_data['dbuser'],$Conn_data['dbpass'],$Conn_data['dbname']);
      
     class controller
     {
        
        private $status_code;
        private $status_string;
        public function Model($query)
        {
           global $Connector;
            if ($Connector->query($query)) {
               return  $this->status_code = 0;
            }else{
               return  $this->status_code = 1;
            }
        }


        public function getStatus_code()
        {
           return $this->status_code;
        }

        public function getStatus_string()
        {
           switch ($this->status_code) {
              case 0:
                 return "Transaction performed success";
                 break;
              case 1:
               return "Transaction is fail";

              default:
              return "Transaction Status  is unknown";

                 break;
           }
        }
}


      /**
       * the general query for the database. it will return mysqli->query function
       * @param $query | the query to perform the transaction with
       * 
       */
     function gen_query($query)
     {
        global $Connector;

       return $Connector->query($query);
     }
        
        
        
        
        
        
        
        
        
        
        
        
        ?>