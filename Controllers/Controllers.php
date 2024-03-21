<?php

class Controllers {

    // loadView Function
    public function loadView($view, $data = []) {
        // Extract the data array to variables
        extract($data);

        // Construct the path to the view file
        $viewPath = "../Views/" . $view . ".php";

        // Check if the view file exists before requiring it
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            // Handle the error, e.g., throw an exception or show an error message
            // This is just an example. Adjust error handling as per your requirements
            die("View file not found: " . $viewPath);
        }
    }
}
