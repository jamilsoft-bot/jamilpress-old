

<?php

        include "includes.php";

        class Record
        {
            private $table_name;
            private $record_type;
            private $query;
            private $connector;


            public function Record($table_name)
            {
                $this->table_name = $table_name;
                
            }

            public function Execute()
            {
                
            }

            public function Insert($data)
            {
                $this->query = $data;
                $this->record_type = 'Insert';
            }

            public function Delete($query)
            {
                $this->query = $query;
                $this->record_type = 'Delete';
            }



            public function Update($query)
            {
                $this->query = $query;
                $this->record_type = 'Update';
            }


            public function Retrive($query)
            {
                $this->query = $query;
                $this->record_type = 'Insert';
            }


        }
        


?>