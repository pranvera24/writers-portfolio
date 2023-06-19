<?php
/*
Template Name: Contact Page
*/
?>

<?php
get_header();

$image = get_field('image');
$picture = $image['sizes']['large'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $age = $_POST['age'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $message = $_POST['message'];


  $to = 'pranvera.halili243@gmail.com'; 
  $subject = 'Contact Form Submission';
  $body = "Name: $name $surname\n";
  $body .= "Age: $age\n";
  $body .= "Email: $email\n";
  $body .= "Gender: $gender\n";
  $body .= "Message:\n$message";


  $headers = "From: $name $surname <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";


  $sent = mail($to, $subject, $body, $headers);


  if ($sent) {
    echo '<p>Email sent successfully!</p>';
  } else {
    echo '<p>Failed to send email.</p>';
  }
}
?>

<style>
  .contact-form-container {
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    margin: 10px 5px 10px 120px;
  }

  .contact-form {
    max-width: 600px;
    padding: 20px;
    background-color: #101010;
    border: 2px solid whitesmoke;
    border-radius: 15px;
    box-shadow: 0 2px 5px rgba(123, 123, 123, 0.1);
  }

  
  .contact-form input[type="text"],
  .contact-form input[type="number"],
  .contact-form input[type="email"],
  .contact-form textarea {
    width: 100%;
    padding: 5px;
    margin-bottom: 3px;
    border: 1px solid whitesmoke;
    border-radius: 10px;
    resize: none;
    background-color: #101010;
    color: whitesmoke;
  }

  
  .contact-form label {
    font-family: 'Roboto Mono', monospace;
    font-size: 15px;
    color: whitesmoke;
  }

  
  .contact-form .radio-container {
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-bottom: 15px;
  }

  .contact-form .radio-container input[type="radio"] {
    margin-right: 5px;
    margin-left: 15px;
  }

  
  .contact-form button[type="submit"] {
    padding: 10px 20px;
    background-color: #101010;
    border: 1px solid whitesmoke;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    font-family: 'Roboto Mono', monospace;
    color: whitesmoke;
  }

  
  .contact-form button[type="submit"]:hover {
    background-color: whitesmoke;
    color: #101010;
    font-weight: bold;
  }

  h3 {
    font-family: 'Roboto Mono', monospace;
    color: whitesmoke;
    font-size: 25px;
  }

  .contact-form-container .contact-form {
    margin-right: 220px; 
  }

  .contact-form-container .homeimg {
    max-width: 400px;
    height: auto;
    border-radius: 15px;
    border:2px double whitesmoke;
    box-shadow: 0 2px 5px rgba(123, 123, 123, 0.1);
  }

  .vertical-heading {
  writing-mode: vertical-rl;
  text-orientation: mixed;
  transform: rotate(180deg);
  margin-top:160px;
  font-family: 'Roboto Mono', monospace;
    color: whitesmoke;
    
}
</style>

<div class="contact-form-container">
  <div class="contact-form">
    <h3>Share your thoughts with the writer</h3>
    <form action="<?php echo esc_url(home_url('/contact/')); ?>" method="post">
  
    <div>
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" required>
    </div>
    <div>
      <label for="surname">Surname:</label>
      <input type="text" name="surname" id="surname" required>
    </div>
    <div>
      <label for="age">Age:</label>
      <input type="number" name="age" id="age" required>
    </div>
    <div>
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required>
    </div>
    <div class="radio-container">
      <label>Gender:</label>
      <div>
        <input type="radio" name="gender" id="male" value="male" required>
        <label for="male">Male</label>
      </div>
      <div>
        <input type="radio" name="gender" id="female" value="female" required>
        <label for="female">Female</label>
      </div>
      <div>
        <input type="radio" name="gender" id="other" value="other" required>
        <label for="other">Other</label>
      </div>
    </div>
    <div>
      <label for="message">Your Message:</label>
      <textarea name="message" id="message" rows="4" required></textarea>
    </div>
    <div>
      <button type="submit">Send Email</button>
    </div>
    </form>
  </div>
  <div class="vertical-heading">
  <h2>Writer's Name.</h2>
</div>
  <img src="<?php echo $picture; ?>" class="homeimg">
</div>

<?php get_footer(); ?>



