<?php

// ==============================================================
// This class implements the model used in the Book Search
// application. Google Books API calls are performed in this
// module. Functionalities include: order by asc/desc, order by
// relevance/newest, or get all books with no options.
// ==============================================================
class m_bookAPIModel extends CI_Model 
{
    // ==========================================================
    // This function performs an HTTP GET request to the Google
    // Books API using the URI provided. The request has a single
    // required parameter. Response objects are of type JSON
    // called "Volumes". 
    //
    // Input:
    //      $input      -- The search string provided by the user
    //                     formatted as "phrase"+"phrase".
    //
    // Output:
    //      $response   -- An object containing one or many
    //                     volumes.
    // ==========================================================
    public function getAllBooks($input)
    {
        // The Google Books URI.
        $URI = "https://www.googleapis.com/books/v1/volumes?q=";

        // Call the API and receive response.
        $response = file_get_contents($URI.$input);

        // Return the JSON response to the controller.
        return $response;

    } // end of "getAllBooks"


    // ==========================================================
    // This function performs an HTTP GET request to the Google
    // Books API using the URI provided, and the 'Order By'
    // method desired by the user. Response objects are of type
    // JSON called "volumes".
    //
    // Input:
    //      $input      -- The search string provided by the user
    //                     formatted as "phrase"+"phrase".
    //      $orderBy    -- The desired sort method (most relevant
    //                     or newest). The default value for this
    //                     parameter is to sort by relevance.
    //
    // Output:
    //      $response   -- An object containing one or many
    //                     volumes.
    // ==========================================================
    public function getBooks($input, $orderBy = "relevance")
    {
        // The Google Books URI.
        $URI = "https://www.googleapis.com/books/v1/volumes?q=";

        // Call the API and receive response.
        $response = file_get_contents($URI . $input . '&orderBy=' 
                                           .$orderBy);


    }
}

?>