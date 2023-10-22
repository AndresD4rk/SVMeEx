<?php $jsonFile = 'rutdat copy.json';
            $jsonData = file_get_contents($jsonFile);
            $data = json_decode($jsonData, true);
            foreach ($data as $key => $element) {
                if ($element['ident'] === 30) {
                    unset($data[$key]); // Elimina el elemento en la posición $key
                    break; // Termina el bucle después de encontrar el primer elemento coincidente
                }
            }  
            $newJsonData = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents($jsonFile, $newJsonData);