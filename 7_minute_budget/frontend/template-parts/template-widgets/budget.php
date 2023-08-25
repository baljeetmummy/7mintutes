<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   print_r($_POST);
$name = $_POST['name'];
$email = $_POST['email'];
$reminder = isset($_POST['reminder']) ? "Yes" : "No";

    print_r($name);
    
    require_once('dompdf/autoload.inc.php');
    
    // Get the current page as HTML
  $html = file_get_contents('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
  
  // Create a new DomPDF instance
 
  $dompdf = new Dompdf();
  
  // Load the HTML into DomPDF
  $dompdf->loadHtml($html);
  
  
  // Set the paper size and orientation
  $dompdf->setPaper('A4', 'portrait');
  
  // Render the PDF
  $dompdf->render();
  
  // Get the PDF as a string
  $pdf_content = $dompdf->output();
  
  // Save the PDF to a file
file_put_contents('budget.pdf', $pdf_content);







  
 

}

?>